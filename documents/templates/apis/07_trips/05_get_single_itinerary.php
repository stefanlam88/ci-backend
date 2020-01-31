<?php
$json = array();
$URL = $APIURL."/api/trip/1/itinerary";
$method = "GET";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/trip/<strong>[trip_event_id]</strong>/itinerary",
	't' => 'int(11)',
	'd' => "<strong>[trip_event_id]</strong>  required for API GET, Get Itinerary details"
);
?>
