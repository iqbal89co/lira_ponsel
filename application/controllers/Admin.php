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

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->view->getDefault($data, 'admin/menu');
		} else {
			if ($this->menu->insertMenu($this->input->post('menu'))) {
				$this->view->flash('success', 'New menu added', 'admin/menu');
			} else {
				$this->view->flash('danger', 'Add menu failed', 'admin/menu');
			}
		}
	}

	public function deleteMenu($menuId)
	{
		if ($this->menu->deleteMenu($menuId)) {
			$this->view->flash('success', 'Menu Deleted', 'admin/menu');
		}
	}

	public function editMenu($menuId)
	{
		$data['title'] = 'Edit Menu';
		$data['user'] = $this->user->getUser($this->session->userdata('username'));
		$data['menu'] = $this->menu->getAllMenu();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->view->getDefault($data, 'admin/editMenu');
		} else {
			$menuBaru = $this->input->post('menu');
			if ($this->menu->editMenu($menuBaru, $menuId)) {
				$this->view->flash('success', 'Menu Edited', 'admin/menu');
			} else {
				$this->view->flash('danger', 'Something wrong', 'admin/menu/');
			}
		}
	}

	// public function submenu()
	// {
	// 	$data['title'] = 'Submenu Management';
	// 	$email = $this->session->userdata('email');
	// 	$data['user'] = $this->db->query("SELECT * FROM user WHERE email = '$email'")->row_array();

	// 	$this->load->model('Menu_model', 'menu');
	// 	$data['subMenu'] = $this->menu->getSubMenu();
	// 	$data['menu'] = $this->db->query("SELECT * FROM `user_menu`")->result_array();

	// 	$this->form_validation->set_rules('title', 'Title', 'required');
	// 	$this->form_validation->set_rules('menu_id', 'Menu', 'required');
	// 	$this->form_validation->set_rules('url', 'URL', 'required');
	// 	$this->form_validation->set_rules('icon', 'icon', 'required');

	// 	if ($this->form_validation->run() == false) {
	// 		$this->view->getDefault($data, 'manage/submenu');
	// 	} else {
	// 		$data = [
	// 			'menu_id' => $this->input->post('menu_id'),
	// 			'title' => $this->input->post('title'),
	// 			'url' => $this->input->post('url'),
	// 			'icon' => $this->input->post('icon'),
	// 			'is_active' => $this->input->post('is_active')
	// 		];

	// 		//query
	// 		$query = "INSERT INTO `user_sub_menu` VALUES (" . "NULL, '" . implode("', '", $data) . "')";
	// 		$this->db->query($query);
	// 		$this->view->flash('success', 'New submenu added', 'manage/submenu');
	// 	}
	// }


	// public function editsubmenu($submenuId)
	// {
	// 	$data['title'] = 'Edit Submenu';
	// 	$email = $this->session->userdata('email');
	// 	$data['user'] = $this->db->query("SELECT * FROM user WHERE email = '$email'")->row_array();
	// 	$data['submenu'] = $this->db->query("SELECT * FROM `user_sub_menu` WHERE `id` = $submenuId")->row_array();
	// 	$data['menu'] = $this->db->query("SELECT * FROM `user_menu`")->result_array();

	// 	$this->form_validation->set_rules('title', 'Title', 'required');
	// 	$this->form_validation->set_rules('menu_id', 'Menu', 'required');
	// 	$this->form_validation->set_rules('url', 'URL', 'required');
	// 	$this->form_validation->set_rules('icon', 'icon', 'required');

	// 	if ($this->form_validation->run() == false) {
	// 		$this->view->getDefault($data, 'manage/editSubmenu');
	// 	} else {
	// 		$title = $this->input->post('title');
	// 		$menuId = $this->input->post('menu_id');
	// 		$url = $this->input->post('url');
	// 		$icon = $this->input->post('icon');
	// 		$active = $this->input->post('is_active');
	// 		//query
	// 		if ($this->db->query("UPDATE `user_sub_menu` 
	// 								SET `title` = '$title', `menu_id` = $menuId, `url` = '$url', 
	// 								`icon` = '$icon', `is_active` = $active 
	// 								WHERE `id` = $submenuId")) {
	// 			$this->view->flash('success', 'Submenu edited', 'manage/submenu/');
	// 		} else {
	// 			$this->view->flash('danger', 'Something wrong', 'manage/editsubmenu/' . $submenuId);
	// 		}
	// 	}
	// }


	// public function subdelete($subMenuId)
	// {
	// 	//query
	// 	$this->db->query("DELETE FROM `user_sub_menu` WHERE `id` = $subMenuId");
	// 	$this->view->flash('success', 'Submenu Deleted', 'manage/submenu');
	// }
}
