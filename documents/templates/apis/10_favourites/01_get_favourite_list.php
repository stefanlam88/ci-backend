<?php

$URL = $APIURL."api/favourites?user_id=3&offset=0&limit=10&field=&sortby=DESC";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "offset",
	't' => 'int',
	'd' => "starting offset"
);

$required[] = array(
	'p' => "limit",
	't' => 'int',
	'd' => "limit data to call"
);

$required[] = array(
	'p' => $APIURL."api/favourites/?user_id=<strong>[user_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[user_id]</strong>  required for API url"
);

$required[] = array(
	'p' => "field",
	't' => 'varchar(32)',
	'd' => "param name"
);

$required[] = array(
	'p' => "sortby",
	't' => 'varchar(32)',
	'd' => "sort <strong>{asc|desc}</strong>"
);

?>
