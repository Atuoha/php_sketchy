<?php

	class Session{

		private $sign_in = false;
		public $user_id;
		public $message;
		public $count;


		function __construct(){
			session_start();
			$this->vistor_count();
			$this->check_login(); 
			$this->check_message();
		}

		public function login($user){

			if($user){

				$this->user_id = $_SESSION['sketch_user_id'] = $user->id;
			}
		}

		public function vistor_count(){
			if(isset($_SESSION['count'])){
				return $this->count = $_SESSION['count']++;
			}else{
				return $this->count = $_SESSION['count'] = 1;
			}
		}

		public function logout(){

			unset($this->user_id);
			unset($_SESSION['sketch_user_id']);
			$this->sign_in = false;
		}


		public function is_signed_in(){

			return $this->sign_in;
		}

		public function check_login(){

			if(isset($_SESSION['sketch_user_id'])){

				$this->user_id = $_SESSION['sketch_user_id'];
				$this->sign_in = true;
			}else{
				unset($this->user_id);
				$this->sign_in = false;
			}
		}

		public function message($msg=""){


			if(!empty($msg)){
				$_SESSION['message'] = $msg;
			}else{
				return $this->message;
			}
		}



		public function check_message(){

			if(isset($_SESSION['message'])){
				$this->message = $_SESSION['message'];
				unset($_SESSION['message']);

			}else{

				$this->message = "";
			}	
		}


		public function find_user_session($user_session){
			global $database;

			return $sql = mysqli_query($database->conn,"SELECT * FROM users WHERE id = '$user_session' ");	
		}	


		
	}
		$session = new Session();
?>