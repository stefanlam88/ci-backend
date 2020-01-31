<?php
//Create package
$json = array(
);

$URL = $APIURL."api/trip/1/cart";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/trip/<strong>[trip_id]</strong>/cart",
	't' => 'int(11)',
	'd' => "<strong>[trip_id]</strong> required for API url"
);
?>
