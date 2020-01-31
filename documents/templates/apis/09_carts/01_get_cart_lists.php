
<?php

$URL = $APIURL."api/cart/1";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);


$required[] = array(
	'p' => $APIURL."api/cart/<strong>[trip_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[trip_id]</strong>  required for API url"
);
?>
