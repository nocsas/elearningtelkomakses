<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    private $divisi = "divisi";
    private $_table = "karyawan";

    public $nik;
    public $nama_lengkap;
    public $password_login;
    public $id_div;
    public $jabatan;
    public $alamat;
    public $tempat_lahir;
    public $tgl_lahir;
    public $jenis_kelamin;
    public $agama;
    public $email;
    public $no_hp;

    public function rules()
    {
        return [

            ['field' => 'nama_lengkap',
            'label' => 'Nama Lengkap',
            'rules' => 'required'],

            ['field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'tempat_lahir',
            'label' => 'Tempat Lahir',
            'rules' => 'required'],

            ['field' => 'tgl_lahir',
            'label' => 'Tgl Lahir',
            'rules' => 'required'],

            ['field' => 'jenis_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'],

            ['field' => 'agama',
            'label' => 'Agama',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'],

            ['field' => 'no_hp',
            'label' => 'No Hp',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($nik)
    {
        return $this->db->get_where($this->_table, ["nik" => $nik])->row();
    }

    public function getIdDiv()
    {
        return $this->db->get($this->divisi)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nik = $post["nik"];
        $this->nama_lengkap = $post["nama_lengkap"];
        $this->password_login = $post["password_login"];
        $this->id_div = $post["id_div"];
        $this->jabatan = $post["jabatan"];
        $this->alamat = $post["alamat"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tgl_lahir = $post["tgl_lahir"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->agama = $post["agama"];
        $this->email = $post["email"];
        $this->no_hp = $post["no_hp"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nik = $post["nik"];
        $this->nama_lengkap = $post["nama_lengkap"];
        $this->password_login = $post["password_login"];
        $this->id_div = $post["id_div"];
        $this->jabatan = $post["jabatan"];
        $this->alamat = $post["alamat"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tgl_lahir = $post["tgl_lahir"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->agama = $post["agama"];
        $this->email = $post["email"];
        $this->no_hp = $post["no_hp"];
        return $this->db->update($this->_table, $this, array('nik' => $post['nik']));
    }

    public function delete($nik)
    {
        return $this->db->delete($this->_table, array("nik" => $nik));
    }
}