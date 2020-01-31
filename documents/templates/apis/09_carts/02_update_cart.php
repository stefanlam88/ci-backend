<?php
$json = array(
	"cart_id" => 52,
	"trip_id" => 1,
	"cart_quantity" => 2
);

$URL = $APIURL."api/cart/update";
$method = "PUT";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "cart_id",
	't' => 'int(11)',
	'd' => "<strong>cart_id</strong> required for API POST"
);
$required[] = array(
	'p' => "trip_id",
	't' => 'int(11)',
	'd' => "<strong>trip_id</strong> required for API POST"
);
$required[] = array(
	'p' => "cart_quantity",
	't' => 'int(11)',
	'd' => "<strong>cart_quantity</strong> required for API POST"
);
?>
