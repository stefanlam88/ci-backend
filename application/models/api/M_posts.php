<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posts extends CI_Model {

	/**
	 * Database User Model
	**/
	public function __construct() {
        parent::__construct();

		//	Table Settings
		$this->tablename = "posts";
		$this->columns = array(
			"id" => "post_id",
			"user_id" => "user_id",
			"title" => "title",
			"body" => "body",
		);

		$this->aliasname = implode(", ", $this->rest_return->alias($this->columns));
    }

		public function create($data){
				if(!array_key_exists('user_created', $data)){
								$data['user_created'] = date("Y-m-d H:i:s");
				}
				$result = $this->db->insert($this->tablename, $data);
				if($result){
						return $this->get($this->db->insert_id());
				}
		}


	/*********************************************************************************************************
		Get Top Comments
	*********************************************************************************************************/
	public function getTopComments($array = array()){
			$this->db->reset_query();


			// Sub Query
  		$this->db->select('p.id, p.title, p.body,  count(c.id) AS total_number_of_comments');
      $this->db->from(array('posts p', 'comments c'));
			$this->db->where('c.post_id = p.id');
			$this->db->group_by(array('p.id'));
			$this->db->order_by('total_number_of_comments', 'desc');
			$subQuery =  $this->db->get_compiled_select();
			//
			// // Main Query
			$this->db->reset_query();
			$this->db->select_max('total_number_of_comments');
			$this->db->select('id as post_id, title as post_title, body as post_body');
			$this->db->from("($subQuery) x");

      return $this->db->get()->row();
  	}

	/*********************************************************************************************************
		Get user lists
	*********************************************************************************************************/
	public function getLists($array = array()){
		$this->db->reset_query();
		$this->db->select($this->aliasname);
    $this->db->from($this->tablename);
		$this->db->join('user_commissions user_commissions',"users.user_id = user_commissions.commission_host_id", "left");

		//check if admin or super query both.
		if($array['roles'] == 'admin' || $array['roles'] == 'super'){
				$this->db->where((array('users.isDeleted' => '0')));
				$this->db->where('(user_roles = "admin" or user_roles = "super")');
		}
		else{
			  $this->db->where((array('users.isDeleted' => '0', 'user_roles' => $array['roles'])));
		}



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

	/*********************************************************************************************************
		Get user
	*********************************************************************************************************/
	public function get($id){
		$this->db->reset_query();
		$this->db->select($this->aliasname);
    $this->db->from($this->tablename);
		$this->db->join('user_commissions user_commissions',"users.user_id = user_commissions.commission_host_id", "left");
		$this->db->where(array('users.isDeleted' => '0', 'users.user_id' => $id), true);
		return $this->db->get()->row();

  }

}
