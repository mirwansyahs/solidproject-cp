<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Portofolio extends AUTH_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->library('upload');

	}



	public function index()
	{
		$data['data']		= $this->M_portofolio->select()->result();

		$this->backend->views("_backend/portofolio/list", $data);
	}

	public function add()
	{
		$this->backend->views("_backend/portofolio/add");

	}

	public function addProses()
	{
		$data = $this->input->post();
		
		$config['upload_path']		= './assets/images/portofolio/'; //path folder
		$config['allowed_types']	= 'jpg|png|jpeg|webp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name']		= TRUE; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if($this->upload->do_upload('gambar')){
            $data['thumbnail']    = $this->upload->data()['file_name'];
			$result = $this->M_portofolio->save($data);
		}

		if ($result){
			$this->session->set_flashdata('msg', toast("success", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', toast("danger", "Data gagal ditambahkan. ".@$this->upload->display_errors()));
		}
		redirect("Redaktur/Portofolio");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect('Redaktur/Portofolio');
		}

		$data = array(
			'id'	=> $id,
			'data'	=> $this->M_portofolio->select(['id' => $id])->row()
		);

		$this->backend->views("_backend/portofolio/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('Redaktur/Portofolio');
		}

		$data = $this->input->post();

		$config['upload_path']		= './assets/images/portofolio/'; //path folder
		$config['allowed_types']	= 'jpg|png|jpeg|webp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name']		= TRUE; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if($this->upload->do_upload('gambar')){
            $data['thumbnail']    = $this->upload->data()['file_name'];
		}else{
			$data['thumbnail']	= $this->M_portofolio->select(['id' => $id])->row()->thumbnail;
		}

		$result = $this->M_portofolio->update($data, $id);

		if ($result){
			$this->session->set_flashdata('msg', toast("success", "Data berhasil diubah. ".@$this->upload->display_errors()));
		}else{
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah. ".@$this->upload->display_errors()));
		}
		redirect("Redaktur/Portofolio");
	}

	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('Redaktur/Portofolio');
		}

		$result = $this->M_portofolio->delete(['id' => $id]);

		if ($result){
			$this->session->set_flashdata('msg', toast("success", "Data berhasil dihapus."));
		}else{
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
		}
		redirect("Redaktur/Portofolio");
	}

}