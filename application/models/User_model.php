<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function getUser($username)
	{
		$query = "SELECT * FROM `user` WHERE `username`='$username'";
		return $this->db->query($query)->row_array();
	}

	public function getCabang($userId)
	{
		$query = "SELECT * FROM `data_cabang` WHERE `user_id`=$userId";
		return $this->db->query($query)->row_array();
	}
	public function ambilData()
	{
		return $this->db->get('user')->result_array();
	}

	public function proses_tambah_data()
	{
		$data =  [
			'name' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => $this->input->post('role'),
			'is_active' => 1
		];
		$this->db->insert('user', $data);
	}

	public function ambil_id_user($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}

	public function proses_edit_data()
	{
		$data =  [
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => $this->input->post('role'),
			'is_active' => 1
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user', $data);
	}
}
