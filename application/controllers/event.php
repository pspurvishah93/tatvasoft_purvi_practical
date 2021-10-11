<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("m_event");
	}

	public function index()	{
		$this->load->view('header');
		$this->load->view('add_event');
		$this->load->view('footer');
	}

	public function list_event()	{
		$response["list"] = $this->m_event->view_all_event();
		$response["pagination"] = $this->m_event->pagination();
		// echo "<pre>"; print_r($response["list"]); exit;
		$this->load->view('header');
		$this->load->view('list_event', $response);
		$this->load->view('footer');
	}

	public function add_event(){
		// print_r($_POST); exit;
		$response = $this->m_event->add_event($_POST);
		echo $response;
	}

	public function update_event(){
		// print_r($_POST); exit;
		$response = $this->m_event->update_event($_POST);
		echo $response;
	}

	public function edit_event(){
		$eid = $this->uri->segment(3, 0);
		$post["event_id"] = $eid;
		$response = $this->m_event->view_event($post);
		// echo "<pre>"; print_r($response); exit;
		$this->load->view('header');
		$this->load->view('edit_event', $response);
		$this->load->view('footer');
	}

	public function delete_event(){
		$response = $this->m_event->delete_event($_POST);
		if($response == 1) {
			$html = '';
			$list = $this->m_event->view_all_event();
			$pagination = $this->m_event->pagination();

			if(!empty($list)) { foreach($list as $key => $value) {
				$html .= '<tr>
		      <td>'. $value["event_title"] .'</td>
		      <td>'. $value["start_date"] . " to " . $value["end_date"] .'</td>
		      <td>'. $value["recurrance"] .'</td>
		      <td><a href="'. base_url() .'event/view_event/'. $value["event_id"] .'" class="btn btn-info btn-rounded btn-fw view_list">View</a> &nbsp; <a href="'. base_url() .'event/edit_event/'. $value["event_id"] .'" class="btn btn-warning btn-rounded btn-fw edit_event">Edit</a> &nbsp; <button data-eid="'. $value["event_id"] .'" type="button" class="btn btn-danger btn-rounded btn-fw delete_list">Delete</button></td>
		    </tr>';
			} }

			$ret[0] = 1;
			$ret[1] = $html;
			$ret[2] = $pagination;
		}
		else {
			$ret[0] = 2;
		}
		echo json_encode($ret);
	}

	public function view_event(){
		$eid = $this->uri->segment(3, 0);
		$post["event_id"] = $eid;
		$response = $this->m_event->view_event($post);
		$this->load->view('header');
		$this->load->view('view_event', $response);
		$this->load->view('footer');
	}

	public function view_nextevent(){
			$html = '';
			$list = $this->m_event->view_all_event($_POST);
			$pagination = $this->m_event->pagination();

			if(!empty($list)) { foreach($list as $key => $value) {
				$html .= '<tr>
		      <td>'. $value["event_title"] .'</td>
		      <td>'. $value["start_date"] . " to " . $value["end_date"] .'</td>
		      <td>'. $value["recurrance"] .'</td>
		      <td><a href="'. base_url() .'event/view_event/'. $value["event_id"] .'" class="btn btn-info btn-rounded btn-fw view_list">View</a> &nbsp; <a href="'. base_url() .'event/edit_event/'. $value["event_id"] .'" class="btn btn-warning btn-rounded btn-fw edit_event">Edit</a> &nbsp; <button data-eid="'. $value["event_id"] .'" type="button" class="btn btn-danger btn-rounded btn-fw delete_list">Delete</button></td>
		    </tr>';
			} }

			$ret[0] = 1;
			$ret[1] = $html;
			$ret[2] = $pagination;
			echo json_encode($ret);
	}
}
