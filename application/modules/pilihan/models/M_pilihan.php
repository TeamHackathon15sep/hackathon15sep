<?php 

	class M_pilihan extends CI_Model {

		function tampilData() {
			return $this->db->get('jenis_pilihan');
		}

		function tampilDetail($id) {
			return $this->db->get_where('jenis_pilihan', array('id_pilihan'=>$id));
		}

		function tambahPilihan() {
			$data = array(
							'nama_pilihan'=>$this->input->post('nama_pilihan')
						);
			$this->db->insert('jenis_pilihan',$data);
		}

		function updatePilihan($condition){
			$data = array(
        					'nama_pilihan'=>$this->input->post('nama_pilihan')
					);
			$this->db->where($condition);
			$this->db->update('jenis_pilihan',$data);
		}

		function deletePilihan($id)
		{
	        $this->db->where('id_pilihan', $id);
	        $this->db->delete('jenis_pilihan');
		}

	}

 ?>