<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_portofolio extends CI_Model {

	public function select($where = ''){
		if ($where != ''){
			$this->db->where($where);
		}

					$this->db->from('mis_portofolio');
		$response = $this->db->get();
		return $response;
	}

	public function save($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'nama_portofolio'	=> $data['nama'],
			'deskripsi'			=> $data['deskripsi'],
			'link'	            => $data['link'],
            'thumbnail'         => $data['thumbnail']
		);

		$response = $this->db->insert('mis_portofolio', $arr);
		return $response;
	}

	public function update($data, $id){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'nama_portofolio'	=> $data['nama'],
			'deskripsi'			=> $data['deskripsi'],
			'link'	            => $data['link'],
            'thumbnail'         => $data['thumbnail']
		);

		$response = $this->db->update('mis_portofolio', $arr, ['id' => $id]);
		return $response;
	}

	public function delete($arr){
		return $this->db->delete('mis_portofolio', $arr);
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */