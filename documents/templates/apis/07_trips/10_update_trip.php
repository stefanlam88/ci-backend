<?php
//Create package
$json = array(
  "trip_name" => "George Restaurant2",
  "user_id" => 3
);

$URL = $APIURL."api/trip/1";
$method = "PUT";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => 'trip_name',
	't' => 'varchar(256)',
	'd' => "<strong>trip_name</strong>  required for API POST"
);
$required[] = array(
	'p' => 'user_id',
	't' => 'varchar(256)',
	'd' => "<strong>user_id</strong>  required for API POST"
);


?>
