<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
	public function getAllBarang($cabangId)
	{
		$query = "SELECT `barang`.`id`, `nama_barang`, `kategori`, `icon`, `harga`, `jumlah_etalase`, `jumlah_gudang`
		FROM `barang`
		JOIN `kategori`
		ON `barang`.`kategori_id`=`kategori`.`id_kategori`
		JOIN `stok_barang` 
		ON `barang`.`id`=`stok_barang`.`id_barang`
		WHERE `stok_barang`.`id_cabang`=$cabangId AND jumlah_etalase > 0";
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
		WHERE `barang`.`kategori_id`=$kategori AND `stok_barang`.`id_cabang`=$cabangId AND jumlah_etalase > 0";
		return $this->db->query($query)->result();
	}
	public function searchBarang($search, $cabangId)
	{
		$query = "SELECT `barang`.`id`, `nama_barang`, `kategori`, `icon`, `harga`, `jumlah_etalase`, `jumlah_gudang`
		FROM `barang`
		JOIN `kategori`
		ON `barang`.`kategori_id`=`kategori`.`id_kategori`
		JOIN `stok_barang` 
		ON `barang`.`id`=`stok_barang`.`id_barang`
		WHERE `barang`.`nama_barang` LIKE '%$search%' AND `stok_barang`.`id_cabang`=$cabangId AND jumlah_etalase > 0";
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
	public function putReceiptToDB($pelanggan, $cabang, $idBarang, $jumlah, $harga, $tanggal, $idPembelian)
	{
		$query = "INSERT INTO `penjualan` VALUES
		(NULL, '$idPembelian', '$pelanggan', $cabang, $idBarang, $jumlah, $harga, '$tanggal')";
		$query2 = "UPDATE stok_barang
		SET jumlah_etalase = jumlah_etalase-1
		WHERE id_cabang=$cabang AND id_barang=$idBarang";
		$this->db->trans_start();
		for ($i = 0; $i < $jumlah; $i++) {
			$this->db->query($query2);
		}
		$this->db->query($query);
		$this->db->trans_complete();
	}
	public function generateStock($id_cabang, $id_barang, $jlh_etalase, $jlh_gudang)
	{
		$query = "INSERT INTO stok_barang VALUES 
		(NULL, $id_cabang, $id_barang, $jlh_etalase, $jlh_gudang)";
		$this->db->query($query);
	}
	public function getCheckoutSummary($cabangId)
	{
		$query = "SELECT * FROM ringkasan_transaksi WHERE id_cabang=$cabangId";
		return $this->db->query($query)->result_array();
	}
	public function cekIdPembelian($id)
	{
		$query = "SELECT invoice FROM ringkasan_transaksi WHERE id_pembelian='$id'";
		if ($this->db->query($query)->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}
	public function deletePenjualan($id)
	{
		$query = "DELETE FROM penjualan WHERE id_pembelian='$id'";
		$this->db->query($query);
	}
	public function deleteLogPenjualan($id)
	{
		$query = "DELETE FROM log_penjualan WHERE id_pembelian='$id'";
		$this->db->query($query);
	}
	public function restoreLogPenjualan($id)
	{
		$query = "INSERT INTO penjualan(id_pembelian, nama_pelanggan, id_cabang, id_barang, jumlah, harga, tanggal_pembelian)
		SELECT id_pembelian, nama_pelanggan, id_cabang, id_barang, jumlah, harga, tanggal_pembelian
		FROM log_penjualan WHERE id_pembelian='$id'";
		$this->db->query($query);
		$this->deleteLogPenjualan($id);
	}
	public function getOrderSum($cabangId)
	{
		$query = "SELECT * FROM ringkasan_transaksi WHERE id_cabang=$cabangId";
		return $this->db->query($query)->result_array();
	}
	public function getPerOrder($id)
	{
		$query = "SELECT barang.nama_barang, penjualan.jumlah, penjualan.harga
		FROM penjualan
		JOIN barang ON penjualan.id_barang=barang.id
		WHERE id_pembelian='$id'";
		return $this->db->query($query)->result();
	}
	public function getLogPerOrder($id)
	{
		$query = "SELECT barang.nama_barang, log_penjualan.jumlah, log_penjualan.harga
		FROM log_penjualan
		JOIN barang ON log_penjualan.id_barang=barang.id
		WHERE id_pembelian='$id'";
		return $this->db->query($query)->result();
	}
	public function totalJual($cabangId)
	{
		$query = "SELECT SUM(total_pembelian) AS total
		FROM ringkasan_transaksi
		WHERE id_cabang=$cabangId";
		return $this->db->query($query)->row_array();
	}
	public function getLogOrder($cabangId)
	{
		$query = "SELECT * FROM log_transaksi WHERE id_cabang=$cabangId";
		return $this->db->query($query)->result_array();
	}
}
