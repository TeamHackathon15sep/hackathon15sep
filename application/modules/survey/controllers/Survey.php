<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

	function __construct() {
        parent::__construct();

        // jika belum login redirect ke login
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }

        $this->load->model('M_survey');
        $this->load->database();
        $this->load->library('PHPExcel/PHPExcel.php');
    }

	public function index()
	{
		$data['record'] = $this->M_survey->tampilData()->result();
		$this->template->load('template','survey', $data);
	}
	
	public function importSurvey()
	{
		$this->template->load('template','form');
	}

	public function saveSurvey()
	{
		if(isset($_POST['import'])){ // Jika user mengklik tombol Import
		  $nama_file_baru = 'data.xlsx';
		  
		  // Load librari PHPExcel nya
		  //require_once 'PHPExcel/PHPExcel.php';
		  
		  $excelreader = new PHPExcel_Reader_Excel2007();
		  $loadexcel = $excelreader->load('./assets/tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
		  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		  
		  // Buat query Insert
		  //$sql = $pdo->prepare("INSERT INTO survey VALUES(:id_survey,:id_pertanyaan,:id_jwb,:ket_jwb,:tgl_survey)");
		  
		  $numrow = 1;
		  foreach($sheet as $row){
		    // Ambil data pada excel sesuai Kolom
		    $id_pertanyaan = $row['A']; // Ambil data id_pertanyaan
		    $id_jwb = $row['B']; // Ambil data id_jwb
		    $tgl_survey = $row['C']; // Ambil data tgl_survey
		    
		    // Cek $numrow apakah lebih dari 1
		    // Artinya karena baris pertama adalah nama-nama kolom
		    // Jadi dilewat saja, tidak usah diimport
		    if($numrow > 1){
		      	// Proses simpan ke Database
		      	//$sql->bindParam(':nis', $nis);
		      	//$sql->bindParam(':id_pertanyaan', $id_pertanyaan);
		      	//$sql->bindParam(':id_jwb', $id_jwb);
		      	//$sql->bindParam(':telp', $telp);
		      	//$sql->bindParam(':tgl_survey', $tgl_survey);
		      	//$sql->execute(); // Eksekusi query insert

				$data = array(
							'id_survey'=>'',
							'id_pertanyaan'=>$id_pertanyaan,
							'id_jwb'=>$id_jwb,
							'ket_jwb'=>'offline',
							'tgl_survey'=>$tgl_survey
						);
				$this->db->insert('survey',$data);
		
		    }
		    
		    $numrow++; // Tambah 1 setiap kali looping
		  }
		}
		redirect('survey');
	}

}