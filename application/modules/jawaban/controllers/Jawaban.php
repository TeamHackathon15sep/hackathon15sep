<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawaban extends CI_Controller {

	function __construct() {
        parent::__construct();

        // jika belum login redirect ke login
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }

        $this->load->model('M_jawaban');
    }

	public function index()
	{
		$data['record'] = $this->M_jawaban->tampilData()->result();
		$this->template->load('template','jawaban', $data);
	}

	public function detailJawaban()
	{
		$data['row'] = $this->M_jawaban->tampilDetail($this->uri->segment(3))->row_array();
		$this->template->load('template','detailJawaban', $data);
	}

	public function tambahJawaban()
	{
		$data['recordJP'] = $this->M_jawaban->tampilDataJenisPilihan()->result();
		$this->template->load('template','tambahJawaban', $data);

		if (isset($_POST['submit'])) {
			$config['upload_path']='./assets/img/icon_jawaban/';
            $config['allowed_types']='jpg|jpeg|png';
            $config['max_size']='2000';
            $new_name = substr($this->input->post('id_jwb'),0,15).$_FILES["icon_url"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload',$config);
            $this->upload->do_upload('icon_url');
            $data=  $this->upload->data();
            $this->M_jawaban->tambahJawaban($data['file_name']);
			redirect('jawaban');
		}
		else {
			$this->template->load('template','tambahJawaban');
		}
	}

	public function editJawaban()
	{
		$data['row'] = $this->M_jawaban->tampilDetail($this->uri->segment(3))->row_array();
		$data['recordJP'] = $this->M_jawaban->tampilDataJenisPilihan()->result();
		$this->template->load('template','editJawaban', $data);
	}

	/*public function updateJawabanDb()
	{
        $condition['id_jwb'] = $this->input->post('id_jwb');
		$this->M_jawaban->updateJawaban($condition);
		redirect('jawaban');
	}*/
	public function updateJawabanDb()
	{
		$imgFile = $_FILES['icon_url']['name'];
        if ($imgFile) {
        	$url['data'] = $this->M_jawaban->tampilDetail($this->input->post('id_jwb'))->row();
			$icon = $url['data']->icon_url;
        	unlink("assets/img/icon_jawaban/".$icon);
        	
			$config['upload_path']='./assets/img/icon_jawaban/';
            $config['allowed_types']='jpg|jpeg|png';
            $config['max_size']='2000';
            $new_name = substr($this->input->post('nilai_jwb'),0,15).$_FILES["foto"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload',$config);
            $this->upload->do_upload('icon_url');
            $data=  $this->upload->data();

            $condition['id_jwb'] = $this->input->post('id_jwb');

            $this->M_jawaban->updateJawaban($condition, $data['file_name']);
			redirect('jawaban');
		}
		else {
			$condition['id_jwb'] = $this->input->post('id_jwb');
        
			$this->M_jawaban->updateJawaban($condition);

			redirect('jawaban');
		}
	}

	public function deleteJawabanDb($id)
	{
		$url['data'] = $this->M_jawaban->tampilDetail($id)->row();
		$icon_url = $url['data']->icon_url;
        unlink("assets/img/icon_jawaban/".$icon_url);
        $this->M_jawaban->deleteJawaban($id);

        
        redirect('jawaban');
	}
}