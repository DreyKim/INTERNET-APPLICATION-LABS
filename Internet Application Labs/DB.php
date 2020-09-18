<?php


$server = "localhost";
$username = "root";
$password = "";
$dbName = "btc3205";

$connection = mysqli_connect($server, $username, $password, $dbName);

if(!$connection){
	echo "CONNECTION COMPLETE";

}
else{
	echo "CONNECTION FAIL";

}


?>