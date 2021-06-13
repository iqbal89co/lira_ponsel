<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penjualan_model', 'jual');
		$this->load->model('Gudang_model', 'gudang');
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'dashboard toko';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['cabang'] = $this->user->getCabang($data['user']['id']);
		$data['jumlah_kategori'] = $this->gudang->totalKategori();
		$data['total_penjualan'] = $this->jual->totalJual($data['cabang']['id']);
		$data['total_stok'] = $this->gudang->totalStok($data['cabang']['id']);

		$this->view->getDefault($data, 'toko/dashboard');
	}
}
