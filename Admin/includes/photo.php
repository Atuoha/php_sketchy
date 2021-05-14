<?php

	class Photo extends Db_object{

		protected static $db_table = "photos";
		protected static $db_table_field = array('title','description','filename','author','size','type','category');
		public $id;
		public $title;
		public $description;
		public $category;
		public $filename;
		public $type;
		public $size;
		public $author;
		public $date;
		public $status;
		public $review;
		public $seen;
		public $cat_id;


		public $tmp_path;
		public $upload_directory = "photo_uploads";
		public $errors = array();
		public $upload_error_array = array(

			UPLOAD_ERR_OK			 => "There is no error",
			UPLOAD_ERR_INI_SIZE  	 => "The uploaded file exceeds upload_max_file_size",
			UPLOAD_ERR_FORM_SIZE	 => "The uploaded file exceeds MAX_FILE_SIZE direct",
			UPLOAD_ERR_PARTIAL		 => "The uploaded file was only partially uploaded",
			UPLOAD_ERR_NO_FILE		 => "No file to upload",
			UPLOAD_ERR_NO_TMP_DIR	 => "Missing a temporary folder",
			UPLOAD_ERR_CANT_WRITE	 => "Fail to write file to disk",
			UPLOAD_ERR_EXTENSION	 => "A PHP extension stopped the file upload"

		);



		// Passing $_FILES['uploaded_file'] as a parameter


		public function set_file($file){
			global $database;

			if(empty($file) || !$file || !array($file)){

				$this->errors[] = "There was no file to upload here";
				return false;
			}elseif ($file['error'] != 0) {
				$this->errors[] = $this->upload_error_array['error'];
				return false;
			}{
				$this->filename = mysqli_real_escape_string($database->conn,($file['name']));
				$this->type = ($file['type']);
				$this->size = ($file['size']);
				$this->tmp_path = ($file['tmp_name']);
			}

		}


		public function image_path(){

			return $this->upload_directory . DS . $this->filename;
		}



		public function save(){

			if($this->id){
				$this->update();
			}else{

				if(!empty($this->errors)){
					return false;
				}

				// if(empty($this->file) || empty($this->tmp_path)){
				// 	$this->errors[] = "<br>The file was not available";
				// 	return false;
				// }

				$target_path = SITE_ROOT . DS . 'Admin' . DS . $this->upload_directory . DS . $this->filename;
				
				if(file_exists($target_path)){
					$this->errors[] = "The file {$this->filename} already exists";
					return false;
				}


				if(move_uploaded_file($this->tmp_path, "photo_uploads/$this->filename")){


					if($this->create){
						unset($this->tmp_path);
						return true;
				}else{
					$this->errors[] = "The uploading path directory has no permission";
					return false; 
				}

				
			}
		}


	}


	public function find_by_title($title){
		global $database;

		$sql = "SELECT * FROM photos WHERE title = '$title' ";

		return $database->query($sql);
	}




	public static function find_by_image($filename){
		global $database;

		$sql = "SELECT * FROM photos WHERE filename = '$filename' ";

		return self::find_query($sql);
	}





	public static function pull_photo_by_string($string){
		global $database;

		$sql = "SELECT * FROM photos WHERE title LIKE '%$string%' ";

		return self::find_query($sql);

	}


	public static function pull_photo_by_imagename($imagename){
		global $database;

		$sql = "SELECT * FROM photos WHERE title = '$imagename' ";

		return self::find_query($sql);

	}



	public static function count_table_rows($string){
		global $database;

		$sql = mysqli_query($database->conn,"SELECT * FROM photos WHERE title LIKE '%$string%' ");

		return mysqli_num_rows($sql);
	}


}



?>