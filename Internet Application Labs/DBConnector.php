<?php


$server = "localhost";
$username = "root";
$password = "";
$dbName = "btc3205";


class DBConnector{
	public $conn;

	function __construct(){
		$this->conn = mysqli_connect('localhost', 'root', '') or die("Error: ". mysqli_error($this->conn));

		mysqli_select_db($this->conn, $GLOBALS['dbName']);

	}

	public function closeDatabase(){
		mysqli_close($this->conn);
	}

	public function scopeData(){
		return $this->conn;

	}

}



?>
