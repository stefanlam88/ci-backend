<?php
$json = array(
	"trip_id" => 5
);

$URL = $APIURL."api/trip/delete";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "trip_id",
	't' => 'int(11)',
	'd' => "<strong>[trip_id]</strong>  required for API POST"
);
?>
