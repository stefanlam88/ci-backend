<?php
//Create package
$json = array(
  "trip_name" => "George Restaurant",
  "trip_start_date" => "2018-11-10",
  "trip_end_date" => "2018-11-12",
  "trip_owner" => 1,
  "user_id" => 3,
  "trip_state_string"=>"2310,2210"
);

$URL = $APIURL."api/trips/trip";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => 'trip_name',
	't' => 'varchar(256)',
	'd' => "<strong>trip_name</strong>  required for API POST"
);

$required[] = array(
	'p' => 'trip_owner',
	't' => 'int(11)',
	'd' => "<strong>trip_owner</strong>  required for API POST"
);

$required[] = array(
	'p' => 'user_id',
	't' => 'int(11)',
	'd' => "<strong>user_id</strong>  required for API POST"
);

$required[] = array(
	'p' => 'trip_start_date',
	't' => 'varchar(256)',
	'd' => "<strong>trip_start_date</strong>  required for API POST"
);

$required[] = array(
	'p' => 'trip_end_date',
	't' => 'varchar(256)',
	'd' => "<strong>trip_end_date</strong>  required for API POST"
);

$required[] = array(
	'p' => 'trip_state_string',
	't' => 'varchar(256)',
	'd' => "<strong>trip_state_string</strong>  required for API POST (Example: 56000,23100)"
);


?>
