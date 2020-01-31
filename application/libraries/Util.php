<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Util{

  public function __construct(){
        // Get the CodeIgniter reference
        $this->_CI =& get_instance();
	}

  public static function getSession($time) {
    if(strtotime($time) > strtotime("06:00") && strtotime($time) < strtotime("12:00")){
      return 1;
    }
    else if(strtotime($time) >= strtotime("12:00") && strtotime($time) < strtotime("18:00")){
      return 2;
    }
    else if(strtotime($time) >= strtotime("18:00") && strtotime($time) <= strtotime("24:00") || (strtotime($time) >= strtotime("00:00") && strtotime($time) < strtotime("03:00"))){
      return 3;
    }
    else{
      return 0;
    }
  }


}
 ?>
