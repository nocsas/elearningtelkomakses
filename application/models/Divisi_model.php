<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi_model extends CI_Model
{
    private $_table = "divisi";
    private $karyawan = "karyawan";

    public $id_div;
    public $nama;
    public $pengampu;

    public function rules()
    {
        return [

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required']
        ];
    }

    /* mengambil semua data tabel divisi */
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    /* mengambil data divisi berdasarkan id divisi */
    public function getById($id_div)
    {
        return $this->db->get_where($this->_table, ["id_div" => $id_div])->row();
    }

    /* mengambil data dari tabel karyawan dengan jabatan site manager */
    public function getByJabatan($jabatan = "Site Manager")
    {
        return $this->db->get_where($this->karyawan, ["jabatan" => $jabatan])->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_div = $post["id_div"];
        $this->nama = $post["nama"];
        $this->pengampu = $post["pengampu"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_div = $post["id_div"];
        $this->nama = $post["nama"];
        $this->pengampu = $post["pengampu"];
        return $this->db->update($this->_table, $this, array('id_div' => $post['id_div']));
    }

    public function delete($id_div)
    {
        return $this->db->delete($this->_table, array("id_div" => $id_div));
    }
}