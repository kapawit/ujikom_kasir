<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('user_id') != null) {
            redirect(site_url('penjualan'));
        }
		
		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('login');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->auth_model->login($username, $password)){
			$data = $this->shift_model->cek_status_shift($this->session->userdata("user_id"));
			if ($data->Status == "BUKA") {
				$this->session->set_userdata('status_shift', 'BUKA');
				$this->session->set_userdata('shift_id', $data->ID_Shift);
			}
			redirect('Shift');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}
		$this->load->view('login');
	}

	public function logout()
	{
		$this->auth_model->logout();
		redirect(site_url());
	}
	
}
