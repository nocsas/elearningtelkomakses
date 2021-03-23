<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    private $divisi = "divisi";
    private $tim    = "tim";
    private $_table = "karyawan";

    public $nik;
    public $nama_lengkap;
    public $password_login;
    public $id_div;
    public $id_tim;
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

    /* mengambil semua data tabel karyawan dan menampilkannya */
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    /* mengambil data dari tabel karyawan berdasarkan nik */
    public function getById($nik)
    {
        return $this->db->get_where($this->_table, ["nik" => $nik])->row();
    }
    
    /* mengambil data karyawan dan menampilkannya bedasarkan nik */
    public function getByNik($nik)
    {
        return $this->db->get_where($this->_table, ["nik" => $nik])->result();
    }

    /* mengambil semua data tabel divisi dan menampilkannya */
    public function getIdDiv()
    {
        return $this->db->get($this->divisi)->result();
    }

    /* mengambil semua data tabel tim dan menampilkannya */
    public function getIdTim()
    {
        return $this->db->get($this->tim)->result();
    }

    /* menampilkan karyawan berdasarkan divisinya */
    public function getKarByIdDiv($id_div)
    {
        return $this->db->get_where($this->_table, ["id_div" => $id_div])->result();
    }

    /* menampilkan karyawan berdasarkan timnya */
    public function getKarByIdTim($id_tim)
    {
        return $this->db->get_where($this->_table, ["id_tim" => $id_tim])->result();
    }

    /* menampilkan data tim berdasarkan id divisinya */
    public function getTimByIdDiv($id_div)
    {
        return $this->db->get_where($this->tim, ["id_div" => $id_div])->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nik = $post["nik"];
        $this->nama_lengkap = $post["nama_lengkap"];
        $this->password_login = md5($post["password_login"]);
        $this->id_div = $post["id_div"];
        $this->id_tim = $post["id_tim"];
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
        $this->password_login = md5($post["password_login"]);
        $this->id_div = $post["id_div"];
        $this->id_tim = $post["id_tim"];
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


    public function login($nik,$password_login){
        $post = $this->input->post();
        $nik = $post["nik"];
        $password_login = md5($post["password_login"]);

        $this->db->where('nik',$nik);
        $this->db->where('password_login',$password_login);
        $result = $this->db->get($this->_table,1);
        return $result;
    }

}