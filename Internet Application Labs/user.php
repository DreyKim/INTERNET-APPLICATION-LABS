<?php

include "crud.php";
include "authenticator.php";




class user implements Crud,authenticator {

	  private $user_id;
	  private $first_name;
	  private $last_name;
	  private $city_name;
	  private $conn;
		private $username;
		private $password;
		private $fileToUpload;



	function __construct($first_name, $last_name, $city_name, $username, $password, $fileToUpload){
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->city_name = $city_name;
		$this->username = $username;
		$this->password = $password;


		$this->fileToUpload = $fileToUpload;

		$scope = new DBConnector();

		$this->conn = $scope->scopeData();
	}

    /*Static Constructor*/
	public static function create(){
		$instance = new self();
		return $instance;

	}


	//Username setter
	public function setUsername($username){
		$this->username = $username;
	}

	//Username getter
	public function getUsername(){
		return $this->username;

	}

	//Password setter
	public function setPassword($password){
		$this->password = $password;

	}

	//Password getter
	public function getPassword(){
		return $this->password;

	}




    //user_id setter
	public function setUserId($user_id){
		$this->user_id = $user_id;

	}

    //User_id getter
	public function getUserId(){
		return $this->$user_id;

	}



	//Implement the interface functions
	public function save(){
		$fileIn = new file();

		$fileIn->uploadFile();

		$fn = $this->first_name;
		$ln = $this->last_name;
		$city = $this->city_name;
		$username = $this->username;
		$password = md5($this->password);
		$file =  $this->fileToUpload;


		$res = mysqli_query($this->conn, "INSERT INTO users(first_name, last_name, city_name, username, password,File) VALUES ('$fn', '$ln', '$city', '$username', '$password','$file')") or die ("Error: " .mysqli_error($this->conn));

		return $res;


	}

	public function readAll(){
		return null;

	}

	public function readUnique(){
		return null;
	}

	public function search(){
		return null;

	}

	public function update(){
		return null;

	}

	public function removeOne(){
		return null;

	}

	public function removeAll(){
		return null;

	}


	//Authenticator methods


	public function hashPassword(){
		return null;

	}

	public function isPasswordCorrect(){
		return null;

	}

	public function login(){
		return null;

	}

	public function logout(){
		return null;

	}

	public function createFormErrorSessions(){
		session_start();
		$_SESSION["form_errors"] = "All fields are required";
	}














	public function validateForm(){
		$fn = $this->first_name;
		$ln = $this->last_name;
		$city = $this->city_name;
		$file = $this->fileToUpload;

		if($fn == "" || $ln == "" || $city == ""){

			return false;
		}

		return true;
	}


	    public function isUserExist() {
        $query = "SELECT username
                    FROM users
                    WHERE username = '$this->username'";

        if($result = $this->conn->query($query)) {
            return $result->num_rows > 0;
        } else {
            throw new Exception("Server error ". $this->conn->error);
        }
    }




}


?>
