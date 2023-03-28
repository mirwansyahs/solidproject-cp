<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('API');
		$this->load->model('M_admin');
		$this->load->model('M_portofolio');
		date_default_timezone_set('asia/jakarta');

		$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));

		if ($this->session->userdata('status') == '') {
			redirect('Auth');
		}else{
			$data = $this->api->CallAPI('POST', base_api('/api/v1/_getAdministratif') , ['email' => (@$this->session->userdata('userdata')->Username)?$this->session->userdata('userdata')->Username:$this->session->userdata('userdata')->memberData->username]);

			$data = json_decode($data);
			$cekData = $this->M_admin->select('', $data->email);
			if ($cekData->num_rows() > 0){
				$cekData = $cekData->row();
				$data->jabatan 	= $cekData->jabatan;
				$data->lang 	= $cekData->lang;
				$this->userdata = $data;
			}else{
				
				$data->jabatan	= "mahasiswa";
				$response = $this->M_admin->save($data);
				$this->userdata = $data;
			}
			
		}
	}

}

/* End of file MY_Auth.php */
/* Location: ./application/core/MY_Auth.php */