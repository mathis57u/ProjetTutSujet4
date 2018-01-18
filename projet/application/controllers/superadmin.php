<?php

class Superadmin extends CI_Controller
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
		$this->load->view('superadmin');
	}
	
}