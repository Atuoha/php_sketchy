<?php

	class Comment extends Db_object{

		protected static $db_table = "comment";
		protected static $db_table_field = array('photo_id','email','fullname','comment');

		public $id;
		public $photo_id;
		public $email;
		public $fullname;
		public $comment;
		public $date;
		public $status;
		public $comment_id;
		public $reply_name;
		public $reply_mail;
		public $reply_msg;




		public static function create_comment($photo_id,$email,$fullname,$comment){

			if(!empty($photo_id && $email && $fullname && $comment)){

				$comments = new Comment();

				$comments->photo_id = (int)$photo_id;
				$comments->email    = $email;
				$comments->fullname = $fullname;
				$comments->comment  = $comment;

				return $comments;
			}else{
				return false;
			}
		}


		public static function create_comment_reply($comment_id,$photo_id,$reply_name,$reply_mail,$reply_msg){
			global $database;

			 $sql = mysqli_query($database->conn,"INSERT INTO reply_comment(comment_id,photo_id,reply_name,reply_mail,reply_msg) VALUES('$comment_id','$photo_id','$reply_name','$reply_mail','$reply_msg')");
		}


		public static function find_comment($photo_id = 0){
			global $database;
			$sql = "SELECT * FROM comment WHERE photo_id = $photo_id AND status = 'Approved' ORDER BY photo_id DESC";
	
			return self::find_query($sql);
		}



		

		public static function find_single_comment($comment_id){
			global $database;

			$sql = "SELECT * FROM comment WHERE id = $comment_id ";

			return self::find_query($sql);
		}


		public static function find_single_comment_reply($comment_id){
			global $database;

			$sql = "SELECT * FROM reply_comment WHERE comment_id = $comment_id ";

			return self::find_query($sql);
		}


		public static function find_comment_product($photo_id){
			global $database;

			$sql = "SELECT * FROM photos WHERE id = $photo_id ORDER BY $photo_id DESC";

			return self::find_query($sql);
		}

		public static function return_comment_count($photo_id){
			global $database;

			$sql = mysqli_query($database->conn,"SELECT * FROM comment WHERE photo_id = $photo_id");

			return $count_rows = mysqli_num_rows($sql);
		}
	}

?>