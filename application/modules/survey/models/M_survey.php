<?php 

	class M_survey extends CI_Model {

		function tampilData() {
			//return $this->db->get('survey');
			return $this->db->query("SELECT survey.*, pertanyaan.*, jenis_jawaban.* FROM survey, pertanyaan, jenis_jawaban WHERE survey.id_pertanyaan=pertanyaan.id_pertanyaan AND survey.id_jwb=jenis_jawaban.id_jwb ORDER BY survey.id_survey ASC");
		}

	}

 ?>