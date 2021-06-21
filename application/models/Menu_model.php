<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getAllMenu()
	{
		$query = "SELECT * FROM `menu`";
		return $this->db->query($query)->result_array();
	}

	public function getAllRole()
	{
		$query = "SELECT * FROM `user_role`";
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
		$query = "INSERT INTO `menu` VALUES (NULL, '$menuBaru')";
		$this->db->query($query);
	}

	public function idMenutoName($menuId)
	{
		$query = "SELECT menu FROM menu WHERE id=$menuId";
		return $this->db->query($query)->row_array();
	}

	public function check_menu_access($menuId, $roleId)
	{
		$query = "SELECT * FROM `user_access_menu` WHERE `role_id` = $roleId AND `menu_id` = $menuId";
		if ($this->db->query($query)->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function update_user_access($roleCode, $menuId)
	{
		$query1 = "DELETE FROM `user_access_menu` WHERE `menu_id`=$menuId";

		$this->db->trans_start();
		$this->db->query($query1);

		$roleCleaned = str_split($roleCode);
		$query2 = "INSERT INTO `user_access_menu` VALUES ";
		$countChecked = 0;
		$ctlp = 0;
		$getLastPosition = 0;
		foreach ($roleCleaned as $rc) {
			$ctlp++;
			if ($rc == 1) {
				$countChecked++;
				$getLastPosition = $ctlp;
			}
		}
		$ctlp = 0;
		$ct = 0;
		foreach ($roleCleaned as $rc) {
			if ($rc == 1) {
				$query2 .= "(NULL, " . $this->getAllRole()[$ct]['id'] . ", " . $menuId . ")";
			}
			$ct++;
			if ($rc == 1 && !($ct >= $getLastPosition)) {
				$query2 .= ", ";
			}
		}
		if ($countChecked != 0) {
			$this->db->query($query2);
		}
		$this->db->trans_complete();
	}

	public function editMenu($menuBaru, $menuId)
	{
		$query = "UPDATE `menu` SET `menu` = '$menuBaru' WHERE `id` = $menuId";
		$this->db->query($query);
	}

	public function deleteMenu($menuId)
	{
		$query1 = "DELETE FROM `menu` WHERE `id` = $menuId";
		$query2 = "DELETE FROM `sub_menu` WHERE `menu_id` = $menuId";
		$query3 = "DELETE FROM `user_access_menu` WHERE `menu_id` = $menuId";
		$this->db->trans_start();
		$this->db->query($query1);
		$this->db->query($query2);
		$this->db->query($query3);
		$this->db->trans_complete();
	}

	public function manageSubMenu($menuId)
	{
		$query = "SELECT sub_menu.id AS submenuId, menu.id, sub_menu.title, sub_menu.url, sub_menu.icon, sub_menu.is_active
					FROM sub_menu JOIN menu
					ON sub_menu.menu_id = menu.id
					WHERE sub_menu.menu_id = $menuId";
		return $this->db->query($query)->result_array();
	}

	public function insertNewSubmenu($menuId, $title, $url, $icon)
	{
		$query = "INSERT INTO `sub_menu` VALUES(NULL, $menuId, '$title', '$url', '$icon', 1)";
		$this->db->query($query);
	}

	public function editSubmenuData($submenuId, $title, $url, $icon)
	{
		$query = "UPDATE `sub_menu` SET `title`='$title', `url`='$url', `icon`='$icon' WHERE `id`=$submenuId";
		$this->db->query($query);
	}

	public function deleteSubmenu($submenuId)
	{
		$query = "DELETE FROM `sub_menu` WHERE `id` = $submenuId";
		$this->db->query($query);
	}

	public function idSubmenutoData($submenuId)
	{
		$query = "SELECT * FROM `sub_menu` WHERE id = $submenuId";
		return $this->db->query($query)->row_array();
	}
}
