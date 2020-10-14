<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi_model extends CI_Model
{
    private $_table = "divisi";

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
    
    public function getById($id_div)
    {
        return $this->db->get_where($this->_table, ["id_div" => $id_div])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_div = $post["id_div"];
        $this->nama = $post["nama"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_div = $post["id_div"];
        $this->nama = $post["nama"];
        return $this->db->update($this->_table, $this, array('id_div' => $post['id_div']));
    }

    public function delete($id_div)
    {
        return $this->db->delete($this->_table, array("id_div" => $id_div));
    }
}