<?php
//Create package
$json = array(
  "package_name" => "George Restaurant",
  "package_description"=> "Inventive tasting menus emphasizing local ingredients in a refined space with a secluded courtyard.",
  "event_type_sub_id" => 2,
  "area_id" => 1,
  "state_id" => 2310,
  "country_id" => 129,
  "package_note" => "Seasonal, holiday or other hours changes may apply",
  "start_time" => "10:00",
  "end_time" => "12:00",
  "aboutHost" => "About Host",
  "shouldKnow" => "About Host",
  "shouldProvide" => "About Host",
  "shouldBring" => "About Host",
  "aboutHost" => "About Host",
  "package_fb_url" => "http://www.facebook.com",
  "package_twitter_url" => "http://www.twitter.com",
  "package_owner_url" => "http://www.owner.com",
  "package_host" => 1,
  "package_mod_by" => 3

);

$URL = $APIURL."api/packages/package";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => 'package_name',
	't' => 'varchar(256)',
	'd' => "<strong>package_name</strong>  required for API POST"
);

$required[] = array(
	'p' => 'package_description',
	't' => 'varchar(256)',
	'd' => "<strong>package_description</strong>  required for API POST"
);
$required[] = array(
	'p' => 'event_type_sub_id',
	't' => 'int(11)',
	'd' => "<strong>event_type_sub_id</strong>  required for API POST"
);
$required[] = array(
	'p' => 'state_id',
	't' => 'int(11)',
	'd' => "<strong>state_id</strong>  required for API POST"
);
$required[] = array(
	'p' => 'area_id',
	't' => 'int(11)',
	'd' => "<strong>area_id</strong>  required for API POST"
);
$required[] = array(
	'p' => 'country_id',
	't' => 'int(11)',
	'd' => "<strong>country_id</strong>  required for API POST"
);
$required[] = array(
	'p' => 'package_note',
	't' => 'varchar(256)',
	'd' => "<strong>package_note</strong>  required for API POST"
);
$required[] = array(
	'p' => 'start_time',
	't' => 'time',
	'd' => "<strong>start_time</strong>  required for API POST"
);
$required[] = array(
	'p' => 'end_time',
	't' => 'time',
	'd' => "<strong>end_time</strong>  required for API POST"
);

$required[] = array(
	'p' => 'shouldKnow',
	't' => 'text',
	'd' => "(Optional)"
);
$required[] = array(
	'p' => 'shouldProvide',
	't' => 'text',
	'd' => "(Optional)"
);
$required[] = array(
	'p' => 'shouldBring',
	't' => 'text',
	'd' => "(Optional)"
);
$required[] = array(
	'p' => 'aboutHost',
	't' => 'text',
	'd' => "(Optional)"
);

$required[] = array(
	'p' => 'package_host',
	't' => 'int(11)',
	'd' => "<strong>package_host</strong>  required for API POST"
);

$required[] = array(
	'p' => 'package_mod_by',
	't' => 'int(11)',
	'd' => "<strong>package_mod_by</strong>  required for API POST"
);
?>
