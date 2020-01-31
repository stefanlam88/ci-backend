<?php

$json = array(
  "user_id" => 3,
  "package_id" => 23
);
$URL = $APIURL."api/dashboards/count";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);


$required[] = array(
	'p' => "user_id",
	't' => 'int(11)',
	'd' => "<strong>user_id</strong>  required for API POST"
);

$required[] = array(
	'p' => "package_id",
	't' => 'int(11)',
	'd' => "<strong>package_id</strong>  required for API POST"
);
?>
