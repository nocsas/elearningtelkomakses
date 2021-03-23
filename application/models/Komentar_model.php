<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar_model extends CI_Model
{
    private $_table = "komentar";
    private $materi = "materi";

    public $id_kom;
    public $id_file;
    public $status_kom;
    public $nama;
    public $nik;
    public $isi;

    public function rules()
    {
        return [

            ['field' => 'isi',
            'label' => 'Isi',
            'rules' => 'required']
        ];
    }

    /* mengambil semua data yang ada di tabel komentar */
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    /* mengambil data komentar berdasarkan id filenya */
    public function getKomByIdFile($id_file)
    {
        return $this->db->get_where($this->_table, ["id_file" => $id_file])->result();
    }

    /* mengambil data materi berdasarkan id filenya */
    public function getMatByIdFile($id_file)
    {
        return $this->db->get_where($this->materi, ["id_file" => $id_file])->row();
    }

    public function send()
    {
        $post = $this->input->post();
        $this->id_kom   = uniqid();
        $this->id_file  = $post["id_file"];
        $this->status_kom  = uniqid();
        $this->nama     = $post["nama"];
        $this->nik      = $post["nik"];
        $this->isi      = $post["isi"];
        return $this->db->insert($this->_table, $this);
    }

    public function delete($id_kom)
    {
        return $this->db->delete($this->_table, array("id_kom" => $id_kom));
    }


}