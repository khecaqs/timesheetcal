<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Mycal_Cont extends MX_Controller
{
	
public function __construct()
    {
        parent::__construct();
        error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
        ini_set( 'display_errors', '1');

       // $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
       // $this->load->library('form_validation');

        $this->load->helper('form');
        //load dari models
        $this->load->model(array('cal/mycal_model'));
    }


	function display($year = null, $month = null)
	{
		if (!$year){
			$year = date('Y');
		}
		if (!$month){
			$month = date('m');
		}

		//$day = $this->input->post('day');

		$this->load->model('Mycal_model');

		if ($day = $this->input->post('day')){
			$this->Mycal_model->add_calendar_data(
				"$year-$month-$day",
				$this->input->post('data')


			);
		}

		$data['calendar'] = $this->Mycal_model->generate($year , $month);

		$this->load->view('mycal', $data);

	}
	/*function senarai(){
		$this->load->model('Mycal_model');
		$data['senarai'] = $this->Mycal_model->get_list();
		$this->load->view('mycal', $data);
	}*/
	
	function senarai()
        {
            $d['records'] = $this->Mycal_model->snr_d();
            $this->load->view('mycal', $d);
        }
}