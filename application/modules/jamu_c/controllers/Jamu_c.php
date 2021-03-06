<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jamu_c extends CI_Controller {

	function __construct() {
        parent::__construct();

        // jika belum login redirect ke login
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }

        $this->load->model('M_data');
    } 
	
	public function index()
	{
		//$this->load->view('chart');
		$this->template->load('template','jamu_c');
	}
	
	public function data()
	{
		
		$data = $this->M_data->get_data();
		
		$category = array();
		$category['name'] = 'Category';
		
		$series1 = array();
		$series1['name'] = 'Jumlah Terjual';

		$series2 = array();
		$series2['name'] = 'Target';
		
		foreach ($data as $row)
		{
		    $category['data'][] = $row->tgl_survey;
			$series1['data'][] = $row->jumlah;
			$series2['data'][] = (($row->jumlah)+5);
		}
		
		$result = array();
		array_push($result,$category);
		array_push($result,$series1);
		array_push($result,$series2);
		//print json_encode($result, JSON_NUMERIC_CHECK);

		//------------------------------------------------------

		$data2 = $this->M_data->get_data_penjualan();
		
		//$rows = array();
		$rows['type'] = 'pie';
		//$rows['name'] = 'Pelawat';
		//$rows['innerSize'] = '50%';

		foreach ($data2 as $row2)
		{
			//this.point.name, this.y
		    $rows['data'][] = array($row2->desk_jwb, $row2->counter);    
		}
		array_push($result,$rows);

		print json_encode($result, JSON_NUMERIC_CHECK);
	}

	
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */