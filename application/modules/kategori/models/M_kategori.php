<?php 

	class M_kategori extends CI_Model {

		function tampilData() {
			return $this->db->get('kategori');
		}

		function tampilDetail($id) {
			return $this->db->get_where('kategori', array('id_kategori'=>$id));
		}

		function tambahKategori() {
			$data = array(
							'nama_kategori'=>$this->input->post('nama_kategori'),
							'desk_kategori'=>$this->input->post('desk_kategori'),
							'status'=>$this->input->post('status')
						);
			$this->db->insert('kategori',$data);
		}

		function updateKategori($condition){
			$data = array(
        					'nama_kategori'=>$this->input->post('nama_kategori'),
							'desk_kategori'=>$this->input->post('desk_kategori'),
							'status'=>$this->input->post('status')
					);
			$this->db->where($condition);
			$this->db->update('kategori',$data);
		}

		function deleteKategori($id)
		{
	        $this->db->where('id_kategori', $id);
	        $this->db->delete('kategori');
		}

	}

 ?>