<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_portofolio');
		}

		public function index()
		{
			$data['data']	= $this->M_portofolio->select()->result();
			$this->load->view('frontend/home', $data);
		}
    }