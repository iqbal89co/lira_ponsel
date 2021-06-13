<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gudang_model', 'gudang');
		$this->load->model('Penjualan_model', 'jual');
		is_logged_in();
	}
	public function stokbarang()
	{
		$data['title'] = 'Stok Barang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['cabang'] = $this->user->getCabang($data['user']['id']);
		$data['stok'] = $this->gudang->getAllStokCabang($data['cabang']['id']);

		$this->view->getDefault($data, 'gudang/stok_barang');
	}
	public function getStok()
	{
		echo json_encode($this->gudang->getStok($this->input->post('id')));
	}
	public function updateStok()
	{
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['cabang'] = $this->user->getCabang($data['user']['id']);
		$this->gudang->updateStok($this->input->post('json'), $data['cabang']['id']);
	}
	public function Kategori()
	{
		$data['title'] = 'Kategori';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['kategori'] = $this->gudang->getAllKategori();

		$this->view->getDefault($data, 'gudang/kategori');
	}
	public function addNewKategori()
	{
		$this->gudang->addKategori(
			$this->input->post('nama'),
			$this->input->post('icon')
		);
	}
	public function editKategori()
	{
		if ($this->gudang->editKategori(
			$this->input->post('nama'),
			$this->input->post('icon'),
			$this->input->post('id')
		)) {
			$this->view->flash('success', 'Kategori berhasil diedit', 'gudang/kategori');
		}
	}
	public function deleteKategori()
	{
		if ($this->gudang->deleteKategori($this->input->post('id'))) {
			$this->view->flash('success', 'Kategori berhasil dihapus', 'gudang/kategori');
		}
	}
}
