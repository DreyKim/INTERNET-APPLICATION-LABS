<?php
class file{

	private static $target_directory = "uploads/";
	private static $size_limit = 50000;
	private $uploadOk = false;
	private $file_original_name;
	private $file_type;
	private $file_size;
	private $final_file_name;


	public function setOriginalName($name){
		$this->file_original_name = $name;

	}
	public function getOriginalName(){
		return $this->file_original_name;

	}

	public function setFileType($type){
		$this->file_type = $type;

	}
	public function getFileType(){
		return $this->file_type;

	}

	public function setFileSize($size){
		$this->file_size=$size;

	}
	public function getFileSize(){
		return $this->file_size;

	}

	public function setFileName($final_name){
		$this->final_file_name = $final_name;
	}

	public function getFileName(){
		return $this->final_file_name;
	}

	/*Methods*/
	public function uploadFile(){
		$fNme = $_FILES["fileToUpload"]["name"];

		$fType = $_FILES["fileToUpload"]["type"];

		$fSize = $_FILES["fileToUpload"]["size"];

		$fTempLoc = $_FILES["fileToUpload"]["tmp_name"];
			
		$fStore = "upload/".$fNme; 

		move_uploaded_file($fTempLoc, $fStore);

		return $fTempLoc;
	}

	public function fileAlreadyExists(){}

	public function saveFilePathTo(){}

	public function moveFile(){}

	public function fileTypeIsCorrect(){
		$array = array("png","jpg","gif","jpeg");


	}

	public function fileSizeIsCorrect(){		

	}

	public function fileWasSelected(){}







}


?>