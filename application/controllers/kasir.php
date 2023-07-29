<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	public function index()
	{
		$data["kasir"] = $this->kasir_model->getAll();
		$this->load->view('header');
		$this->load->view('kasir',$data);
		$this->load->view('footer');
	}
	public function add()
	{
        $kasir = $this->kasir_model;
        $validation = $this->form_validation;
        $validation->set_rules($kasir->rules());
        if ($validation->run()) {
            $kasir->save();
            $this->session->set_flashdata('message', 'Berhasil disimpan');
        }
		$this->load->view('header');
		$this->load->view('kasir-add');
		$this->load->view('footer');
    }
    
	public function edit($id = null)
    {
        if (!isset($id)) redirect('kasir');

        $kasir = $this->kasir_model;
        $validation = $this->form_validation;
        $validation->set_rules($kasir->rules());
        if ($validation->run() == TRUE) {
            $kasir->save();
            $this->session->set_flashdata('message', 'Berhasil disimpan');
        }
		$data["kasir"] = $kasir->getById($id);
        if (!$data["kasir"]) show_404();
        $this->load->view('header');
        $this->load->view("kasir-edit", $data);
        $this->load->view('footer');

	}
	public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kasir_model->delete($id)) {
            $this->session->set_flashdata('message', 'Berhasil Dihapus');
            redirect(site_url('kasir'));
        }
    }
}
