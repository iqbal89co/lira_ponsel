<?php

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('auth');
	} else {
		$role_id = $ci->session->userdata('role_id');
		$role = $ci->db->query("SELECT id, `role` FROM user_role WHERE id=$role_id")->row_array();
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->query("SELECT * FROM `menu` WHERE `menu` = '$menu'")->row_array();
		$menu_id = $queryMenu['id'];

		$userAccess = $ci->db->query("SELECT * FROM `user_access_menu` WHERE `role_id` = $role_id AND `menu_id` = $menu_id");

		if ($userAccess->num_rows() < 1) {
			redirect($role['role']);
		}
	}
}
