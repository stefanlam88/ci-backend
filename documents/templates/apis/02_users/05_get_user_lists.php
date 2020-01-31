<?php
$json = array(
	array("field" => "firstname", "operator" => "%", "value" => ""),
);
$URL = $APIURL."api/users/?roles=admin&offset=0&limit=10&field=id&sortby=DESC&filters=".json_encode($json);
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required = array();
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
	'p' => "roles",
	't' => 'varchar(32)',
	'd' => "status <strong>{admin|host|customer}</strong>"
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
