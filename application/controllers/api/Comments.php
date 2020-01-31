<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Comments extends REST_Controller {

  public function __construct(){
      // 	Construct the parent class
      parent::__construct();

  //	load model
      $this->load->model('api/m_comments');

  }


  public function list_get(){
      $data = array();
      $data['offset'] = $this->get('offset') < 0 ? 0 : $this->get('offset');
      $data['limit'] = $this->get('limit') < 0 ? 50 : $this->get('limit');
      $data['field'] = empty($this->get('field')) ? "" : $this->get('field');
      $data['sortby'] = (!$this->get('sortby')) ? "asc" : $this->get('sortby');
      $data['filters'] = empty($this->get('filters')) ? array() : json_decode($this->get('filters'), true);

      $array = array();

      $array = $this->m_comments->getLists($data);

      $response = $this->rest_return->response(true, "", "success", $array);

      $this->response($response, 200);
  }



}
