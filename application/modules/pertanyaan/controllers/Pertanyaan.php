<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

	function __construct() {
        parent::__construct();

        // jika belum login redirect ke login
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }

        $this->load->model('M_pertanyaan');
    }

	public function index()
	{
		$data['record'] = $this->M_pertanyaan->tampilData()->result();
		$this->template->load('template','pertanyaan', $data);
	}

	public function detailPertanyaan()
	{
		$data['row'] = $this->M_pertanyaan->tampilDetail($this->uri->segment(3))->row_array();
		$this->template->load('template','detailPertanyaan', $data);
	}

	public function tambahPertanyaan()
	{
		$data['recordK'] = $this->M_pertanyaan->tampilDataKategori()->result();
		$data['recordJP'] = $this->M_pertanyaan->tampilDataJenisPilihan()->result();
		$this->template->load('template','tambahPertanyaan', $data);

		if (isset($_POST['submit'])) {
            $this->M_pertanyaan->tambahPertanyaan();
			redirect('pertanyaan');
		}
		else {
			$this->template->load('template','tambahPertanyaan');
		}
	}

	public function editPertanyaan()
	{
		$data['row'] = $this->M_pertanyaan->tampilDetail($this->uri->segment(3))->row_array();
		$data['recordK'] = $this->M_pertanyaan->tampilDataKategori()->result();
		$data['recordJP'] = $this->M_pertanyaan->tampilDataJenisPilihan()->result();
		$this->template->load('template','editPertanyaan', $data);
	}

	public function updatePertanyaanDb()
	{
        $condition['id_pertanyaan'] = $this->input->post('id_pertanyaan');
		$this->M_pertanyaan->updatePertanyaan($condition);
		redirect('pertanyaan');
	}

	public function deletePertanyaanDb($id)
	{
        $this->M_pertanyaan->deletePertanyaan($id);
        
        redirect('pertanyaan');
	}
}