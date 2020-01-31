
<?php
$json = array(
	"file" => array("file.png", "file2.png")
);

$URL = $APIURL."api/category";
$method = "POST";
$json = json_encode($json);
//$response = call($URL, $json, $method);
$response = array();
?>
<div class="page-header">
 	<h1><?php echo ucwords(str_replace("_", " ", $_REQUEST['docs']));?> Form</h1>
</div>

<form action="<?php echo $URL;?>" method="post" enctype="multipart/form-data" class="form-horizontal">
	<input type="hidden" value="Transport" name="event_types_sub_name"/>
	<input type="hidden" value="active" name="event_types_sub_status"/>
	<input type="hidden" value="1" name="user_id"/>
	<div class="form-group">
		<div class="col-sm-6">
    		<input type="file" name="file" class="form-control"/>
        </div>
        <div class="col-sm-6">

		</div>
    </div>
    <input type="submit" value="Upload" class="btn btn-sm btn-primary" />
</form>

<?php
$required[] = array(
	'p' => 'event_types_sub_name',
	't' => 'varchar(32)',
	'd' => "<strong>event_types_sub_name</strong>  required for API POST (Activity Category Name)"
);

$required[] = array(
	'p' => 'event_types_sub_status',
	't' => 'varchar(32)',
	'd' => "event_types_sub_status <strong>{active|inactive}</strong>"
);

$required[] = array(
	'p' => 'user_id',
	't' => 'int(11)',
	'd' => "<strong>user_id</strong>  required for API POST"
);

$required[] = array(
	'p' => 'file',
	't' => 'int(11)',
	'd' => "<strong>file</strong>  required for API POST"
);
?>
