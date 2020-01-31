<?php


$URL = $APIURL."api/trip/1/user/3?date=2019-02-13";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/trip/<strong>[trip_id]</strong>/user/<strong>[user_id]</strong>?date=<strong>[date]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[trip_id]</strong>, <strong>[user_id]</strong>, <strong>[date]</strong>  required for API url, Note: if no date pass, default will be first day of the trip"
);
?>
