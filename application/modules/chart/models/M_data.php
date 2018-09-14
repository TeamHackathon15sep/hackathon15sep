<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data extends CI_Model {

  	
    function get_data()
    {
        $query = $this->db->query("SELECT id_survey, COUNT( * ) AS jumlah, DATE_FORMAT(tgl_survey,'%d/%m/%Y') AS tgl_survey FROM survey GROUP BY DAY(tgl_survey) ORDER BY id_survey ASC LIMIT 7"); // YEAR MONTH DAY
       	return $query->result();
    }

    function get_data_pertanyaan()
    {
        /*$query = $this->db->query("SELECT id, year AS TAHUN, COUNT( * ) AS JUMLAH FROM activities GROUP BY TAHUN");*/
        $query = $this->db->query("SELECT survey.id_survey, COUNT( survey.id_jwb ) AS counter, survey.id_pertanyaan,
            jenis_jawaban.id_jwb, jenis_jawaban.desk_jwb
            FROM survey, jenis_jawaban
            WHERE survey.id_pertanyaan='1' AND survey.id_jwb=jenis_jawaban.id_jwb
            GROUP BY survey.id_jwb");
        return $query->result();
        //masih statis, hanya 1 pertanyaan
    }

}