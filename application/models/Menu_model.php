<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getAllMenu()
	{
		$query = "SELECT * FROM `menu`";
		return $this->db->query($query)->result_array();
	}

	public function getMenu($role_id)
	{
		$query = "SELECT `menu`.`id`, `menu` FROM `menu`
			JOIN `user_access_menu`
			ON `menu`.`id`=`user_access_menu`.`menu_id`
			WHERE `role_id`=$role_id ORDER BY `menu_id` ASC";
		return $this->db->query($query)->result_array();
	}

	public function getSubMenu($menuId)
	{
		$query = "SELECT * FROM `sub_menu` WHERE `menu_id`=$menuId";
		return $this->db->query($query)->result_array();
	}

	public function insertMenu($menuBaru)
	{
		$query = "INSERT INTO `user_menu` VALUES (NULL, '$menuBaru')";
		$this->db->query($query);
	}

	public function editMenu($menuBaru, $menuId)
	{
		$query = "UPDATE `menu` SET `menu` = '$menuBaru' WHERE `id` = $menuId";
		$this->db->query($query);
	}

	public function deleteMenu($menuId)
	{
		$query = "DELETE FROM `menu` WHERE `id` = $menuId";
		$this->db->query($query);
	}
}
