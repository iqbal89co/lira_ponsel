<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function Stok()
	{
		$data['title'] = 'Stok Barang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'gudang/stok_barang');
	}

	public function Kategori()
	{
		$data['title'] = 'Kategori';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$id = $data['user']['id'];
		$data['kategori'] = $this->db->query("SELECT `id_kategori`,`kategori` FROM `kategori` WHERE `id_kategori` <> $id AND `id_kategori`=1  ")->result_array();

		$this->view->getDefault($data, 'gudang/kategori');
	}

}
