<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct() {
        parent::__construct();

        // jika belum login redirect ke login
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }

        $this->load->model('M_kategori');
    }

	public function index()
	{
		$data['record'] = $this->M_kategori->tampilData()->result();
		$this->template->load('template','kategori', $data);
	}

	public function detailKategori()
	{
		$data['row'] = $this->M_kategori->tampilDetail($this->uri->segment(3))->row_array();
		$this->template->load('template','detailKategori', $data);
	}

	public function tambahKategori()
	{
		if (isset($_POST['submit'])) {
            $this->M_kategori->tambahKategori();
			redirect('kategori');
		}
		else {
			$this->template->load('template','tambahKategori');
		}
	}

	public function editKategori()
	{
		$data['row'] = $this->M_kategori->tampilDetail($this->uri->segment(3))->row_array();
		$this->template->load('template','editKategori', $data);
	}

	public function updateKategoriDb()
	{
        $condition['id_kategori'] = $this->input->post('id_kategori');
		$this->M_kategori->updateKategori($condition);
		redirect('kategori');
	}

	public function deleteKategoriDb($id)
	{
        $this->M_kategori->deleteKategori($id);        
        redirect('kategori');
	}
}