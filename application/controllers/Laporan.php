<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function index()
	{
        $data["penjualan"] = $this->penjualan_model->get_laporan_per_shift();
		$this->load->view('header');
		$this->load->view('Laporan',$data);
		$this->load->view('footer');
	}
}
