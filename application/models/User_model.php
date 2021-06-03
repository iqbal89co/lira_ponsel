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
}
