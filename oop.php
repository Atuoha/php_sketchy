<?php


// CREATOMG A CLASS

 	// class Car{

 	// 	Function greeting(){
 			// echo "coding OOP";
 	// 	}

 	// }

 	// $bmw  =  new Car();

 	// $bmw->greeting();  // This is for instantiating the greeting method which echo what is inside it

		
 	// $obtain = get_class_methods('Car');  // CHECKING THE METHODS OF A CLASS

 	// foreach ($obtain as $key) {
 	// 	echo $key . "<br>"; 
 	// }


	
	// INSTANTIATING A CLASS AND CALLING THE METHOD WITH THE NEW CLASS THAT EXTENDS

	// class Vehicle{
	// 	var $wheel = 4;
	// 	var $mirror = 2;
	// 	var $seats = 3;

	// 	Function obtain(){
	// 		 echo "Hello OOP " . $this->mirror;
	// 	}
	// }

	// $cheverelot = new Vehicle;

	// echo $cheverelot->seats  . "<br>";

	// $cheverelot->obtain();



	// INHERITANCE

	// class Motor{

	// 	private $mat = 8;

	// 	Function callings(){

	// 		return "This motor has " . $this->mat . " mat";
	// 	}
	// }


	// $tacoma = new Motor();

	// // echo  $tacoma->callings();


	// class Bike extends Motor{

	// }

	// $lime = new Bike();

	// echo $lime->callings();



 	// Check if class exists

 	// $obtain = get_declared_classes();

 	// foreach ($obtain as $value) {
 	// 	echo $value . "<br>";
 	// }



// 	class Fpno {

// 		var $lecturers = 1000;
// 		static $hostel = 28;

// 		static Function schoolfees(){
// 			echo Fpno::$hostel;
// 		}
// 	}
	

// $emeka = new Fpno();
// echo $emeka->schoolfees();



// echo Fpno::$hostel;


// class Student{
// 	private $regno = "17E/0321/CS";

// 	Function get_values(){
// 		echo $this->regno;
// 	}

// 	Function set_values(){
// 		$this->regno = "No regno";
// 	}
// }

// $bursary = new Student();

// $bursary->set_values();

// $bursary->get_values();




// class Admin{

// 	static $username = "Administrator";

// 	static function login(){

// 		return self::$username;
// 	}
// }


// class Subscriber extends Admin{

// 		static function requesting(){
// 			 echo parent::login();
// 		}
// }

// // Subscriber::requesting();

// $allow = new Subscriber();

// $allow->requesting();



 //  Class User{

 //  		var $username = "John";
 //  		var $password = "12345";

 //  		function __construct(){

 //  			echo $this->username . "<br>"; 
 //  			echo $this->password;
 //  		}

 //  }

 // $login = new User();


// class Register{

// 	public $username = "Elliot";
// 	static $pass = "1";

// 	function __construct(){
// 		echo $this->username . "<br>";
// 		echo self::$pass ++ ;
// 	}

// }

// $login = new Register();

// echo "<br>";

// $forgot  = new Register();

// echo "<br>";

// $got  = new Register();




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sketch</title>   
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="font/roboto">
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="iconfont/material-icons.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="stylesheet" href="scss/_custom-styles.scss">
  <link rel="stylesheet" href="scss/mdb-free.scss">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="img/pattern.png" />
 
</head>




<div class="container mt-5">
<form method="post" enctype="multipart/form-data">
	<?php
	if(isset($_POST['submit_btn'])){
		 $file = $_FILES['file']['name'];
		$tmp_file = $_FILES['file']['tmp_name'];

		// echo "<pre>";
		// print_r($_FILES['file']); 
		// echo "</pre>";

		$result = move_uploaded_file("$tmp_file", "test_files/$file");

		echo $result?  "Uploaded" :  "Error with uploading...";
		
	}
	?>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>


</div>
	<div>
  		<button name="submit_btn" type="submit" class="btn red">Sumbit</button>
  	</div>
</div>
