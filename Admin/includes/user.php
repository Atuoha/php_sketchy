<?php
	
	class User extends Db_object {

			protected static $db_table = "users";
			protected static $db_table_field = array('uname','fname','lname','email','role','pass','image');	
			public $id;
			public $uname;
			public $fname;
			public $lname;
			public $email;
			public $role;
			public $pass;
			public $image;
			public $date;
			public $status;


		// function __construct(){
		// 	$this->select_users();
		// }			

		



		public static function verify_user($email,$password){
			global $database;

			$email = $database->escape($email);
			$password = $database->escape($password);


			$user_select = self::find_query("SELECT * FROM users WHERE email = '{$email}' AND pass = '{$password}' WHERE status = 'Approved' LIMIT 1 ");

			return !empty($user_select)? array_shift($user_select) : false;

		}



		public static function find_user_mail($mail){
			global $database;

			$sql = "SELECT * FROM users WHERE email = '$mail' ";

			return self::find_query($sql);
		}



		// public static function find_by_id($id){
		// 	global $database;

		// 	$sql = "SELECT * FROM users WHERE id = $id";

		// 	return self::find_query($sql);
		// }

		

	}

?>