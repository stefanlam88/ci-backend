<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Posts extends REST_Controller {

  public function __construct(){
      // 	Construct the parent class
      parent::__construct();

  //	load model
      $this->load->model('api/m_posts');

  }


  public function top_comment_get(){
      $data = array();
      //	Check Empty
      $array = $this->m_posts->getTopComments();

      $response = $this->rest_return->response(true, "", "success", $array);

      $this->response($response, 200);
  }



}
