<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_model extends CI_Model
{
    private $divisi = "divisi";
    private $tim = "tim";
    private $komentar = "komentar";
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

            ['field' => 'pembuat',
            'label' => 'Pembuat',
            'rules' => 'required']
        ];
    }

    /* mengambil semua data yang ada di tabel materi */
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    /* mengambil data bedasarkan id file yang ada di tabel materi */
    public function getById($id_file)
    {
        return $this->db->get_where($this->_table, ["id_file" => $id_file])->row();
    }

    /* mengambil data materi berdasarkan id divisinya */
    public function getMatByIdDiv($id_div)
    {
        return $this->db->get_where($this->_table, ["id_div" => $id_div])->result();
    }

    /* menambil data materi berdasarkan id timnya */
    public function getMatByIdTim($id_tim)
    {
        return $this->db->get_where($this->_table, ["id_tim" => $id_tim])->result();
    }

    /* mengambil semua data yang ada di tabel divisi */
    public function getIdDiv()
    {
        return $this->db->get($this->divisi)->result();
    }

    /* mengambil semua data yang ada di tabel tim */
    public function getIdTim()
    {
        return $this->db->get($this->tim)->result();
    }

    /* mengambil data tim berdasarkan id divisinya */
    public function getTimByIdDiv($id_div)
    {
        return $this->db->get_where($this->tim, ["id_div" => $id_div])->result();
    }
    
    public function uploadFile()
    {
        $config['upload_path'] = './upload/materi/';
        $config['allowed_types'] = 'pdf|docx|doc';
        $config['file_name'] = $this->judul;
        $config['overwrite'] = true;
        $config['max_size'] = 30000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
            return $this->upload->data("file_name");
        } elseif ($this->upload->do_upload('old_file'))
        {
            return $this->upload->data("file_name");
        } 
        // print_r($this->upload->display_errors());
        return $this->upload->data("file_name");
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
        
        if (empty($_FILES["judul"])) 
        {
            $this->file = $this->uploadFile();
        } else 
        {
           $this->file = $post["old_file"];
        } 
        
        // $this->file = $post["old_file"];

        $this->tgl_posting = $post["tgl_posting"];
        $this->pembuat = $post["pembuat"];
        return $this->db->update($this->_table, $this, array('id_file' => $post['id_file']));
    }

    public function deleteFile($id_file)
    {
        $materi = $this->getById($id_file);
        if ($materi->file != "") 
        {
	        $filename = explode(".", $materi->file)[0];
		    return array_map('unlink', glob(FCPATH."upload/materi/$filename.*"));
        }
    }

    public function delDiskusi($id_file)
    {
        
        return $this->db->delete($this->komentar, array("id_file" => $id_file));
    }

    public function delete($id_file)
    {
        $this->deleteFile($id_file);
        $this->delDiskusi($id_file);
        return $this->db->delete($this->_table, array("id_file" => $id_file));
    }
}