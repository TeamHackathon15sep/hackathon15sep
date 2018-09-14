<?php 

	class M_webpage extends CI_Model {

		function dataPertanyaan() {
			//return $this->db->query("SELECT * FROM pertanyaan WHERE  id_pertanyaan='3'");
			return $this->db->query("SELECT pertanyaan.*, kategori.* FROM pertanyaan, kategori WHERE pertanyaan.status='1' AND kategori.status='1' ORDER BY rand() LIMIT 1");
		}

		function dataJawaban($id) {
			return $this->db->query("SELECT pertanyaan.id_pertanyaan, pertanyaan.desk_pertanyaan,
											jenis_jawaban.id_jwb, jenis_jawaban.icon_url, jenis_jawaban.jenis_pilihan, jenis_jawaban.desk_jwb,
											jenis_pilihan.id_pilihan,
											kategori.status 
									FROM pertanyaan, jenis_jawaban, jenis_pilihan, kategori
									WHERE pertanyaan.jenis_pilihan=jenis_pilihan.id_pilihan AND jenis_jawaban.jenis_pilihan=jenis_pilihan.id_pilihan AND pertanyaan.kategori=kategori.id_kategori AND pertanyaan.id_pertanyaan='$id' AND pertanyaan.status='1' AND kategori.status='1'
									ORDER BY jenis_jawaban.id_jwb DESC");
		}

		function jawabSurvey() {
			// Change the line below to your timezone!
			date_default_timezone_set('Asia/Makassar');
			$date = date("Y-m-d H:i:s");

			$data = array(
							'id_pertanyaan'=>$this->input->post('id_pertanyaan'),
							'id_jwb'=>$this->input->post('id_jwb'),
							'ket_jwb'=>'online',
							'tgl_survey'=>$date
						);
			$this->db->insert('survey',$data);
		}

	}

 ?>