<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends AUTH_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->library('upload');

		$this->load->library('pagination');

	}



	public function index()

	{

		$data['subjudul']	= "Dashboard";
		$data['judul']		= "Dashboard";

		$this->backend->views("_backend/home", $data);

	}

}