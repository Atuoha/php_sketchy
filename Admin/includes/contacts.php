<?php
	
	class Contact extends Db_object {

			protected static $db_table = "contact";
			protected static $db_table_field = array('fname','lname','subject','message');	
			public $id;
			public $fname;
			public $lname;
			public $subject;
			public $message;
			

	}


?>