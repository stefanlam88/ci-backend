<?php
$json = array(

);

$URL = $APIURL."api/trip/1/itinerary/delete";
$method = "DELETE";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/trip/<strong>[trip_id]</strong>/itinerary/delete",
	't' => 'int(11)',
	'd' => "<strong>[trip_id]</strong>  required for API DELETE"
);
?>
