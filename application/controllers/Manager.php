<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penjualan_model', 'jual');
		$this->load->model('Gudang_model', 'gudang');
		$this->load->model('Pendataan_model', 'pendataan');
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'dashboard manager';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['jumlah_kategori'] = $this->gudang->totalKategori();
		$data['total_stok'] = $this->pendataan->getAllStokBarang();
		$data['total_penjualan'] = $this->pendataan->getAllJual();

		$this->view->getDefault($data, 'manager/dashboard');
	}
	public function penjualan()
	{
		$data['title'] = 'data penjualan';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'manager/penjualan');
	}
	public function kasir()
	{
		$data['title'] = 'kasir';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'manager/kasir');
	}
}
