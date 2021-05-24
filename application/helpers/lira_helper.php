<?php

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('auth');
	}
}

function check_active_submenu($submenu_id)
{
	$ci = get_instance();

	$result = $ci->db->query("SELECT is_active FROM `sub_menu` WHERE `id` = $submenu_id");

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}
