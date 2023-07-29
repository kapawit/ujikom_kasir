<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    private $_table = "penjualan";

    public $ID_Penjualan;
    public $total;
    public $kuantitas;

    public function rules_transaksi()
    {
        return [
            ['field' => 'Total',
            'label' => 'Total',
            'rules' => 'required']
        ];
    }
    public function rules_cart()
    {
        return [
            ['field' => 'ID_Barang',
            'label' => 'ID_Barang',
            'rules' => 'required'],

            ['field' => 'HargaSatuan',
            'label' => 'HargaSatuan',
            'rules' => 'numeric'],

            ['field' => 'Kuantitas',
            'label' => 'Kuantitas',
            'rules' => 'required|numeric']
        ];
    }

    public function rules_save_penjualan()
    {
        return [
            ['field' => 'Total',
            'label' => 'Total',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function add_cart() {
        $post = $this->input->post();
        $data = array(
            'id'      => $post["ID_Barang"],
            'qty'     => $post["Kuantitas"],
            'price'   => $post["HargaSatuan"],
            'name'    => $post["Nama_Barang"],
            'ID_Barang' => $post["ID_Barang"],
            'Kuantitas' => $post["Kuantitas"],
            'HargaSatuan' => $post["HargaSatuan"],
            'Sub_Total' => $post["HargaSatuan"] * $post["Kuantitas"]
        );
        
        $this->cart->insert($data);
    }

    public function clear_cart() {
        $this->cart->destroy();
    }

    public function delete_cart($id)
    {
        $data = array(
            'rowid'  => $id,
            'qty'    => 0,
        );
        return $this->cart->update($data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["ID_Penjualan" => $id])->row();
    }

    public function save_penjualan() {
        $post = $this->input->post();
        $data = array(
            'WaktuTransaksi'    => date('Y-m-d H:i:s'),
            'Total'             => $post["Total"],
            'ID_Shift'          => $this->session->userdata('shift_id')
        );
        $this->db->insert($this->_table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function save_detail_penjualan($data) {
        $this->db->insert('detail_penjualan', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function getTotalPenjualan($id)
    {
        $query = $this->db->select_sum('Total')
        ->get_where($this->_table, ["ID_Shift" => $id])
        ->row();
        return $query;
    }
    public function getJumlahPenjualan($id)
    {
        $query = $this->db->get_where($this->_table, ["ID_Shift" => $id])->num_rows();
        return $query;
    }

    public function get_laporan_per_shift()
    {
        $query = $this->db->get_where($this->_table, ["ID_Shift" => $this->session->userdata('shift_id')]);
        return $query->result();
    }

    public function get_cetak($id)
    {
        $query = $this->db->select('*')
                            ->from('detail_penjualan')
                            ->join('barang', 'detail_penjualan.ID_barang = barang.ID_barang', 'inner')
                            ->where('detail_penjualan.ID_Penjualan', $id)
                            ->get();

        return $query->result();
    }
}