<?php


class Mycal_model extends CI_Model
{

public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	function get_calendar_data($year, $month){
		$query = $this->db->select('trkh,data')->from('calendar')->like('trkh',"$year-$month", 'after')->get();
		
		$cal_data = array();

		foreach ($query->result() as $row) {
			$cal_data[(int)substr($row->trkh,8,2)] = $row->data;
		}

		return $cal_data;
	}
	
	function add_calendar_data($date, $data){
		
		if ($this->db->select('trkh')->from('calendar')
			->where('trkh',$date)->count_all_results()) {

			$this->db->where('trkh', $date)
			->update('calendar', array(
				'trkh' => $date,
				'data' => $data
				));
		
		// $this->db->insert('calendar', array(
		// 	'date' =>$date,
		// 	'data' => $data
			// ));

		} else {

		$this->db->insert('calendar',array(
			'trkh'=>$date,
			'data'=>$data
			));
		}
	}

	function get_list(){
		//$query = $this->db->select('data,date')->from('calendar')->get();
		$query = $this->db->get('calendar');
		return $query;
	}
	
	function generate($year, $month)
	{

		$conf = array(
			'show_next_prev' => true,
			'next_prev_url' => base_url() . '/cal/mycal/display'

			);
		
		//template
			$conf['template'] = '

				 {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

		        {heading_row_start}<tr>{/heading_row_start}

		        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

		        {heading_row_end}</tr>{/heading_row_end}

		        {week_row_start}<tr>{/week_row_start}
		        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
		        {week_row_end}</tr>{/week_row_end}

		        {cal_row_start}<tr class="days">{/cal_row_start}
		        {cal_cell_start}<td class="day">{/cal_cell_start}
		        {cal_cell_start_today}<td class="day">{/cal_cell_start_today}
		        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

		        {cal_cell_content}
		        	<div class="day_num">{day}</div>
		        	<div class="content">{content}</div>
		        {/cal_cell_content}
		        {cal_cell_content_today}
		        	<div class="day_num highlight">{day}</div>
		        	<div class="content">{content}</div>
		        {/cal_cell_content_today}

		        {cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
		        {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

		        {cal_cell_blank}&nbsp;{/cal_cell_blank}

		        {cal_cell_other}{day}{/cal_cel_other}

		        {cal_cell_end}</td>{/cal_cell_end}
		        {cal_cell_end_today}</td>{/cal_cell_end_today}
		        {cal_cell_end_other}</td>{/cal_cell_end_other}
		        {cal_row_end}</tr>{/cal_row_end}

		        {table_close}</table>{/table_close}

		';
		


		$this->load->library('calendar',$conf);

		//$this->add_calendar_data('2016-02-19', 'lagi lagi data test');

		$cal_data = $this->get_calendar_data($year, $month);

		return $this->calendar->generate($year , $month, $cal_data);
	}
}