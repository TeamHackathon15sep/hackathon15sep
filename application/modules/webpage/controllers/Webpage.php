<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webpage extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_webpage');
    }

	public function index()
	{
		$data['recordPertanyaan'] = $this->M_webpage->dataPertanyaan()->row();
		$id = $data['recordPertanyaan']->id_pertanyaan;
		$data['recordJawaban'] = $this->M_webpage->dataJawaban($id)->result();
		$this->load->view('webpage', $data);
	}

	public function jawabSurvey(){

		if (isset($_POST['id_jwb'])) {
            $this->M_webpage->jawabSurvey();
			redirect('webpage');
		}

	}
	
}