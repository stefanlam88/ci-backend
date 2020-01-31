<?php
$json = array(
	array("field" => "trip_name", "operator" => "%", "value" => ""),
);
$URL = $APIURL."api/trips/lists?trip_owner=3&offset=0&limit=2&field=trip_id&sortby=DESC&".json_encode($json);
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
	'p' => "field",
	't' => 'varchar(32)',
	'd' => "param name"
);

$required[] = array(
	'p' => "sortby",
	't' => 'varchar(32)',
	'd' => "sort <strong>{asc|desc}</strong>"
);

$required[] = array(
	'p' => "filters",
	't' => 'varchar(32)',
	'd' => "[{field:'firstname', 'operator':'%', value:''}]"
);
?>
