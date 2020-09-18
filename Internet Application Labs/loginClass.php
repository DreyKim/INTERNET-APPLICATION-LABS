
<?php

class login{
	private $username;
	private $password;
	private $conn;





    //Constructor to intialise variables
	function __construct($username, $password){
		$this->username = $username;
		$this->password = $password;

		$scope = new DBConnector();
		$this->conn = $scope->scopeData();

	}

	public function setUsername($user){
		$this->username=$user;

	}
	public function getUsername(){
		return $this->username;

	}

	public function setPassword($pass){
		$this->password = $pass;

	}
	public function getPassword(){
		return $this->password;

	}

	public function login(){
		$un = $this->username;
		$ps = md5($this->password);


		$sql = "SELECT * FROM users WHERE username='$un' AND password = '$ps'";



		$result = mysqli_query($this->conn, "SELECT * FROM users WHERE username='$un' AND password = '$ps'") or die ("Error: " .mysqli_error($this->conn));


		if(mysqli_num_rows($result) == 1) {
			$_SESSION['username']=$this->username;
			header("location: /Internet Application Labs/private_page.php");
			exit();



		}
		else{
			echo "USERNAME PASSWORD COMBINATION INCORRECT.";
		}


		$sqlImage="SELECT File FROM users WHERE username = '$un'";

		$result2 = mysqli_query($this->conn, "SELECT File FROM users WHERE username = '$un'") or die ("Error: " .mysqli_error($this->conn));



		if(!$result2){
			echo "Obtaining Image Failed";

		}
		else{

			while ($row = $result2->fetch_assoc()){
				$_SESSION['photo_name'] = $row['File'];

			}

		}



		return $result;
	}


}


?>
