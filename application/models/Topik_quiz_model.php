<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Topik_quiz_model extends CI_Model
{
    private $divisi = "divisi";
    private $tim    = "tim";
    private $quiz   = "quiz";
    private $nilai  = "nilai";
    private $_table = "topik_quiz";

    public $id_tq;
    public $judul;
    public $id_div;
    public $id_tim;
    public $tgl_buat;
    public $pembuat;
    public $batas_mengerjakan;
    public $info;
    public $terbit;

    public function rules()
    {
        return [

            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],

            ['field' => 'batas_mengerjakan',
            'label' => 'Batas Mengerjakan',
            'rules' => 'required'],

            ['field' => 'terbit',
            'label' => 'Terbit',
            'rules' => 'required']
        ];
    }

    /* mengambil semua data yang ada di tabel topik quiz */
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    /* mengambil data yang ada di tabel topik quiz berdasarkan id topik quiz */
    public function getById($id_tq)
    {
        return $this->db->get_where($this->_table, ["id_tq" => $id_tq])->row();
    }

    /* mengambil data topik quiz berdasarkan id divisinya */
    public function getTqByIdDiv($id_div)
    {
        return $this->db->get_where($this->_table, ["id_div" => $id_div])->result();
    }

    /* mengambil data topik quiz berdasarkan id timnya */
    public function getTqByIdTim($id_tim)
    {
        return $this->db->get_where($this->_table, ["id_tim" => $id_tim])->result();
    }

    /* mengambil data di tabel quiz berdasarkan id topik quiz */
    public function getQuizByIdTq($id_tq)
    {
        return $this->db->get_where($this->quiz, ["id_tq" => $id_tq])->result();
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

    public function save()
    {
        $post = $this->input->post();
        $this->id_tq = uniqid();
        $this->judul = $post["judul"];
        $this->id_div = $post["id_div"];
        $this->id_tim = $post["id_tim"];
        $this->tgl_buat = $post["tgl_buat"];
        $this->pembuat = $post["pembuat"];
        $this->batas_mengerjakan = $post["batas_mengerjakan"];
        $this->info = $post["info"];
        $this->terbit = $post["terbit"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_tq = $post["id_tq"];
        $this->judul = $post["judul"];
        $this->id_div = $post["id_div"];
        $this->id_tim = $post["id_tim"];
        $this->tgl_buat = $post["tgl_buat"];
        $this->pembuat = $post["pembuat"];
        $this->batas_mengerjakan = $post["batas_mengerjakan"];
        $this->info = $post["info"];
        $this->terbit = $post["terbit"];
        return $this->db->update($this->_table, $this, array('id_tq' => $post['id_tq']));
    }

    public function cariFile($id_tq)
    {
        
        $quiz = $this->getQuizByIdTq($id_tq);
        foreach ($quiz as $q)  
        {
            if ($q->gambar != "default.jpg"){
            unlink(FCPATH."upload/gambar/$q->gambar");
            }
        }
    
    }

    public function deleteFile($id_tq)
    {
        return $this->cariFile($id_tq);
    
    }

    public function deleteQuiz($id_tq)
    {
        return $this->db->delete($this->quiz, array("id_tq" => $id_tq));
    }

    public function delete($id_tq)
    {
        $this->deleteFile($id_tq);
        $this->deleteQuiz($id_tq);
        return $this->db->delete($this->_table, array("id_tq" => $id_tq));
    }

}