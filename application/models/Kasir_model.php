<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_model extends CI_Model
{
    private $_table = "kasir";

    public $ID_Kasir;
    public $Username;
    public $NamaKasir;
    public $Alamat;
    public $NomorHP;
    public $NomorKTP;
    public $Password;

    public function rules()
    {
        return [
            ['field' => 'Username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'NamaKasir',
            'label' => 'NamaKasir',
            'rules' => 'required'],
            
            ['field' => 'Alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'NomorHP',
            'label' => 'NomorHP',
            'rules' => 'required|numeric'],

            ['field' => 'NomorKTP',
            'label' => 'NomorKTP',
            'rules' => 'required|numeric'],

            ['field' => 'Password',
            'label' => 'Password',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["ID_Kasir" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->Username = $post["Username"];
        $this->NamaKasir = $post["NamaKasir"];      
        $this->Alamat = $post["Alamat"];
        $this->NomorHP = $post["NomorHP"];
        $this->NomorKTP = $post["NomorKTP"];
        $this->Password = $post["Password"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_kasir = $post["ID_Kasir"];
        $this->Username = $post["Username"];
        $this->NamaKasir = $post["NamaKasir"];      
        $this->Alamat = $post["Alamat"];
        $this->NomorHP = $post["NomorHP"];
        $this->NomorKTP = $post["NomorKTP"];
        $this->Password = $post["Password"];
        return $this->db->update($this->_table, $this, array('ID_Kasir' => $post['ID_Kasir']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_Kasir" => $id));
    }
}