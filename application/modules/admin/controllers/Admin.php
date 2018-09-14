<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();

        // jika belum login redirect ke login
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }

        $this->load->model('M_admin');
    }

	public function index()
	{
		$data['record'] = $this->M_admin->tampilData()->result();
		$this->template->load('template','Admin', $data);
	}
	public function detailAdmin()
	{
		$data['row'] = $this->M_admin->tampilDetail($this->uri->segment(3))->row_array();
		$this->template->load('template','detailAdmin', $data);
	}
	public function tambahAdmin()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path']='./assets/img/admin/';
            $config['allowed_types']='jpg|jpeg|png';
            $config['max_size']='2000';
            $new_name = substr($this->input->post('username'),0,15).$_FILES["foto"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload',$config);
            $this->upload->do_upload('foto');
            $data=  $this->upload->data();
            $this->M_admin->tambahAdmin($data['file_name']);
			redirect('admin');
		}
		else {
			$this->template->load('template','tambahAdmin');
		}
	}
	public function editAdmin()
	{
		$data['row'] = $this->M_admin->tampilDetail($this->uri->segment(3))->row_array();
		$this->template->load('template','editAdmin', $data);
	}

	public function updateAdminDb()
	{
		$imgFile = $_FILES['foto']['name'];
        if ($imgFile) {
			$config['upload_path']='./assets/img/admin/';
            $config['allowed_types']='jpg|jpeg|png';
            $config['max_size']='2000';
            $new_name = substr($this->input->post('username'),0,15).$_FILES["foto"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload',$config);
            $this->upload->do_upload('foto');
            $data=  $this->upload->data();

            $condition['username'] = $this->input->post('username');

            $this->M_admin->updateAdmin($condition, $data['file_name']);
			redirect('admin');
		}
		else {
			$condition['username'] = $this->input->post('username');
        
			$this->M_admin->updateAdmin($condition);

			redirect('admin');
		}

        //$condition['username'] = $this->input->post('username');
        
		//$this->M_admin->updateAdmin($condition);

		//redirect('admin');
	}

	public function deleteAdminDb($id)
	{
        $this->M_admin->deleteAdmin($id);
        
        redirect('admin');
	}

}