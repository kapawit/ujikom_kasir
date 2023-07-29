<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('shift_id') == null) {
            $this->session->set_flashdata('message', 'Anda Belum Memulai Shift. SIlahkan Masukan Saldo Awal');
            redirect(site_url('shift/buka'));
        }
        if ($this->session->userdata('status_shift') == "TUTUP") {
            $this->session->set_flashdata('message', 'Shift Anda Telah Berakhir');
            redirect(site_url('shift/tutup'));
        }
    }

	public function index()
	{
        $data["barang"] = $this->barang_model->getAll();
		$this->load->view('header');
		$this->load->view('penjualan',$data);
		$this->load->view('footer');
    }
    
	public function add_cart()
	{
        $penjualan = $this->penjualan_model;
        $validation = $this->form_validation;
        $validation->set_rules($penjualan->rules_cart());
        if ($validation->run()) {
            $penjualan->add_cart();
            $this->session->set_flashdata('message', 'Berhasil disimpan');
        }
        redirect(site_url('penjualan'));
    }
	public function clear_cart()
	{
        $penjualan = $this->penjualan_model;
        $penjualan->clear_cart();
        $this->session->set_flashdata('message', 'Reset Cart Berhasil');
        redirect(site_url('penjualan'));
    }

	public function delete_cart($id = null)
	{
        if (!isset($id)) show_404();
        $penjualan = $this->penjualan_model;
        $penjualan->delete_cart($id);
        $this->session->set_flashdata('message', 'Hapus Item Berhasil');
        redirect(site_url('penjualan'));
    }

    public function save_penjualan()
	{
        $penjualan = $this->penjualan_model;
        $validation = $this->form_validation;
        $validation->set_rules($penjualan->rules_save_penjualan());
        if ($validation->run()) {
            $id_penjualan = $penjualan->save_penjualan();
            if( $id_penjualan ){
                foreach ($this->cart->contents() as $key => $items) {
                    $data = array(
                        'ID_Penjualan' => $id_penjualan,
                        'ID_Barang' => $items['ID_Barang'],
                        'kuantitas' => $items['qty'],
                        'HargaSatuan' => $items['HargaSatuan'],
                        'Sub_Total' => $items['Sub_Total'],
                    );
                    $penjualan->save_detail_penjualan($data);
                    $penjualan->clear_cart();
                    redirect(site_url('penjualan/cetak/'.$id_penjualan));
                }
                redirect(site_url('penjualan/cetak/'.$id_penjualan));
                $this->session->set_flashdata('message', 'Transaksi disimpan');
            }
        }
        redirect(site_url('penjualan'));
    }
    public function cetak($id=null)
	{
        $data["barang"] = $this->penjualan_model->get_cetak($id);
		$this->load->view('header');
		$this->load->view('cetak',$data);
		$this->load->view('footer');
    }

}
