<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_database extends CI_Controller {

	/**
	 * Database Installation Controller
	 *
	**/
	public function __construct() {
        parent::__construct();
      	//load installation model
        $this->load->model('installation/m_database');
    }
	
	/*********************************************************************************************************
		Fresh install the database
	*********************************************************************************************************/
	public function install(){
		$this->m_database->install();
	}
	
	/*********************************************************************************************************
		update the database
	*********************************************************************************************************/
	public function update(){
		$this->m_database->update();
	}
}
