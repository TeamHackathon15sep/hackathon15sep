<?php 

	class M_pertanyaan extends CI_Model {

		function tampilData() {
			//return $this->db->get('pertanyaan');
			return $this->db->query("SELECT pertanyaan.*, kategori.*, jenis_pilihan.* FROM pertanyaan, kategori, jenis_pilihan WHERE pertanyaan.jenis_pilihan=jenis_pilihan.id_pilihan AND pertanyaan.kategori=kategori.id_kategori");
		}

		function tampilDataKategori() {
			return $this->db->get('kategori');
		}

		function tampilDataJenisPilihan() {
			return $this->db->get('jenis_pilihan');
		}

		function tampilDetail($id) {
			//return $this->db->get_where('pertanyaan', array('id_pertanyaan'=>$id));
			return $this->db->query("SELECT pertanyaan.*, kategori.*, jenis_pilihan.* FROM pertanyaan, kategori, jenis_pilihan WHERE pertanyaan.jenis_pilihan=jenis_pilihan.id_pilihan AND pertanyaan.kategori=kategori.id_kategori AND pertanyaan.id_pertanyaan=$id");
		}

		function tambahPertanyaan() {
			// Change the line below to your timezone!
			date_default_timezone_set('Asia/Makassar');
			$date = date("Y-m-d H:i:s");

			$data = array(
							'desk_pertanyaan'=>$this->input->post('desk_pertanyaan'),
							'jenis_pilihan'=>$this->input->post('jenis_pilihan'),
							'kategori'=>$this->input->post('kategori'),
							'prioritas'=>$this->input->post('prioritas'),
							'tgl_input'=>$date,
							'tahun'=>$this->input->post('tahun'),
							'status'=>$this->input->post('status')
						);
			$this->db->insert('pertanyaan',$data);
		}

		function updatePertanyaan($condition){
			// Change the line below to your timezone!
			date_default_timezone_set('Asia/Makassar');
			$date = date("Y-m-d H:i:s");

			$data = array(
        					'desk_pertanyaan'=>$this->input->post('desk_pertanyaan'),
							'jenis_pilihan'=>$this->input->post('jenis_pilihan'),
							'kategori'=>$this->input->post('kategori'),
							'prioritas'=>$this->input->post('prioritas'),
							'tgl_input'=>$date,
							'tahun'=>$this->input->post('tahun'),
							'status'=>$this->input->post('status')
						);
			$this->db->where($condition);
			$this->db->update('pertanyaan',$data);
		}

		function deletePertanyaan($id)
		{
	        $this->db->where('id_pertanyaan', $id);
	        $this->db->delete('pertanyaan');
		}

	}

 ?>