<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'dashboard toko';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'toko/dashboard');
	}
}
