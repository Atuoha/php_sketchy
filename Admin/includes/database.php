<?php
	require_once('conn.php');

	class Database{

		public $conn;

		function __construct(){
			$this->open_database();
		}	

		public  function open_database(){

		 $this->conn =  mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_TABLE);

		}

		public function query($sql){

			$result = mysqli_query($this->conn,$sql);

			if(!$result){
				die("Error with query " . mysqli_error($this->conn));
			}

			return $result;

		}

		public function escape($string){

			$escape = mysqli_real_escape_string($this->conn,$string);

			return $escape;
		}

		public function last_id(){

			return $last_id = mysqli_insert_id($this->conn);
		}

		public function count($sql){

			return mysqli_num_rows($sql);
		}


	}

	$database = new Database();
	

?>