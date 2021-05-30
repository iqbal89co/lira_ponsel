<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Pendataan_model","pendataan");
		is_logged_in();
	}

	public function DataCabang()
	{
		$data['title'] = 'Data Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$id = $data['user']['id'];
		$data['datacabang'] = $this->db->query("SELECT `id`,`nama_toko`,`alamat` FROM `data_cabang` WHERE `id` <> $id ")->result_array();


		$this->view->getDefault($data, 'pendataan/datacabang');
	}
	public function tambahCabangBaru()
	{
			$this->pendataan->insertCabangBaru(
			$this->input->post('addUserId'),
			$this->input->post('addNamaToko'),
			$this->input->post('addAlamat')
		);
			redirect('pendataan/datacabang');
	}

	public function deleteCabang($datacabangId)
	{
		// if (!$this->pendataan->deleteCabang($datacabangId)) {
			$this->view->flash('success', 'Cabang Deleted', 'pendataan/datacabang');
		// }
	}

	public function InfoCabang($datacabangId)
	{
		$data['title'] = 'Info Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['datacabang'] = $this->db->query("SELECT `id`,`nama_toko`,`alamat` FROM `data_cabang` WHERE `id`=$datacabangId")->row_array();

		$this->view->getDefault($data, 'pendataan/infocabang');
	}
	
	public function DataStokCabang()
	{
		$data['title'] = 'Data Stok Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$id = $data['user']['id'];
		$data['stokcabang'] = $this->db->query("SELECT `id`,`nama_barang`,`jumlah`  FROM `barang` WHERE `id` <> $id ")->result_array();

		$this->view->getDefault($data, 'pendataan/datastokcabang');
	}
	public function Laporan()
	{
		$data['title'] = 'Laporan Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'pendataan/laporancabang');
	}
}
