<?php
	
	class Category extends Db_object{

		protected static $db_table = "category";
		protected static $db_table_field = array('cat_title','cat_img');

		public $id;
		public $cat_title;
		public $cat_img;
		public $date;



		public static function pull_product_cat($cat_id){
			global $database;

			$sql = mysqli_query($database->conn,"SELECT * FROM photos WHERE category = $cat_id");

			

		}

		public static function pull_cat_title($cat_id){
			global $database;

			$sql = mysqli_query($database->conn,"SELECT cat_title FROM category WHERE id = $cat_id");

			while ($row =  mysqli_fetch_assoc($sql)) {
				return $title = $row['cat_title'];
			}
		}

		

	}
	
?>