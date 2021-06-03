<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penjualan_model', 'jual');
		is_logged_in();
	}
	public function Kasir()
	{
		$data['title'] = 'Kasir';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['kategori'] = $this->jual->getAllKategori();
		$data['cabang'] = $this->user->getCabang($data['user']['id']);
		$data['barang'] = $this->jual->getAllBarang($data['cabang']['id']);

		$this->view->getDefault($data, 'penjualan/kasir');
	}
	public function getBarangFilterKategori()
	{
		$user = $this->user->getUser($this->session->userdata('username'));
		$cabang = $this->user->getCabang($user['id']);
		echo json_encode($this->jual->filterByKategori($this->input->post('kategoriId'), $cabang['id']));
	}
	public function getAllBarang()
	{
		$user = $this->user->getUser($this->session->userdata('username'));
		$cabang = $this->user->getCabang($user['id']);
		echo json_encode($this->jual->getAllBarang($cabang['id']));
	}
	public function getJumlahBarang()
	{
		$user = $this->user->getUser($this->session->userdata('username'));
		$cabang = $this->user->getCabang($user['id']);
		$hasil = $this->jual->getJumlahBarang($this->input->post('idBarang'), $cabang['id']);
		echo $hasil['jumlah_etalase'] + $hasil['jumlah_gudang'];
	}

	public function data()
	{
		$data['title'] = 'data penjualan';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'penjualan/data');
	}
	public function generateStock()
	{
		for ($x = 1; $x <= 50; $x++) {
			$this->jual->generateStock(3, $x, 5, 5);
		}
	}
	public function receipt()
	{
		$user = $this->user->getUser($this->session->userdata('username'));
		$cabang = $this->user->getCabang($user['id']);
		$data['json'] = $this->input->post('jsonData');
		$phpArr = (array)json_decode($data['json']);
		$dateNow = date("Y-m-d h:i:s");
		foreach ($phpArr as $p) {
			if (gettype($p) == "object") {
				echo $this->jual->putReceiptToDB(
					$this->input->post('nama_pelanggan'),
					$cabang['id'],
					$p->id_barang,
					$p->jumlah,
					$p->harga,
					$dateNow
				);
			}
		}
		$this->load->view('penjualan/struk', $data);
	}
}
