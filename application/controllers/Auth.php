<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __contruct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Laman login';
		if ($this->session->userdata('username')) {
			redirect('admin');
		}
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header.php', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer.php');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('User_model', 'user');
		$user = $this->user->getUser($username);

		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);
					//cek role
					if ($data['role_id'] == 1) {
						redirect('admin');
					} else if ($data['role_id'] == 2) {
						redirect('manager');
					} else {
						redirect('toko');
					}
				} else {
					$this->view->flash('danger', 'Wrong password', 'auth');
				}
			} else {
				$this->view->flash('danger', 'This email has not been activated', 'auth');
			}
		} else {
			$this->view->flash('danger', 'Email is not registered', 'auth');
		}

		if (password_verify($password, $user['password'])) {
			$this->session->set_userdata(['username' => $user['username']]);
			redirect('admin');
		}
	}

	public function register()
	{
		$data['title'] = 'Laman login';
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header.php', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer.php');
		} else {
			$data = [
				'name' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('role'),
				'is_active' => 1
			];
			$this->db->insert('user', $data);
			redirect('auth/');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('auth');
	}
}
