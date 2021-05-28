<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function DataCabang()
	{
		$data['title'] = 'Data Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$id = $data['user']['id'];
		$data['datacabang'] = $this->db->query("SELECT `id`,`nama_toko`,`alamat` FROM `data_cabang` WHERE `id` <> $id AND `user_id`=3")->result_array();


		$this->view->getDefault($data, 'pendataan/datacabang');
	}
	public function InfoCabang($datacabangId)
	{
		$data['title'] = 'Info Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['datacabang'] = $this->db->query("SELECT `id`,`nama_toko`,`alamat` FROM `data_cabang` WHERE `id`=$datacabangId")->row_array();

		$this->view->getDefault($data, 'pendataan/infocabang');
	}
	public function TambahCabang()
	{
		$data['title'] = 'Tambah Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['datacabang'] = $this->db->query("SELECT `id`,`nama_toko`,`alamat` FROM `data_cabang` WHERE `id`=$datacabangId")->row_array();

		$this->view->getDefault($data, 'pendataan/infocabang');
	}

	public function DataStokCabang()
	{
		$data['title'] = 'Data Stok Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'pendataan/datastokcabang');
	}
	public function Laporan()
	{
		$data['title'] = 'Laporan Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'pendataan/laporancabang');
	}
}
