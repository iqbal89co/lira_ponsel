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

	public function switchActiveSubMenu()
	{
		$submenuId = $this->input->post('submenuId');
		if ($this->menu->check_active_submenu($submenuId)) {
			$this->menu->activateSubmenu();
		} else {
			$this->menu->deactivateSubmenu();
		}
	}

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
