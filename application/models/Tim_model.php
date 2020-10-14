<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tim_model extends CI_Model
{
    private $divisi = "divisi";
    private $_table = "tim";

    public $id_tim;
    public $id_div;
    public $nama;

    public function rules()
    {
        return [

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_tim)
    {
        return $this->db->get_where($this->_table, ["id_tim" => $id_tim])->row();
    }

    public function getIdDiv()
    {
        return $this->db->get($this->divisi)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_tim = $post["id_tim"];
        $this->id_div = $post["id_div"];
        $this->nama = $post["nama"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_tim = $post["id_tim"];
        $this->id_div = $post["id_div"];
        $this->nama = $post["nama"];
        return $this->db->update($this->_table, $this, array('id_tim' => $post['id_tim']));
    }

    public function delete($id_tim)
    {
        return $this->db->delete($this->_table, array("id_tim" => $id_tim));
    }
}