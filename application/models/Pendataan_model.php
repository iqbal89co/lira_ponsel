<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Pendataan_model extends CI_Model
	{ 
		public function insertCabangBaru($user_id, $nama_toko, $alamat)
	{
		$query = "INSERT INTO `data_cabang` VALUES(NULL, $user_id, '$nama_toko','$alamat')";
		$this->db->query($query);
	}

	public function deleteCabang($datacabangId)
	{
		$query = "DELETE FROM `data_cabang` WHERE `id` = $datacabangId";
		$this->db->query($query);
	}
}