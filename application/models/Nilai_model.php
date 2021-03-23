<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
    private $_table = "nilai";
    private $topik_quiz = "topik_quiz";
    private $quiz = "quiz";

    public $id_nilai;
    public $id_tq;
    public $nik;
    public $benar;
    public $salah;
    public $jumlah_soal;
    public $nilai;
    public $waktu_mengerjakan;

    public function rules()
    {
        return [

            ['field' => 'nik',
            'label' => 'Nik',
            'rules' => 'required']
        ];
    }

    /* mengambil data bedasarkan id tq yang ada di tabel nilai */
    public function getNilaiByIdTq($id_tq)
    {
        return $this->db->get_where($this->_table, ["id_tq" => $id_tq])->result();
    }

    /* mengambil data yang ada di tabel topik quiz berdasarkan id topik quiz */
    public function getByIdTq($id_tq)
    {
        return $this->db->get_where($this->topik_quiz, ["id_tq" => $id_tq])->row();
    }

    /* mengambil data yang ada di tabel quiz berdasarkan id topik quiz */
    public function getQuizByIdTq($id_tq)
    {
        return $this->db->get_where($this->quiz, ["id_tq" => $id_tq])->result();
    }

    public function save()
    {
        $benar = 0;
        $salah = 0;
        $post = $this->input->post();
        $id_tq = $post["id_tq"];
        $quiz = $this->getQuizByIdTq($id_tq);
        foreach($quiz as $quiz){
            $id_quiz = $post[$quiz->id_quiz];
            $kunci = $quiz->kunci;

            if($id_quiz == $kunci){
                $benar++;
            }else{
                $salah++;
            }
        }

        $jumlah_soal = $benar + $salah;
        $nilai = $benar / $jumlah_soal * 100;

        var_dump($_POST);
        $this->id_nilai = uniqid();
        $this->id_tq = $post["id_tq"];
        $this->nik = $post["nik"];
        $this->benar = $benar;
        $this->salah = $salah;
        $this->jumlah_soal = $jumlah_soal;
        $this->nilai = $nilai;
        $this->waktu_mengerjakan = $post["waktu_mengerjakan"];
        return $this->db->insert($this->_table, $this);
        
    }
    


}