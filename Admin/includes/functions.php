<?php

	function autoloads($class){

		$class = strtolower($class);

		$path = "includes/{$class}.php";

		if(is_file($path) && ! class_exists($class)){
			require_once($path);
		} else{
			die("File named: '{$class}.php' does not exist!");
		} 
	}

	spl_autoload_register('autoloads');


	 function redirect($location){

		header("location: $location");
	}


?>



