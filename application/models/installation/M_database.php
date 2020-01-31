<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_database extends CI_Model {

	/**
	 * Database Installation Model
	 *
	**/
	public function __construct() {
        parent::__construct();
      	//load database library
		$this->load->dbforge();
		$this->load->library('rest');
		
		$this->rest->config($this->config->base_url(), 'admin', '1234');
    }

	/*********************************************************************************************************
		Fresh install the database
	*********************************************************************************************************/
	public function install(){
		$attributes = array('ENGINE' => 'InnoDB');
		//	DROP TABLE
		$this->dbforge->drop_table("users", true);
		$this->dbforge->drop_table("customers", true);
		$this->dbforge->drop_table("customer_groups", true);
		$this->dbforge->drop_table("customer_banks", true);
		$this->dbforge->drop_table("customer_notes", true);
		$this->dbforge->drop_table("customer_branches", true);
		$this->dbforge->drop_table("goods", true);
		$this->dbforge->drop_table("good_attachments", true);
		$this->dbforge->drop_table("good_brands", true);
		$this->dbforge->drop_table("good_categories", true);
		$this->dbforge->drop_table("good_images", true);
		$this->dbforge->drop_table("good_locations", true);
		$this->dbforge->drop_table("good_others", true);
		$this->dbforge->drop_table("good_uoms", true);
		
		//	CREATE TABLE
		$tables = $this->table_schema();
		if($tables){
			foreach($tables as $table => $array){
				$this->dbforge->add_field($array['fields']);
				$this->dbforge->add_key($array['keys'], true);
				$this->dbforge->create_table($table, true, $attributes);
			}
		}
		
		/**********************************************************************************************
			Below are the dummy data for installtion, please remove it when production use
		**********************************************************************************************/
	
		$password = $this->rest->call("api/auth/encryption/123456", json_encode(array()), "GET");
		$password = json_decode($password, true);
		//Create Super admin
		$data = array(
			"firstname" => "Kenneth", "lastname" => "Cham", "contact" => "60123456789", "email" => "kennethcham@itechbs.com", "username" => "kennethcham@itechbs.com", "password" => $password['data']['keys'], "status" => 1, "roles" => "super"
		);
    	print_r($this->rest->call("api/user/", json_encode($data), "POST"));

		
	}
	
	/*********************************************************************************************************
		Update the database
	*********************************************************************************************************/
	public function update(){
		$attributes = array('ENGINE' => 'InnoDB');
		$tables = array();

		if($tables){
			foreach($tables as $table => $array){
				$this->dbforge->add_field($array['fields']);
				$this->dbforge->add_key($array['keys'], true);
				$this->dbforge->create_table($table, true, $attributes);
			}
		}
	}
	
	/*********************************************************************************************************
		Table Schema
	*********************************************************************************************************/
	private function table_schema(){
		$tables = array();
		$tables['users'] = array(
			"fields" => array(
				"user_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"user_firstname" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"user_lastname" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"user_username" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"user_password" => array('type' => 'text', 'null' => true),
				"user_contact" => array('type' => 'varchar', "constraint" => 20, 'null' => true),
				"user_email" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"user_address" => array('type' => 'varchar', "constraint" => 512, 'null' => true),
				"user_status" => array('type' => 'tinyint', "constraint" => 1),
				"user_roles" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"user_created" => array('type' => 'datetime'),
				"user_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "user_id"
		);
		
		$tables['customers'] = array(
			"fields" => array(
				"customer_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"cgroup_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"customer_company_name" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"customer_additional" => array('type' => 'varchar', "constraint" => 512, 'null' => true),
				"customer_roc" => array('type' => 'varchar', "constraint" => 128, 'null' => true),
				"customer_code" => array('type' => 'varchar', "constraint" => 64, 'null' => true),
				"customer_gst_no" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"customer_credit_term" => array('type' => 'varchar', "constraint" => 64, 'null' => true),
				"customer_credit_limit" => array('type' => 'varchar', "constraint" => 64, 'null' => true),
				"customer_currency" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"customer_aging_on" => array('type' => 'varchar', "constraint" => 64, 'null' => true),
				"customer_agent" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"customer_open_1_day_from" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"customer_open_1_day_to" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"customer_open_1_time_from" => array('type' => 'time', 'null' => true),
				"customer_open_1_time_to" => array('type' => 'time', 'null' => true),
				"customer_open_2_day_from" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"customer_open_2_day_to" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"customer_open_2_time_from" => array('type' => 'time', 'null' => true),
				"customer_open_2_time_to" => array('type' => 'time', 'null' => true),
				"customer_status" => array('type' => 'tinyint', "constraint" => 1),
				"customer_created" => array('type' => 'datetime'),
				"customer_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "customer_id"
		);
		
		$tables['customer_groups'] = array(
			"fields" => array(
				"cgroup_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"cgroup_name" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cgroup_description" => array('type' => 'text', 'null' => true),
				"cgroup_status" => array('type' => 'tinyint', "constraint" => 1),
				"cgroup_created" => array('type' => 'datetime'),
				"cgroup_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "cgroup_id"
		);
		
		$tables['customer_banks'] = array(
			"fields" => array(
				"no" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"customer_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"cbank_bank_name" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cbank_holder_name" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cbank_account_no" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"cbank_swift_code" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"cbank_currency" => array('type' => 'varchar', "constraint" => 32, 'null' => true),
				"cbank_created" => array('type' => 'datetime'),
				"cbank_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "no"
		);
		
		$tables['customer_notes'] = array(
			"fields" => array(
				"no" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"customer_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"cnote_open_date" => array('type' => 'datetime'),
				"cnote_business_nature" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cnote_image_path" => array('type' => 'varchar', "constraint" => 64, 'null' => true),
				"cnote_additional_desc" => array('type' => 'text', 'null' => true),
				"cnote_created" => array('type' => 'datetime'),
				"cnote_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "no"
		);
		
		$tables['customer_branches'] = array(
			"fields" => array(
				"cbranch_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"customer_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"cbranch_address_1" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cbranch_address_2" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cbranch_address_3" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cbranch_remark" => array('type' => 'text', 'null' => true),
				"cbranch_latitude" => array('type' => 'varchar', "constraint" => 128, 'null' => true),
				"cbranch_longitude" => array('type' => 'varchar', "constraint" => 128, 'null' => true),
				"cbranch_state" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cbranch_postcode" => array('type' => 'varchar', "constraint" => 16, 'null' => true),
				"cbranch_person_name" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cbranch_person_contact" => array('type' => 'varchar', "constraint" => 20, 'null' => true),
				"cbranch_person_email" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"cbranch_person_remark" => array('type' => 'text', 'null' => true),
				"cbranch_status" => array('type' => 'tinyint', "constraint" => 1),
				"cbranch_created" => array('type' => 'datetime'),
				"cbranch_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "cbranch_id"
		);
		
		$tables['good_categories'] = array(
			"fields" => array(
				"gcategory_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"gcategory_name" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"gcategory_description" => array('type' => 'text', 'null' => true),
				"gcategory_status" => array('type' => 'tinyint', "constraint" => 1),
				"gcategory_created" => array('type' => 'datetime'),
				"gcategory_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "gcategory_id"
		);
		
		$tables['good_brands'] = array(
			"fields" => array(
				"gbrand_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"gbrand_name" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"gbrand_description" => array('type' => 'text', 'null' => true),
				"gbrand_status" => array('type' => 'tinyint', "constraint" => 1),
				"gbrand_created" => array('type' => 'datetime'),
				"gbrand_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "gbrand_id"
		);
		
		$tables['good_uoms'] = array(
			"fields" => array(
				"guom_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"guom_name" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"guom_description" => array('type' => 'text', 'null' => true),
				"guom_status" => array('type' => 'tinyint', "constraint" => 1),
				"guom_created" => array('type' => 'datetime'),
				"guom_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "guom_id"
		);
		
		$tables['good_locations'] = array(
			"fields" => array(
				"gloc_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"gloc_name" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"gloc_description" => array('type' => 'text', 'null' => true),
				"gloc_status" => array('type' => 'tinyint', "constraint" => 1),
				"gloc_created" => array('type' => 'datetime'),
				"gloc_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "gloc_id"
		);
		
		$tables['goods'] = array(
			"fields" => array(
				"good_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"gcategory_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"gbrand_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"guom_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"gloc_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"good_code" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"good_model" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"good_description_1" => array('type' => 'text', 'null' => true),
				"good_description_2" => array('type' => 'text', 'null' => true),
				"good_ref_cost" => array('type' => 'double', "constraint" => "10,2", 'null' => true),
				"good_ref_price" => array('type' => 'double', "constraint" => "10,2", 'null' => true),
				"good_min_price" => array('type' => 'double', "constraint" => "10,2", 'null' => true),
				"good_packing_1" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"good_packing_2" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"good_dimension_length" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"good_dimension_width" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"good_dimension_height" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"good_gross_weight" => array('type' => 'double', "constraint" => "10,2", 'null' => true),
				"good_net_weight" => array('type' => 'double', "constraint" => "10,2", 'null' => true),
				"good_barcode" => array('type' => 'varchar', "constraint" => 128, 'null' => true),
				"good_recorder_level" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"good_recorder_quantity" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"good_lead_time" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"good_remark_1" => array('type' => 'varchar', "constraint" => 1024, 'null' => true),
				"good_remark_2" => array('type' => 'varchar', "constraint" => 1024, 'null' => true),
				"good_in_stock_control" => array('type' => 'tinyint', "constraint" => 1),
				"good_status" => array('type' => 'tinyint', "constraint" => 1),
				"good_created" => array('type' => 'datetime'),
				"good_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "good_id"
		);
		
		$tables['good_others'] = array(
			"fields" => array(
				"no" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"good_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"gother_description" => array('type' => 'text', 'null' => true),
				"gother_created" => array('type' => 'datetime'),
				"gother_updated" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "no"
		);
		
		$tables['good_images'] = array(
			"fields" => array(
				"gimage_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"good_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"gimage_path" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"gimage_description" => array('type' => 'text', 'null' => true),
				"gimage_created" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "gimage_id"
		);
		
		$tables['good_attachments'] = array(
			"fields" => array(
				"gattach_id" => array('type' => 'int', "constraint" => 11, 'auto_increment' => true),
				"good_id" => array('type' => 'int', "constraint" => 11, 'null' => true),
				"gattach_path" => array('type' => 'varchar', "constraint" => 256, 'null' => true),
				"gattach_description" => array('type' => 'text', 'null' => true),
				"gattach_created" => array('type' => 'datetime'),
				"isDeleted" => array('type' => 'tinyint', "constraint" => 1)	
			),
			"keys" => "gattach_id"
		);
		
		
		return $tables;
	}
	
}
