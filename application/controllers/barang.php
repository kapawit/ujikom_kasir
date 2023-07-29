<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function index()
	{
        $data["barang"] = $this->barang_model->getAll();
		$this->load->view('header');
		$this->load->view('barang',$data);
		$this->load->view('footer');
	}
	public function add()
	{
        $barang = $this->barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());
        if ($validation->run()) {
            $barang->save();
            $this->session->set_flashdata('message', 'Berhasil disimpan');
        }
		$this->load->view('header');
		$this->load->view('barang-add');
		$this->load->view('footer');
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('barang');

        $barang = $this->barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $barang->update();
            $this->session->set_flashdata('message', 'Berhasil disimpan');
        }

        $data["barang"] = $barang->getById($id);
        if (!$data["barang"]) show_404();
        $this->load->view('header');
        $this->load->view("barang-edit", $data);
        $this->load->view('footer');

    }
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->barang_model->delete($id)) {
            $this->session->set_flashdata('message', 'Berhasil Dihapus');
            redirect(site_url('barang'));
        }
    }

    public function ajax_get_barang() {
        $postData = json_decode($this->input->raw_input_stream, true);
        if (!empty($postData['id'])) {
            $response = $this->barang_model->getById($postData['id']);
            if ($response) {
                echo json_encode($response);
            } else {
                echo json_encode(array('error' => 'Invalid request'));
            }
        } else {
            echo json_encode(array('error' => 'Invalid request'));
        }
    }
}
