<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View_model extends CI_Model
{
	public function getDefault($data, $view)
	{
		$ci = get_instance();
		$ci->load->view('templates/header', $data);
		$ci->load->view('templates/sidebar', $data);
		$ci->load->view('templates/topbar', $data);
		$ci->load->view($view, $data);
		$ci->load->view('templates/footer');
	}

	public function flash($style, $message, $redirect)
	{
		$ci = get_instance();
		$ci->session->set_flashdata('message', '<div class="alert alert-' . $style . '" role="alert">' .
			$message .
			'</div>');
		if ($redirect != '') {
			redirect($redirect);
		}
	}
}
