<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_comments extends CI_Model {

	/**
	 * Database User Model
	**/
	public function __construct() {
        parent::__construct();

		//	Table Settings
		$this->tablename = "comments";
    $this->columns = array(
			"id" => "id",
			"post_id" => "post_id",
			"user_id" => "user_id",
			"name" => "name",
      "email" => "email",
      "body" => "body",
		);

    }



	/*********************************************************************************************************
		Get comments lists
	*********************************************************************************************************/
	public function getLists($array = array()){
		$this->db->reset_query();
		$this->db->select('*');
    $this->db->from('comments');
		$this->db->join('posts p',"p.id = comments.post_id", "left");

		//	Filtering
		$i = 0;

		if($array['filters']){
			$this->db->group_start(); //open bracket
			foreach($array['filters'] as $filter){

				//	Check the first records
				if($i === 0){
					//	Check operator
					if($filter['operator'] == "%"){
						$this->db->like($this->columns[$filter['field']], $filter['value'], 'both', true);
					}else if($filter['operator'] == "="){
						$this->db->where($this->columns[$filter['field']], $filter['value'], true);
					}
				}else{
					//	Check Use Or operater
					if($filter['operator'] == "%"){
						$this->db->or_like($this->columns[$filter['field']], $filter['value'], 'both', true);
					}else if($filter['operator'] == "="){
						$this->db->or_where($this->columns[$filter['field']], $filter['value'], true);
					}
				}
				$i++;
			}
			$this->db->group_end();	//close bracket
		}

		//	Sorting
		if(!empty($array['field'])){
			$this->db->order_by($array['field'], $array['sortby']);
		}

		// Limits
		$this->db->limit($array['limit'], $array['offset']);
		return $this->db->get()->result();
    }



}
