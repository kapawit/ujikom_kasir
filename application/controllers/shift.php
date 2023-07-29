<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends CI_Controller {
    public function index(){
        $this->load->view('header');
        $this->load->view('shift-welcome');
        $this->load->view('footer');
    }
	public function buka()
	{
        $shift = $this->shift_model;
        $validation = $this->form_validation;
        $validation->set_rules($shift->rules_buka());
        if ($validation->run()) {
            $shift_id = $shift->buka();
            $this->session->set_userdata('shift_id',  $shift_id);
            $this->session->set_flashdata('message', 'Berhasil disimpan');
        }

        $data['kasir'] = $this->kasir_model->getById($this->session->userdata('user_id'));
        if($this->session->userdata('shift_id')) {
            $shift = $this->shift_model->getById($this->session->userdata('shift_id'));
            $data['status'] = "disabled";
            $data["SaldoAwal"] = $shift->SaldoAwal;
        } else {
            $data['status'] = "";
            $data["SaldoAwal"] = null;
        }
        $this->load->view('header');
        $this->load->view('shift-buka',$data);
        $this->load->view('footer');
    }

	public function lihat()
	{
        if ($this->session->userdata("status_shift") == null) {
            $this->session->set_flashdata('message', 'Anda Belum Membuka Shift. Silahkan BUka Shift Terlebih Dahulu');
            redirect(site_url('shift/buka'));
        } else if($this->session->userdata("status_shift") == "BUKA" || $this->session->userdata("status_shift") == "TUTUP") {
            $data["shift"] = $this->shift_model->getById($this->session->userdata('shift_id'));
            $data['kasir'] = $this->kasir_model->getById($this->session->userdata('user_id'));
            $data["penjualan"] = $this->penjualan_model->getTotalPenjualan($this->session->userdata('shift_id'));

            $this->load->view('header');
            $this->load->view('shift-lihat',$data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Anda Belum Membuka Shift. Silahkan BUka Shift Terlebih Dahulu');
            redirect(site_url('shift/buka'));
        }
	}

	public function tutup()
	{   
       if ($this->session->userdata("status_shift") == "BUKA") {
            $shift = $this->shift_model;
            $data_shift = $shift->getById($this->session->userdata('shift_id'));
            $total_penjualan = $this->penjualan_model->getTotalPenjualan($this->session->userdata('shift_id'));
            $jumlah_penjualan = $this->penjualan_model->getJumlahPenjualan($this->session->userdata('shift_id'));
            $data = array(
                'WaktuBuka' => $data_shift->WaktuBuka,
                'SaldoAwal' => $data_shift->SaldoAwal,
                'JumlahPenjualan' => $jumlah_penjualan,
                'SaldoAkhir' => $total_penjualan->Total + $data_shift->SaldoAwal,
                'WaktuTutup' => date('Y-m-d H:i:s'),
            );
            $shift->tutup($data);
            $this->session->set_flashdata('message', 'Berhasil disimpan');
            redirect(site_url('shift/lihat'));
        } else {
            $this->session->set_flashdata('message', 'Anda Belum Membuka Shift. Silahkan BUka Shift Terlebih Dahulu');
            redirect(site_url('shift/buka'));
        }
	}

}
