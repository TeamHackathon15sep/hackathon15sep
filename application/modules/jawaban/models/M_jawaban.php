<?php 

	class M_jawaban extends CI_Model {

		function tampilData() {
			//return $this->db->get('jenis_jawaban');
			return $this->db->query("SELECT jenis_jawaban.*, jenis_pilihan.* FROM jenis_jawaban, jenis_pilihan WHERE jenis_jawaban.jenis_pilihan=jenis_pilihan.id_pilihan");
		}

		function tampilDataJenisPilihan() {
			return $this->db->get('jenis_pilihan');
		}

		function tampilDetail($id) {
			//return $this->db->get_where('jenis_jawaban', array('id_jwb'=>$id));
			return $this->db->query("SELECT jenis_jawaban.*, jenis_pilihan.* FROM jenis_jawaban, jenis_pilihan WHERE jenis_jawaban.jenis_pilihan=jenis_pilihan.id_pilihan AND jenis_jawaban.id_jwb=$id");
		}

		function tambahJawaban($icon_url) {
			$data = array(
							'nilai_jwb'=>$this->input->post('nilai_jwb'),
							'desk_jwb'=>$this->input->post('desk_jwb'),
							'icon_url'=>$icon_url,
							'point_jwb'=>$this->input->post('point_jwb'),
							'jenis_pilihan'=>$this->input->post('jenis_pilihan')
						);
			$this->db->insert('jenis_jawaban',$data);
		}

		/*function updateJawaban($condition){
			$data = array(
							'nilai_jwb'=>$this->input->post('nilai_jwb'),
							'desk_jwb'=>$this->input->post('desk_jwb'),
							'icon_url'=>$icon_url,
							'point_jwb'=>$this->input->post('point_jwb'),
							'jenis_pilihan'=>$this->input->post('jenis_pilihan')
						);
			$this->db->where($condition);
			$this->db->update('jenis_jawaban',$data);
		}*/

		function updateJawaban($condition, $icon_url){
			if ($icon_url=='') {
				# code...
				$data = array(
								'nilai_jwb'=>$this->input->post('nilai_jwb'),
								'desk_jwb'=>$this->input->post('desk_jwb'),
								'point_jwb'=>$this->input->post('point_jwb'),
								'jenis_pilihan'=>$this->input->post('jenis_pilihan')
							);
				$this->db->where($condition);
				$this->db->update('jenis_jawaban',$data);
			}else{
				$data = array(
							'nilai_jwb'=>$this->input->post('nilai_jwb'),
							'desk_jwb'=>$this->input->post('desk_jwb'),
							'icon_url'=>$icon_url,
							'point_jwb'=>$this->input->post('point_jwb'),
							'jenis_pilihan'=>$this->input->post('jenis_pilihan')
						);
				$this->db->where($condition);
				$this->db->update('jenis_jawaban',$data);
			}
		}

		function deleteJawaban($id)
		{
	        $this->db->where('id_jwb', $id);
	        $this->db->delete('jenis_jawaban');
		}

	}

 ?>