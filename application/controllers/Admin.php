<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'dashboard admin';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));

		$this->view->getDefault($data, 'admin/dashboard');
	}

	public function menu()
	{
		$data['title'] = 'menu management';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['menu'] = $this->menu->getAllMenu();

		$this->view->getDefault($data, 'admin/menu');
	}

	public function addNewMenu()
	{
		$this->menu->insertMenu($this->input->post('menu'));
	}

	// succcess flash
	public function menuSuccess($message)
	{
		$result = str_replace('%20', ' ', $message);
		$this->view->flash('success', $result, 'admin/menu');
	}

	public function addNewSubmenu()
	{
		$this->menu->insertNewSubmenu(
			$this->input->post('menu'),
			$this->input->post('submenu'),
			$this->input->post('url'),
			$this->input->post('icon')
		);
	}

	public function accessCheckFromAjax()
	{
		$menuId = $this->input->post('menuId');
		$roleId = $this->input->post('roleId');
		echo $this->menu->check_menu_access($menuId, $roleId);
	}
	public function accessMenu()
	{
		$this->menu->update_user_access($this->input->post('roleData'), $this->input->post('menuId'));
	}

	public function deleteMenu($menuId)
	{
		if (!$this->menu->deleteMenu($menuId)) {
			$this->view->flash('success', 'Menu Deleted', 'admin/menu');
		}
	}

	public function getDataforEditMenu($data)
	{
		$result = $this->menu->idMenutoName($this->input->post('menu'));
		echo $result[$data];
	}
	public function getDataforEditSubmenu($data)
	{
		$result = $this->menu->idSubmenutoData($this->input->post('submenuId'));
		echo $result[$data];
	}

	public function editMenu()
	{
		$menuId = $this->input->post('menuId');
		$menuBaru = $this->input->post('menuTitle');
		$this->menu->editMenu($menuBaru, $menuId);
	}

	public function editSubmenu()
	{
		$this->menu->editSubmenuData(
			$this->input->post('submenuId'),
			$this->input->post('submenuTitle'),
			$this->input->post('submenuUrl'),
			$this->input->post('submenuIcon')
		);
	}

	public function deleteSubmenu($submenuId)
	{
		if (!$this->menu->deleteSubmenu($submenuId)) {
			$this->view->flash('success', 'Submenu Deleted', 'admin/menu');
		}
	}

	public function manageuser()
	{
		$data['title'] = 'user management';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['master'] = $this->user->ambilData();

		$this->view->getDefault($data, 'admin/manageuser');
	}

	public function tambah_data()
	{
		$data['title'] = 'user management';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['master'] = $this->user->ambilData();

		$this->view->getDefault($data, 'admin/tambahdata');
	}

	public function proses_tambah_data()
	{
		$data =  [
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => $this->input->post('role'),
			'is_active' => 1
		];
		$this->db->insert('user', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Berhasil ditambah!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('Admin/manageuser');
	}

	public function hapus_data($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('user');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Berhasil dihapus!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');

		redirect('Admin/manageuser');
	}

	public function edit_data($id)
	{
		$data['title'] = 'user management';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['master'] = $this->user->ambil_id_user($id);


		$this->view->getDefault($data, 'admin/editdata');
	}

	public function proses_edit_data()
	{

		$this->user->proses_edit_data();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Berhasil diedit!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('Admin/manageuser');
	}
}
