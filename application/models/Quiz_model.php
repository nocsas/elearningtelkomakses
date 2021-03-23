<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model
{
    private $_table = "quiz";
    private $topik_quiz = "topik_quiz";

    public $id_quiz;
    public $id_tq;
    public $pertanyaan;
    public $gambar;
    public $pil_a;
    public $pil_b;
    public $pil_c;
    public $pil_d;
    public $kunci;
    public $tgl_buat;

    public function rules()
    {
        return [

            ['field' => 'pertanyaan',
            'label' => 'Pertanyaan',
            'rules' => 'required'],

            ['field' => 'pil_a',
            'label' => 'Pilihan A',
            'rules' => 'required'],

            ['field' => 'pil_b',
            'label' => 'Pilihan B',
            'rules' => 'required'],

            ['field' => 'pil_c',
            'label' => 'Pilihan C',
            'rules' => 'required'],

            ['field' => 'pil_d',
            'label' => 'Pilihan D',
            'rules' => 'required'],

            ['field' => 'kunci',
            'label' => 'Kunci',
            'rules' => 'required']
        ];
    }

    /* mengambil semua data yang ada di tabel quiz */
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    /* mengambil data yang ada di tabel quiz berdasarkan id quiz */
    public function getById($id_quiz)
    {
        return $this->db->get_where($this->_table, ["id_quiz" => $id_quiz])->row();
    }

    /* mengambil data yang ada di tabel topik quiz berdasarkan id topiq quiz */
    public function getTq($id_tq)
    {
        return $this->db->get_where($this->topik_quiz, ["id_tq" => $id_tq])->row();
    }

    /* mengambil semua data yang ada di tabel quiz berdasarkan id topik quiz */
    public function getByIdTq($id_tq)
    {
        return $this->db->get_where($this->_table, ["id_tq" => $id_tq])->result();
    }
    
    public function uploadFile()
    {
        $config['upload_path'] = './upload/gambar/';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['file_name'] = $this->id_quiz;
        $config['overwrite'] = true;
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar'))
        {
            return $this->upload->data("file_name");
        } 
        // print_r($this->upload->display_errors());
        return "default.jpg";

    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_quiz = uniqid();
        $this->id_tq = $post["id_tq"];
        $this->pertanyaan = $post["pertanyaan"];
        $this->gambar = $this->uploadFile();
        $this->pil_a = $post["pil_a"];
        $this->pil_b = $post["pil_b"];
        $this->pil_c = $post["pil_c"];
        $this->pil_d = $post["pil_d"];
        $this->kunci = $post["kunci"];
        $this->tgl_buat = $post["tgl_buat"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_quiz = $post["id_quiz"];
        $this->id_tq = $post["id_tq"];
        $this->pertanyaan = $post["pertanyaan"];
        $this->gambar = $this->uploadFile();
        $this->pil_a = $post["pil_a"];
        $this->pil_b = $post["pil_b"];
        $this->pil_c = $post["pil_c"];
        $this->pil_d = $post["pil_d"];
        $this->kunci = $post["kunci"];
        $this->tgl_buat = $post["tgl_buat"];
        return $this->db->update($this->_table, $this, array('id_quiz' => $post['id_quiz']));
    }

    public function deleteFile($id_quiz)
    {
        $quiz = $this->getById($id_quiz);
        if ($quiz->gambar != "default.jpg") 
        {
	        $filename = explode(".", $quiz->gambar)[0];
		    return array_map('unlink', glob(FCPATH."upload/gambar/$filename.*"));
        }
    }

    public function delete($id_quiz)
    {
        $this->deleteFile($id_quiz);
        return $this->db->delete($this->_table, array("id_quiz" => $id_quiz));
    }


}