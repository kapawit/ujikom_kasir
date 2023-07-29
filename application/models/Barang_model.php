<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    private $_table = "barang";

    public $ID_barang;
    public $Nama_Barang;
    public $Satuan;
    public $HargaSatuan;

    public function rules()
    {
        return [
            ['field' => 'Nama_Barang',
            'label' => 'Nama Barang',
            'rules' => 'required'],

            ['field' => 'Satuan',
            'label' => 'Satuan',
            'rules' => 'required'],
            
            ['field' => 'HargaSatuan',
            'label' => 'Harga Satuan',
            'rules' => 'required|numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["ID_barang" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->Nama_Barang = $post["Nama_Barang"];
        $this->Satuan = $post["Satuan"];
        $this->HargaSatuan = $post["HargaSatuan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_barang = $post["ID_barang"];
        $this->Nama_Barang = $post["Nama_Barang"];
        $this->Satuan = $post["Satuan"];
        $this->HargaSatuan = $post["HargaSatuan"];
        return $this->db->update($this->_table, $this, array('ID_barang' => $post['ID_barang']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_barang" => $id));
    }
}