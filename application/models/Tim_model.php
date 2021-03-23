<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tim_model extends CI_Model
{
    private $divisi = "divisi";
    private $karyawan = "karyawan";
    private $_table = "tim";

    public $id_tim;
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

    /* mengambil semua data yang ada di tabel tim */
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    /* mengambil data dari tabel tim berdasarkan id tim */
    public function getById($id_tim)
    {
        return $this->db->get_where($this->_table, ["id_tim" => $id_tim])->row();
    }

    /* mengambil data tim berdasarkan id divisinya */
    public function getIdTimByIdDiv($id_div)
    {
        return $this->db->get_where($this->_table, ["id_div" => $id_div])->result();
    }

    /* mengambil semua data yang ada di tabel divisi */
    public function getIdDiv()
    {
        return $this->db->get($this->divisi)->result();
    }

    /* mengambil data dari tabel karyawan dengan jabatan team leader */
    public function getByJabatan($jabatan = "Team Leader")
    {
        return $this->db->get_where($this->karyawan, ["jabatan" => $jabatan])->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_tim = $post["id_tim"];
        $this->id_div = $post["id_div"];
        $this->nama = $post["nama"];
        $this->pengampu = $post["pengampu"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_tim = $post["id_tim"];
        $this->id_div = $post["id_div"];
        $this->nama = $post["nama"];
        $this->pengampu = $post["pengampu"];
        return $this->db->update($this->_table, $this, array('id_tim' => $post['id_tim']));
    }

    public function delete($id_tim)
    {
        return $this->db->delete($this->_table, array("id_tim" => $id_tim));
    }
}