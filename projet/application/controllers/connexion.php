<?php

class Connexion extends CI_Controller
{
	
	public function __construct()
	{
		//	Obligatoire
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function index()
	{
		$this->accueil();
	}

	public function accueil()
	{
		$this->load->view('connexion');
	}
	
	public function auth()
	{
		$mail = trim($this->input->post('email'));
		$mdp = $this->input->post('password');

		$this->load->model("dblogin");
		$res = $this->dblogin->auth($mail, $mdp);
		if (!isset($res['error']))
		{
			$this->session->set_userdata('util', $mail, 'droit', $res["type"]);
			switch($res["type"])
			{
					case 1: redirect("user");
					break;
					case 2: redirect("admin");
					break;
					case 3: redirect("superadmin");
					break;
					default:;
			}
		}
		else
		{
			$data = $res;
			$data["form1"] = true;
			$this->load->view('connexion', $data);
		}
	}
	
	public function random_str($length) 
	{
   		return substr(str_shuffle(str_repeat("0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN", $length)), 0, $length);
	}
	
	public function insc()
	{
   		$this->load->model('dblogin');

   		$insc_email = trim($this->input->post('insc_email'));
		$insc_mdp = $this->input->post('insc_mdp');
		$insc_val_mdp = $this->input->post('insc_val_mdp');

   		if ($insc_email || $insc_mdp || $insc_val_mdp)
		{
			$token = $this->random_str(30);

   			$resultat = $this->dblogin->insc($insc_email, $insc_mdp, $insc_val_mdp, $token);	

   			if (isset($resultat['error']))
			{
				$data["error"] = $res["error"];
				$this->load->view('connexion', $data);
				redirect('connexion');
			}
			else
			{
				if($insc_mdp && $insc_val_mdp)
				{
					$data["error"] = "Mail vide.";
				}
				else if($mail)
				{
					$data["error"] = "Mot de passe vide.";
				}
				else
				{
					$data["error"] = "Les champs sont vides.";
				}
				$this->load->view('connexion', $data);
				redirect('connexion');
			}
   		}
		var_dump($resultat);
  	}

  	public function confirm()
  	{
  		$rep = $this->dblogin->sendVerificationMail($insc_email, $token);
  		redirect('connexion');
  	}
}