<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Pendataan_model", "pendataan");
		$this->load->model('Penjualan_model', 'jual');
		$this->load->model('Gudang_model', 'gudang');
		is_logged_in();
	}

	public function DashboardManager()
	{
		$data['title'] = 'Dashboard Manager';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'manager/dashboard');
	}

	public function DataCabang()
	{
		$data['title'] = 'Data Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$id = $data['user']['id'];
		$data['availableUser'] = $this->pendataan->availableUser();
		$data['datacabang'] = $this->db->query("SELECT `id`,`nama_toko`,`alamat` FROM `data_cabang` WHERE `id` <> $id ")->result_array();

		$this->view->getDefault($data, 'pendataan/datacabang');
	}
	public function tambahCabangBaru()
	{
		$this->pendataan->insertCabangBaru(
			$this->input->post('UserId'),
			$this->input->post('NamaToko'),
			$this->input->post('Alamat'),
			$this->input->post('NoTelp')
		);
	}

	public function tampilEdit()
	{
		echo json_encode($this->pendataan->tampilEdit());
	}
	public function deleteCabang($datacabangId)
	{
		if (!$this->pendataan->deleteCabang($datacabangId)) {
			$this->view->flash('success', 'Cabang Deleted', 'pendataan/datacabang');
		}
	}

	public function editCabang()
	{
		$this->pendataan->editCabang(
			$this->input->post('CabangId'),
			$this->input->post('UserId'),
			$this->input->post('CabangTitle'),
			$this->input->post('CabangAlamat'),
		);
	}

	public function InfoCabang($datacabangId)
	{
		$data['title'] = 'Data Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['datacabang'] = $this->db->query("SELECT `data_cabang`.`id`, `nama_toko`, `alamat`, `no_telp`, `user`.`id` AS `user_id`, `user`.`name`, `role_id`, `name`
		FROM `data_cabang`
		JOIN `user`
		ON `data_cabang`.`user_id`=`user`.`id` WHERE `data_cabang`.`id`=$datacabangId
		")->row_array();
		$data['availableUser'] = $this->pendataan->availableUser();
		$data['layanan'] = $this->pendataan->tampilEdit();

		$this->view->getDefault($data, 'pendataan/infocabang');
	}

	public function StokCabang($datacabangId)
	{
		$data['title'] = 'Stok Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['datacabang'] = $this->db->query("SELECT * FROM `data_cabang` WHERE `id`=$datacabangId")->row_array();

		$this->view->getDefault($data, 'pendataan/stokcabang');
	}

	public function CabangSuccess($message)
	{
		$result = str_replace('%20', ' ', $message);
		$this->view->flash('success', $result, 'pendataan/datacabang');
	}

	public function DataStokCabang()
	{
		$data['title'] = 'Data Stok Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$id = $data['user']['id'];
		$data['datacabang'] = $this->db->query("SELECT `id`,`nama_toko` FROM `data_cabang` WHERE `id` <> $id ")->result_array();

		$this->view->getDefault($data, 'pendataan/datastokcabang');
	}
	public function penjualanCSV($datacabangId)
	{
		$penjualan = $this->jual->getOrderSum($datacabangId);
		$filename = 'penjualan' . date('Ymd') . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; ");

		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("INVOICE", "ID PEMBELIAN", "NAMA PELANGGAN", "TOTAL PEMBELIAN", "TANGGAL PEMBELIAN", "ID CABANG");
		fputcsv($file, $header);
		foreach ($penjualan as $key => $line) {
			fputcsv($file, $line);
		}
		fclose($file);
		exit;
	}

	public function Laporan()
	{
		$data['title'] = 'Laporan Cabang';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'pendataan/laporancabang');
	}
}
