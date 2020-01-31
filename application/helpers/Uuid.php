<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uuid{

  public function __construct(){
        // Get the CodeIgniter reference
        $this->_CI =& get_instance();
	}

  public function generateUuid($prefix = '')
  {
      $chars = md5(uniqid(mt_rand(), true));
      $parts = [substr($chars,0,8), substr($chars,8,4), substr($chars,12,4), substr($chars,16,4), substr($chars,20,12)];

      return $prefix . implode($parts, '-');;
  }
}
 ?>
