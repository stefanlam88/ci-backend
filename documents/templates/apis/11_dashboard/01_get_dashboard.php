<?php
$json = array(
  "user_id" => 3
);
$URL = $APIURL."api/dashboards/count";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => 'user_id',
	't' => 'int(11)',
	'd' => "<strong>user_id</strong>  required for API POST"
);

?>
