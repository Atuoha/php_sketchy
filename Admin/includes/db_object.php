<?php


	class Db_object{

		// protected static $db_table = "users";


		public  function select(){
			global $database;

			 return $query =  static::find_query("SELECT * FROM " .static::$db_table."  ORDER BY id DESC");

			 // !empty($query)? array_shift($query) : "No value";

			// return $query;

		}


			public  function select_limit($limit){
			global $database;

			 return $query =  static::find_query("SELECT * FROM " .static::$db_table."  ORDER BY id DESC LIMIT $limit");

			 // !empty($query)? array_shift($query) : "No value";

			// return $query;

		}


		


		public static function find_by_id($id){
			global $database;

			 $query = static::find_query("SELECT * FROM " .static::$db_table. " WHERE id = $id");

			 return !empty($query)? array_shift($query) : false;
		
			return $query;

		}




		public static function find_query($sql){
			global $database;

			
			$query = $database->query($sql);
			$object = array();

			 while($row = mysqli_fetch_assoc($query)){
				  $object[] = static::instant($row);
			}

			return $object;
			 
		}



		public   function instant($record){

			$calling_class = get_called_class();

			$object = new $calling_class;
			
			foreach ($record as $attribute => $value) {
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}


			return $object;

		}



		private  function has_attribute($attribute){

			$checking = get_object_vars($this);

			return array_key_exists($attribute ,$checking);
		}


		protected function properties(){

			// return get_object_vars($this);

			$properties = array();

			foreach (static::$db_table_field as $db_field) {
					
					if (property_exists($this, $db_field)) {
						
						$properties[$db_field] = $this->$db_field;
					}
					
			}

			return $properties;

		}



		public function clean_properties(){
			global $database;

				$clean_properties = array();

				foreach ($this->properties() as $key => $value) {
					
					$clean_properties[$key] = $database->escape($value);
				}

				return $clean_properties;
		}


		public function create(){

			$properties = $this->clean_properties();
			global $database;

			$sql = "INSERT INTO ".static::$db_table."(" . implode(",", array_keys($properties)).")";
			$sql .= "VALUES('" . implode("','", array_values($properties))   .  "')";


			return $database->query($sql);

			// $sql = "INSERT INTO ".static::$db_table ."(" . implode(",", array_keys($properties)) . ")";
			// $sql .= "VALUES('" . implode("','", array_values($properties)) . "')";
			
		}


		public function update(){
			global $database;

			$properties = $this->clean_properties();
			$property_pair = array();

			foreach ($properties as $key => $value) {
				$property_pair[] = "{$key}='{$value}'";
			}

			$sql = "UPDATE " .static::$db_table . " SET ";
			$sql .=  implode(", ", $property_pair);
			$sql .= " WHERE id= " . $database->escape($this->id);

			return $database->query($sql);
		}



		public static function delete($id){
				global $database;
			$sql = "DELETE FROM ".static::$db_table." WHERE id = $id";

			return $database->query($sql);
		}

		public static function single_update($column,$action,$id){
			global $database;
			$sql = "UPDATE ".static::$db_table. " SET $column = '$action' WHERE id = '$id' ";

			return $database->query($sql);
		}



		public static function count_table(){
			global $database;

			$sql = mysqli_query($database->conn,"SELECT * FROM ".static::$db_table." " );

			return $count = mysqli_num_rows($sql);


		}


		public  function count_column($column,$input){
		global $database;

		$sql = mysqli_query($database->conn,"SELECT * FROM ".static::$db_table." WHERE $column = '$input' " );

		return $count = mysqli_num_rows($sql);


		}




		public function save(){

			return isset($this->id)? $this->update(): $this->create();
		}


		public static function pull_category($id){
			global $database;
			$sql  = mysqli_query($database->conn,"SELECT cat_title FROM category WHERE id = $id");

			while ($row = mysqli_fetch_assoc($sql)) {
				return $row['cat_title'];
			}

			
		}






















	}


?>