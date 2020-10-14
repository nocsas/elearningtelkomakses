<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_model extends CI_Model
{
    private $divisi = "divisi";
    private $tim = "tim";
    private $_table = "materi";

    public $id_file;
    public $judul;
    public $id_div;
    public $id_tim;
    public $file;
    public $tgl_posting;
    public $pembuat;

    public function rules()
    {
        return [

            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],

            ['field' => 'id_div',
            'label' => 'Id Divisi',
            'rules' => 'required'],

            ['field' => 'id_tim',
            'label' => 'Id Tim',
            'rules' => 'required'],

            ['field' => 'file',
            'label' => 'Nama File',
            'rules' => 'required'],

            ['field' => 'tgl_posting',
            'label' => 'Tgl Posting',
            'rules' => 'required'],

            ['field' => 'pembuat',
            'label' => 'Pembuat',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_file)
    {
        return $this->db->get_where($this->_table, ["id_file" => $id_file])->row();
    }

    public function getIdDiv()
    {
        return $this->db->get($this->divisi)->result();
    }

    public function getIdTim()
    {
        return $this->db->get($this->tim)->result();
    }
    
    private function uploadFile()
    {
        $config['upload_path'] = '.upload/materi/';
        $config['allowed_types'] = 'pdf|docx|doc';
        $config['file_name'] = $this->id_file;
        $config['overwrite'] = true;
        $config['max_size'] = 30000;

        $this->load->library('upload'. $config);

        if ($this->upload->do_upload('file'))
        {
            return $this->upload->data("file_name");
        }
        return "";
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_file = uniqid();
        $this->judul = $post["judul"];
        $this->id_div = $post["id_div"];
        $this->id_tim = $post["id_tim"];
        $this->file = $this->uploadFile();
        $this->tgl_posting = $post["tgl_posting"];
        $this->pembuat = $post["pembuat"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_file = $post["id_file"];
        $this->judul = $post["judul"];
        $this->id_div = $post["id_div"];
        $this->id_tim = $post["id_tim"];
        
        if(!empty($_FILES["file"]["judul"]))
        {
            $this->file = $this->uploadFile();
        } else {
            $this->file = $post["old_file"];
        }
        
        $this->tgl_posting = $post["tgl_posting"];
        $this->pembuat = $post["pembuat"];
        return $this->db->update($this->_table, $this, array('id_file' => $post['id_file']));
    }

    public function delete($id_file)
    {
        return $this->db->delete($this->_table, array("id_file" => $id_file));
    }
}