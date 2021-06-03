<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
	public function getAllKategori()
	{
		$query = "SELECT * FROM `kategori`";
		return $this->db->query($query)->result_array();
	}

	public function getAllBarang($cabangId)
	{
		$query = "SELECT `barang`.`id`, `nama_barang`, `kategori`, `icon`, `harga`, `jumlah_etalase`, `jumlah_gudang`
		FROM `barang`
		JOIN `kategori`
		ON `barang`.`kategori_id`=`kategori`.`id_kategori`
		JOIN `stok_barang` 
		ON `barang`.`id`=`stok_barang`.`id_barang`
		WHERE `stok_barang`.`id_cabang`=$cabangId";
		return $this->db->query($query)->result_array();
	}
	public function filterByKategori($kategori, $cabangId)
	{
		$query = "SELECT `barang`.`id`, `nama_barang`, `kategori`, `icon`, `harga`, `jumlah_etalase`, `jumlah_gudang`
		FROM `barang`
		JOIN `kategori`
		ON `barang`.`kategori_id`=`kategori`.`id_kategori`
		JOIN `stok_barang` 
		ON `barang`.`id`=`stok_barang`.`id_barang`
		WHERE `barang`.`kategori_id`=$kategori AND `stok_barang`.`id_cabang`=$cabangId";
		return $this->db->query($query)->result();
	}
	public function getJumlahBarang($idBarang, $idCabang)
	{
		$query = "SELECT `jumlah_etalase`, `jumlah_gudang`
		FROM `stok_barang` 
		WHERE `stok_barang`.`id_barang`=$idBarang AND `stok_barang`.`id_cabang`=$idCabang";
		return $this->db->query($query)->row_array();
	}

	public function getTokoBarang($kategori)
	{
		$query = "SELECT `barang`.`id`, `nama_barang`, `kategori`, `jumlah_etalase`, `jumlah_gudang`, `harga`
		FROM `barang` 
		JOIN `kategori` 
		ON `barang`.`kategori_id`=`kategori`.`id_kategori`
		JOIN `stok_barang` 
		ON `barang`.`id`=`stok_barang`.`id_barang`
		JOIN `data_cabang`
		ON `data_cabang`.`id`=`stok_barang`.`id_cabang`
		WHERE `barang`.`kategori_id` = '$kategori'";
		return $this->db->query($query)->result_array();
	}
	public function putReceiptToDB($pelanggan, $cabang, $idBarang, $jumlah, $harga, $tanggal)
	{
		$query = "INSERT INTO `penjualan` VALUES
		(NULL, '$pelanggan', $cabang, $idBarang, $jumlah, $harga, '$tanggal')";
		$this->db->query($query);
	}
	public function generateStock($id_cabang, $id_barang, $jlh_etalase, $jlh_gudang)
	{
		$query = "INSERT INTO stok_barang VALUES 
		(NULL, $id_cabang, $id_barang, $jlh_etalase, $jlh_gudang)";
		$this->db->query($query);
	}
}
