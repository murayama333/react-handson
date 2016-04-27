<?php
define("FILE_NAME", "name.json");
if(isset($_POST["name"])){
	$name = $_POST["name"];
	$names = json_decode(file_get_contents(FILE_NAME, "r"));
	$names[] = $name;
	$json = json_encode($names);
	file_put_contents(FILE_NAME, $json, LOCK_EX);
}else{
	$json = file_get_contents(FILE_NAME, "r");
}
header("Content-Type: application/json; charset=utf-8");
echo $json;
