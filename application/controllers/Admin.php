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
			$this->input->post('mennu'),
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
}
