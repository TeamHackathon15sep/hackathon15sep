<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct() {
        parent::__construct();

        // jika belum login redirect ke login
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }

        $this->load->database();
        $this->load->library('Excel_generator');
    }

    public function index()
	{
		$this->template->load('template','Laporan');
	}
 
    public function cetakExcelHarian() {
        $query = $this->db->query("SELECT survey.id_survey, COUNT( survey.id_jwb ) AS counter, survey.id_pertanyaan, survey.tgl_survey,
            jenis_jawaban.id_jwb, jenis_jawaban.desk_jwb,
            pertanyaan.id_pertanyaan, pertanyaan.desk_pertanyaan
            FROM survey, jenis_jawaban, pertanyaan
            WHERE survey.id_jwb=jenis_jawaban.id_jwb AND survey.id_pertanyaan=pertanyaan.id_pertanyaan AND survey.tgl_survey BETWEEN '$_POST[day] 00:00:00' AND '$_POST[day] 23:59:59'
            GROUP BY survey.id_pertanyaan");
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('ID','Pertanyaan', 'Responden'));
        $this->excel_generator->set_column(array('id_pertanyaan','desk_pertanyaan', 'counter'));
        $this->excel_generator->set_width(array(5, 85, 20));
        $this->excel_generator->exportTo2007('A. Laporan Survey Harian '.$_POST['day']);
    }
    public function cetakExcelPeriode() {
        $query = $this->db->query("SELECT survey.id_survey, COUNT( survey.id_jwb ) AS counter, survey.id_pertanyaan, survey.tgl_survey,
            jenis_jawaban.id_jwb, jenis_jawaban.desk_jwb,
            pertanyaan.id_pertanyaan, pertanyaan.desk_pertanyaan
            FROM survey, jenis_jawaban, pertanyaan
            WHERE survey.id_jwb=jenis_jawaban.id_jwb AND survey.id_pertanyaan=pertanyaan.id_pertanyaan AND survey.tgl_survey BETWEEN '$_POST[start] 00:00:00' AND '$_POST[end] 23:59:59'
            GROUP BY survey.id_pertanyaan");
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('ID','Pertanyaan', 'Responden'));
        $this->excel_generator->set_column(array('id_pertanyaan','desk_pertanyaan', 'counter'));
        $this->excel_generator->set_width(array(5, 85, 20));
        $this->excel_generator->exportTo2007('A. Laporan Survey Periode '.$_POST['start'].'-'.$_POST['end']);
    }

    public function cetakExcelHarian2() {
        $query = $this->db->query("SELECT survey.id_survey, COUNT( survey.id_jwb ) AS counter, survey.id_pertanyaan, survey.tgl_survey,
            jenis_jawaban.id_jwb, jenis_jawaban.desk_jwb,
            pertanyaan.id_pertanyaan, pertanyaan.desk_pertanyaan
            FROM survey, jenis_jawaban, pertanyaan
            WHERE survey.id_pertanyaan=pertanyaan.id_pertanyaan AND survey.id_jwb=jenis_jawaban.id_jwb AND survey.tgl_survey BETWEEN '$_POST[day] 00:00:00' AND '$_POST[day] 23:59:59'
            GROUP BY survey.id_pertanyaan, survey.id_jwb");
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('ID','Pertanyaan', 'Jawaban','Responden'));
        $this->excel_generator->set_column(array('id_pertanyaan','desk_pertanyaan', 'desk_jwb', 'counter'));
        $this->excel_generator->set_width(array(5, 85, 20, 20));
        $this->excel_generator->exportTo2007('B. Laporan Survey Harian '.$_POST['day']);
    }
    public function cetakExcelPeriode2() {
        $query = $this->db->query("SELECT survey.id_survey, COUNT( survey.id_jwb ) AS counter, survey.id_pertanyaan, survey.tgl_survey,
            jenis_jawaban.id_jwb, jenis_jawaban.desk_jwb,
            pertanyaan.id_pertanyaan, pertanyaan.desk_pertanyaan
            FROM survey, jenis_jawaban, pertanyaan
            WHERE survey.id_pertanyaan=pertanyaan.id_pertanyaan AND survey.id_jwb=jenis_jawaban.id_jwb AND survey.tgl_survey BETWEEN '$_POST[start] 00:00:00' AND '$_POST[end] 23:59:59'
            GROUP BY survey.id_pertanyaan, survey.id_jwb");
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('ID','Pertanyaan', 'Jawaban','Responden'));
        $this->excel_generator->set_column(array('id_pertanyaan','desk_pertanyaan', 'desk_jwb', 'counter'));
        $this->excel_generator->set_width(array(5, 85, 20, 20));
        $this->excel_generator->exportTo2007('B. Laporan Survey Periode '.$_POST['start'].'-'.$_POST['end']);
    }
    /*public function cetakExcelHarian() {
        $query = $this->db->query("SELECT id, year AS TAHUN, COUNT( * ) AS JUMLAH FROM activities GROUP BY TAHUN");
        $query = $this->db->query("SELECT survey.id_survey, COUNT( survey.id_jwb ) AS counter, survey.id_pertanyaan, survey.tgl_survey,
            jenis_jawaban.id_jwb, jenis_jawaban.desk_jwb,
            pertanyaan.id_pertanyaan, pertanyaan.desk_pertanyaan
            FROM survey, jenis_jawaban, pertanyaan
            WHERE survey.id_jwb=jenis_jawaban.id_jwb AND survey.id_pertanyaan=pertanyaan.id_pertanyaan
            GROUP BY survey.id_pertanyaan");
        $query = $this->db->query("SELECT * FROM survey WHERE tgl_survey='$_POST[harian]%'");
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('Pertanyaan', 'Responden'));
        $this->excel_generator->set_column(array('desk_pertanyaan', 'counter'));
        $this->excel_generator->set_width(array(65, 35));
        $this->excel_generator->exportTo2007('Laporan Survey Harian '.$_POST['harian']);
    }*/
    /*public function cetakExcelPeriode() {
        $query = $this->db->query("SELECT * FROM survey WHERE tgl_survey BETWEEN '$_POST[start]%' AND '$_POST[end]%'");
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('No.', 'Pertanyaan', 'Jawaban', 'Ket', 'DateTime'));
        $this->excel_generator->set_column(array('id_survey', 'id_pertanyaan', 'id_jwb', 'ket_jwb','tgl_survey'));
        $this->excel_generator->set_width(array(25, 65, 35, 15, 45));
        $this->excel_generator->exportTo2007('Laporan Survey Periode '.$_POST['start'].'-'.$_POST['end']);
    }*/

}