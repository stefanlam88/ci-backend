
<?php
//Create package
$json = array(
  "package_id" => "23",
  "calendar_package_date"=> "2018-12-11",
  "calendar_package_price" => 28,
  "calendar_package_status" => "1",
  "calendar_package_max_quota" => 20,
  "package_note" => "Seasonal, holiday or other hours changes may apply",
  "calendar_package_owner" => "2"

);

$URL = $APIURL."api/packages/calendar";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required = array("package_id", "calendar_package_date", "calendar_package_price", "calendar_package_status", "calendar_package_max_quota", "package_note", "calendar_package_owner");

$required[] = array(
	'p' => 'package_id',
	't' => 'varchar(256)',
	'd' => "<strong>package_id</strong>  required for API POST"
);

$required[] = array(
	'p' => 'calendar_package_date',
	't' => 'date(d-m-y)',
	'd' => "<strong>calendar_package_date</strong>  required for API POST"
);
$required[] = array(
	'p' => 'calendar_package_price',
	't' => 'double',
	'd' => "<strong>calendar_package_price</strong>  required for API POST"
);
$required[] = array(
	'p' => 'calendar_package_status',
	't' => 'int(11)',
  'd' => "<strong>package_approval</strong> {0|1} required for API POST (0 - not available, 1 - available)"
);
$required[] = array(
	'p' => 'calendar_package_max_quota',
	't' => 'int',
	'd' => "<strong>calendar_package_max_quota</strong>  required for API POST"
);

$required[] = array(
	'p' => 'package_note',
	't' => 'text',
	'd' => "<strong>package_note</strong>  required for API POST"
);
$required[] = array(
	'p' => 'calendar_package_owner',
	't' => 'int(11)',
	'd' => "<strong>calendar_package_owner</strong>  required for API POST"
);

?>
