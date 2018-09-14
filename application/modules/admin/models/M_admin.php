<?php 

	class M_admin extends CI_Model {

		function tampilData() {
			return $this->db->get('admin');
		}

		function tampilDetail($id) {
			//return $this->db->query("SELECT * FROM admin WHERE username='$id'");
			return $this->db->get_where('admin', array('username'=>$id));
		}

		function tambahAdmin($foto) {
			$data = array(
							'username'=>$this->input->post('username'),
							'password'=>md5($this->input->post('password')),
							'nama'=>$this->input->post('nama'),
							'level'=>$this->input->post('level'),
							'email'=>$this->input->post('email'),
							'foto'=>$foto);
			$this->db->insert('admin',$data);
		}

		function updateAdmin($condition, $foto){
			if ($foto=='') {
				# code...
			$data = array(
        					'nama'=>$this->input->post('nama'),
							'email'=>$this->input->post('email')
					);
			$this->db->where($condition);
			$this->db->update('admin',$data);
			}else{
			$data = array(
        					'nama'=>$this->input->post('nama'),
							'email'=>$this->input->post('email'),
							'foto'=>$foto
					);
			$this->db->where($condition);
			$this->db->update('admin',$data);
			}
		}

		function deleteAdmin($id)
		{
			//delete admin berdasarkan id
	        $this->db->where('username', $id);
	        $this->db->delete('admin');
		}

	}

 ?>