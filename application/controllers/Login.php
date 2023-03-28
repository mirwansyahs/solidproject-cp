<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$session = $this->session->userdata('status');

			if ($session == '') {
				$this->load->view('_frontend/login');
			} else {
				redirect('Redaktur/Home');
			}
		}

		public function sign()
		{
			$data = $this->input->post();
			$username = trim($data['email']);
			$password = trim($data['password']);

			$data = $this->api->CallAPI('POST', base_api('/api/v1/_getAuth'), ['x-user' => $username, 'x-pass' => $password]);
			
			$data = json_decode($data);
			if ($data->status == false) {			
				$arr = array(
					'succ'	=> 0,
					'msg'	=> $data->message
				);
			} else {
				date_default_timezone_set('Asia/Jakarta');
				$session = [
					'userdata' => $data,
					'status' => "Loged in"
				];
				
				

				$this->session->set_userdata('file_manager',true);
				$this->session->set_userdata($session);
				if (@$this->input->get('redirect')){
					$redirect = $this->input->get('redirect');
					// if (strtolower($redirect) == "aspirations"){
					// 	redirect('Administrator/Aspirations');
					// }
				}else{
					$redirect = "redaktur/home";
				}
				
				$arr = array(
					'succ'		=> 1,
					'msg'		=> "Login berhasil",
					'data'		=> array(
						'redirect'	=> $redirect
					)
				);
			}
			echo json_encode($arr);
		}

		public function out()
		{
			$this->session->sess_destroy();
			redirect('Login');
		}
}

?>
