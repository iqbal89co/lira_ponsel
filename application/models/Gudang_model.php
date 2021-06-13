<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang_model extends CI_Model
{
	public function getAllKategori()
	{
		$query = "SELECT * FROM `kategori`";
		return $this->db->query($query)->result_array();
	}
	public function addKategori($nama, $icon)
	{
		$query = "INSERT INTO kategori VALUES(NULL, '$nama', '$icon')";
		$this->db->query($query);
	}
	public function editKategori($nama, $icon, $id)
	{
		$query = "UPDATE kategori
		SET kategori='$nama', icon='$icon'
		WHERE id_kategori=$id";
		$this->db->query($query);
	}
	public function deleteKategori($id)
	{
		$query = "DELETE FROM kategori
		WHERE id_kategori=$id";
		$this->db->query($query);
	}
	public function getAllStokCabang($cabangId)
	{
		$query = "SELECT barang.id, nama_barang, kategori, harga, jumlah_etalase, jumlah_gudang
		FROM stok_barang
		LEFT JOIN barang ON stok_barang.id_barang=barang.id
		JOIN kategori ON barang.kategori_id=kategori.id_kategori
		WHERE stok_barang.id_cabang=3
		UNION
		SELECT barang.id, nama_barang, kategori, harga, 0 as jumlah_etalase, 0 as jumlah_gudang
		FROM barang
		JOIN kategori ON barang.kategori_id=kategori.id_kategori
		WHERE id NOT IN (SELECT id_barang FROM stok_barang)";
		return $this->db->query($query)->result_array();
	}
	public function getStok($id)
	{
		$query = "SELECT jumlah_etalase, jumlah_gudang
		FROM stok_barang
		WHERE id=$id";
		return $this->db->query($query)->row_array();
	}
	public function updateStok($string, $cabangId)
	{
		$json = json_decode($string);
		$this->db->trans_start();
		foreach ($json as $j) {
			$query = "DELETE FROM stok_barang WHERE id_barang=$j->id";
			$query2 = "INSERT INTO stok_barang 
			VALUES(NULL, $cabangId, $j->id, $j->jumlah_etalase, $j->jumlah_gudang)";
			$this->db->query($query);
			$this->db->query($query2);
		}
		$this->db->trans_complete();
	}
	public function totalKategori()
	{
		$query = "SELECT COUNT(kategori) AS total FROM kategori";
		return $this->db->query($query)->row_array();
	}
	public function totalStok($cabangId)
	{
		$query = "SELECT SUM(jumlah_etalase) AS total_etalase, SUM(jumlah_gudang) AS total_gudang
		FROM stok_barang
		WHERE id_cabang=$cabangId";
		return $this->db->query($query)->row_array();
	}
}
