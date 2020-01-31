
<?php
//Create package
$json = array(
  "trip_id" => 1,
  "user_id" => 3

);

$URL = $APIURL."api/order";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);


$required[] = array(
	'p' => "trip_id",
	't' => 'int(11)',
	'd' => "<strong>trip_id</strong>  required for API POST"
);

$required[] = array(
	'p' => "user_id",
	't' => 'int(11)',
	'd' => "<strong>user_id</strong>  required for API POST"
);
?>
