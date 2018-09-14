<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilihan extends CI_Controller {

	function __construct() {
        parent::__construct();

        // jika belum login redirect ke login
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }

        $this->load->model('M_pilihan');
    }

	public function index()
	{
		$data['record'] = $this->M_pilihan->tampilData()->result();
		$this->template->load('template','pilihan', $data);
	}

	public function detailPilihan()
	{
		$data['row'] = $this->M_pilihan->tampilDetail($this->uri->segment(3))->row_array();
		$this->template->load('template','detailPilihan', $data);
	}

	public function tambahPilihan()
	{
		if (isset($_POST['submit'])) {
            $this->M_pilihan->tambahPilihan();
			redirect('pilihan');
		}
		else {
			$this->template->load('template','tambahPilihan');
		}
	}

	public function editPilihan()
	{
		$data['row'] = $this->M_pilihan->tampilDetail($this->uri->segment(3))->row_array();
		$this->template->load('template','editPilihan', $data);
	}

	public function updatePilihanDb()
	{
        $condition['id_pilihan'] = $this->input->post('id_pilihan');
		$this->M_pilihan->updatePilihan($condition);
		redirect('pilihan');
	}

	public function deletePilihanDb($id)
	{
        $this->M_pilihan->deletePilihan($id);
        
        redirect('pilihan');
	}
}