<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dblogin extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();

		$this->load->library('session');
	}
	
	public function auth($mail, $mdp)
	{
		$data;
		if (!empty($mail) && !empty($mdp))
		{
			$this->db->select("droit, mdp, verif");
			$this->db->from("utilisateur");
			$this->db->where("mail", $mail);
			$res = $this->db->get()->result();
			if(!empty($res))
			{
				if($mdp == $res[0]->mdp)
				{
					if($res[0]->verif == 1)
					{
						$data['type'] = $res[0]->droit;
					}
					else
					{
						$data['error'] = "Veuillez d'abord vérifier votre compte, un email vous a été envoyé.";
					}
				}
				else
				{
					$data['error'] = "Le mot de passe ne correspond pas à l'adresse mail.";
				}
			}
			else
			{
				$data['error'] = "Adresse mail inconnue.";
			}
		}
		else
		{
			if($mdp)
			{
				$data["error"] = "Champ mail vide.";
			}
			else if($mail)
			{
				$data["error"] = "Champ mot de passe vide.";
			}
			else
			{
				$data["error"] = "Les champs sont vides.";
			}
		}
		return $data;
	}
	
	public function insc($insc_email, $insc_mdp, $insc_val_mdp, $token)
	{
		$data;
		if(!empty($insc_mdp) == !empty($insc_val_mdp))
		{
			if($insc_email < 70)
			{
				if(strlen($insc_mdp) >= 8 && strlen($insc_mdp) <= 20)
				{
					if(filter_var($insc_email, FILTER_VALIDATE_EMAIL))
					{
						$this->db->insert('ut_token', ['token'=>$token, 'mail'=>$insc_email]);
						$this->email->from('super.kiwi@outlook.fr', 'Support');
				        $this->email->to($insc_email);
				        $this->email->subject('Account confirmation');
				        $this->email->message('Click here to confirm : ' . base_url() . 'confirm/' . $token);
				        $this->email->send();

						$this->db->set('mail', $insc_email);
						$this->db->set('mdp', $insc_mdp);

						$this->db->set('verif', 0);
						$this->db->set('droit', 1);

						return $this->db->insert('utilisateur');
					}
					else
					{
						$data['error'] = "Adresse mail non valide.";
					}
				}
				else
				{
					$data['error'] = "Le mot de passe doit être compris entre 8 et 20 caractères.";
				}
			}
			else
			{
				$data['error'] = "Adresse mail trop longue (70 caractères maximum).";
			}
		}
		else
		{
			$data['error'] = "Les mots de passes ne correspondent pas.";
		}
		return $data;
	}

	public function sendVerificationMail($insc_email)
	{
		$this->db->select('*');
		$this->db->from('ut_token');
		$this->db->and('token', $token);
		$user = $this->db->get()->result();

		if(!is_array($user) || count($user) < 1)
		{
			return false;
		}
		else 
		{
			$user = $user[0];

			$this->db->set('verif', 1);
			$this->db->where('mail', $insc_email);
			$this->db->update('utilisateur');

			$this->db->where('token');
			$this->db->delete('ut_token');
		}
	}
}