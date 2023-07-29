<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shift_model extends CI_Model
{
    private $_table = "shift";

    public $ID_Shift;
    public $ID_Kasir;
    public $WaktuBuka;
    public $SaldoAwal;
    public $JumlahPenjualan;
    public $SaldoAkhir;
    public $WaktuTutup;
    public $Status;

    public function rules_buka()
    {
        return [
            ['field' => 'SaldoAwal',
            'label' => 'SaldoAwal',
            'rules' => 'required|numeric']

        ];
    }

    public function buka()
    {
        $post = $this->input->post();
        $this->ID_Kasir = $this->session->userdata('user_id');
        $this->SaldoAwal = $post["SaldoAwal"];
        $this->WaktuBuka = date('Y-m-d H:i:s');
        $this->Status = "BUKA";
        $this->session->set_userdata('status_shift', 'BUKA');
        $this->db->insert($this->_table, $this);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function cekBuka($id)
    {
        return $this->db->get_where($this->_table, ["ID_Shift" => $id])->row();
    }
    public function cek_status_shift($id)
    {
        return $this->db->get_where($this->_table, ["ID_Kasir" => $id])->row();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["ID_Shift" => $id])->row();
    }

    public function tutup($data)
    {
        $this->ID_Shift = $this->session->userdata('shift_id');
        $this->ID_Kasir = $this->session->userdata('user_id');
        $this->WaktuBuka = $data['WaktuBuka'];
        $this->SaldoAwal = $data['SaldoAwal'];
        $this->JumlahPenjualan = $data['JumlahPenjualan'];
        $this->SaldoAkhir = $data['SaldoAkhir'];
        $this->WaktuTutup = $data['WaktuTutup'];
        $this->Status = "TUTUP";
        $this->session->set_userdata('status_shift', 'TUTUP');
        return $this->db->update($this->_table, $this, array('ID_Shift' => $this->session->userdata('shift_id')));
    }

}