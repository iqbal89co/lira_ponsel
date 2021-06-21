<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan_model extends CI_Model
{
	public function insertCabangBaru($user_id, $nama_toko, $alamat, $no_telp)
	{
		$query = "INSERT INTO `data_cabang` VALUES(NULL, $user_id, '$nama_toko','$alamat','$no_telp')";
		$this->db->query($query);
	}

	public function deleteCabang($datacabangId)
	{
		$query = "DELETE FROM `data_cabang` WHERE `id` = $datacabangId";
		$this->db->query($query);
	}

	public function tampilEdit()
	{
		$query = "SELECT `data_cabang`.`id`, `nama_toko`, `alamat`, `no_telp`, `user`.`id` AS `user_id`, `role_id`, `name`
		FROM `data_cabang`
		JOIN `user`
		ON `data_cabang`.`user_id`=`user`.`id`
		WHERE `role_id`=3";
		return $this->db->query($query)->result_array();
	}

	public function editCabang($datacabangId, $UserId, $nama_toko, $alamat)
	{
		$query = "UPDATE `data_cabang` SET `user_id`=$UserId, `nama_toko`='$nama_toko', `alamat`='$alamat'
		WHERE `id`=$datacabangId";
		$this->db->query($query);
	}

	public function getStokCabang($datacabangId)
	{
		$query = "SELECT `stok_barang`.`id`,`kategori`,`nama_barang`,`id_barang`, `jumlah_etalase`, `jumlah_gudang`
		FROM `stok_barang` 
		JOIN `data_cabang` 
		ON `stok_barang`.`id_cabang`=`data_cabang`.`id`
		JOIN `barang` 
		ON `stok_barang`.`id_barang`=`barang`.`id`
		JOIN `kategori` 
		ON `barang`.`kategori_id`=`kategori`.`id_kategori`
		WHERE `stok_barang`.`id_cabang` = '$datacabangId'
		ORDER BY `id_kategori` ASC";
		return $this->db->query($query)->result_array();
	}
	public function getAllStokBarang()
	{
		$query = "SELECT SUM(jumlah_etalase)+SUM(jumlah_gudang) AS jumlah_stok FROM stok_barang";
		return $this->db->query($query)->row_array();
	}
	public function getAllJual()
	{
		$query = "SELECT SUM(total_pembelian) AS total FROM ringkasan_transaksi";
		return $this->db->query($query)->row_array();
	}
	public function availableUser()
	{
		$query = "SELECT user.id, user.name FROM user
		WHERE user.id NOT IN (SELECT `user_id` FROM data_cabang)
		AND user.role_id=3";
		return $this->db->query($query)->result_array();
	}
}
