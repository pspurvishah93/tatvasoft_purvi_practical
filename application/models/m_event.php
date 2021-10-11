<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_event extends CI_Model {

	function add_event($post=[])	{
		$ins_arr1 = array(
			'event_title' => $post["event_title"],
			'start_date' => date('Y-m-d H:i:s', strtotime($post["start_date"])),
			'end_date' => date('Y-m-d H:i:s', strtotime($post["end_date"])),
			'repeat_type' => $post["repeat_type"]
		);

		if($post["repeat_type"] == 1) {
			$ins_arr2 = array(
				'repeat_at' => $post["repeat_at"],
				'repeat_day' => $post["repeat_day"]
			);
		}
		else if($post["repeat_type"] == 2) {
			$ins_arr2 = array(
				'repeat_on_at' => $post["repeat_on_at"],
				'repeat_on_day' => $post["repeat_on_day"],
				'repeat_on_type' => $post["repeat_on_type"]
			);
		}

		$ins_arr = array_merge($ins_arr1, $ins_arr2);

		$insert = $this->db->insert("event_mst", $ins_arr);

		if($insert) {
			return 1;
		}
		else {
			return 2;
		}
	}

	function update_event($post=[])	{
		$ins_arr1 = array(
			'event_title' => $post["event_title"],
			'start_date' => date('Y-m-d H:i:s', strtotime($post["start_date"])),
			'end_date' => date('Y-m-d H:i:s', strtotime($post["end_date"])),
			'repeat_type' => $post["repeat_type"]
		);

		if($post["repeat_type"] == 1) {
			$ins_arr2 = array(
				'repeat_at' => $post["repeat_at"],
				'repeat_day' => $post["repeat_day"],
				'repeat_on_at' => 0,
				'repeat_on_day' => 0,
				'repeat_on_type' => 0
			);
		}
		else if($post["repeat_type"] == 2) {
			$ins_arr2 = array(
				'repeat_at' => 0,
				'repeat_day' => 0,
				'repeat_on_at' => $post["repeat_on_at"],
				'repeat_on_day' => $post["repeat_on_day"],
				'repeat_on_type' => $post["repeat_on_type"]
			);
		}

		$ins_arr = array_merge($ins_arr1, $ins_arr2);

		$response = $this->db->set($ins_arr)->where("event_id", $post["event_id"])->update("event_mst");

		if($response) {
			return 1;
		}
		else {
			return 2;
		}
	}

	function delete_event($post=[]){
		$response = $this->db->set("status", 0)->where("event_id", $post["event_id"])->update("event_mst");
		if($response) {
			return 1;
		}
		else {
			return 2;
		}
	}

	function view_event($post=[]){
		// $response = $this->db->select("*, case repeat_at when 1 then 'Every' when 2 then 'Every Other' when 3 then 'Every Third' when 4 then 'Every Fourth' end as repeat_at, case repeat_day when 1 then 'Day' when 2 then 'Week' when 3 then 'Month' when 4 then 'Year' end as repeat_day, case repeat_on_at when 1 then 'First' when 2 then 'Second' when 3 then 'Third' when 4 then 'Fourth' end as repeat_on_at, case repeat_on_day when 1 then 'Sun' when 2 then 'Monday' when 3 then 'Tuesday' when 4 then 'Wednesday' when 5 then 'Thursday' when 6 then 'Friday' when 7 then 'Saturday' end as repeat_on_day, case repeat_on_type when 1 then 'Month' when 2 then '3 Months' when 3 then '4 Months' when 4 then '6 Months' when 5 then 'Year' end as repeat_on_type", false)->where("status", 1)->where("event_id", $post["event_id"])->get("event_mst")->row_array();

		$response = $this->db->select("*", false)->where("status", 1)->where("event_id", $post["event_id"])->get("event_mst")->row_array();

		if($response) {
			$data = $this->getdaterange($response["start_date"], $response["end_date"]);
			// echo "<pre>"; print_r($data); exit;
			$response["range"] = $data;
			$response["event_title"] = $response["event_title"];
			$response["total_count"] = count($data);
			return $response;
		}
		else {
			return array();
		}
	}

	function getdaterange($startdate, $enddate){
		$sd = strtotime($startdate);
		$ed = strtotime($enddate);
		$range_arr = array();
		for($start = $sd; $start <= $ed; $start += 86400){
			$newarr = array();
			$dt = date('Y-m-d', $start);
			$dy = date('D', $start);
			$newarr = array(
				'dt' => $dt,
				'dy' => $dy
			);
			array_push($range_arr, $newarr);
		}
		return $range_arr;
	}

	function view_all_event($post=[]){
		if(!isset($post["offset"])) {
			$offset = 0;
		}
		else {
			if($post["offset"] > 1) {
				$offset = ($post["offset"] - 1) * 10;
			}
			else {
				$offset = 1 * 10;
			}
		}
		$response = $this->db->select("*, case repeat_at when 1 then 'Every' when 2 then 'Every Other' when 3 then 'Every Third' when 4 then 'Every Fourth' end as repeat_at, case repeat_day when 1 then 'Day' when 2 then 'Week' when 3 then 'Month' when 4 then 'Year' end as repeat_day, case repeat_on_at when 1 then 'First' when 2 then 'Second' when 3 then 'Third' when 4 then 'Fourth' end as repeat_on_at, case repeat_on_day when 1 then 'Sun' when 2 then 'Monday' when 3 then 'Tuesday' when 4 then 'Wednesday' when 5 then 'Thursday' when 6 then 'Friday' when 7 then 'Saturday' end as repeat_on_day, case repeat_on_type when 1 then 'Month' when 2 then '3 Months' when 3 then '4 Months' when 4 then '6 Months' when 5 then 'Year' end as repeat_on_type", false)->where("status", 1)->limit(10)->offset($offset)->get("event_mst")->result_array();
		if($response) {
			foreach($response as $key => $value) {
				if($value["repeat_type"] == 1){
					$response[$key]["recurrance"] = $value["repeat_at"]." ".$value["repeat_day"];
				}
				else if($value["repeat_type"] == 2){
					$response[$key]["recurrance"] = 'Every ' . $value["repeat_on_at"] ." " .  $value["repeat_on_day"]." of the ".$value["repeat_on_type"];
				}
			}
			return $response;
		}
		else {
			return array();
		}
	}

	function pagination(){
		$html = '';
		$list = $this->db->select("event_id")->where("status", 1)->get("event_mst")->result_array();
		$total = count($list);
		$start = 10;
		$pages = 1;
		$no_of_pages = ceil($total / $start);
		$html .= '<ul>';
		for($i = 1; $i <= $no_of_pages; $i++) {
			$html .= '<li><button data-eid="'.$i.'" type="button" class="btn btn-primary btn-rounded btn-fw paglink">'.$i.'</button></li>';
		}
		$html .= '</ul>';

		return $html;
	}
}
