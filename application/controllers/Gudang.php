<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penjualan_model', 'jual');
		is_logged_in();
	}
	public function stokbarang()
	{
		$data['title'] = 'Stok Barang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'gudang/stok_barang');
	}

	public function Kategori()
	{
		$data['title'] = 'Kategori';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['kategori'] = $this->jual->getAllKategori();

		$this->view->getDefault($data, 'gudang/kategori');
	}
}
