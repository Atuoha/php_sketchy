<?php require_once("includes/init.php"); ?>


<?php

	if($session->is_signed_in()){

		redirect("index.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sketch</title>   
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="../font/roboto">
  <link rel="stylesheet" href="../fontawesome/css/all.css">
  <link rel="stylesheet" href="../iconfont/material-icons.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/mdb.min.css">
  <link rel="stylesheet" href="../scss/_custom-styles.scss">
  <link rel="stylesheet" href="../scss/mdb-free.scss">
  <link rel="stylesheet" href="css/admin.css">
  <script src="javascript/main.js"></script>

  <link rel="icon" href="img/pattern.png" />
 
</head>



<body id="sign_in">
<div class="container">
		

<section class="form-simple text-center"  id="reg">

  <!--Form with header-->
  <div class="card text-center">

    <!--Header-->
    <div class="header pt-3 grey lighten-2">

      <div class="row d-flex justify-content-start">
        <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5 text-center"><i class="fa fa-user mr-5"></i>Log in</h3>
      </div>

    </div>
    <!--Header-->

    <div class="card-body mx-4 mt-4">
    	<form method="post" class="needs-validation" novalidate>

    		<?php


			if(isset($_POST['login_btn'])){

				$email = trim($_POST['email']);
				$password = trim($_POST['password']);

        // $sql = mysqli_query($database->conn,"SELECT pass FROM users WHERE email = '$email' ");

        // while ($row = mysqli_fetch_array($sql)) {
        //    echo $hashed = $row['pass'] . "<br>";
        // }


				if(!empty($email && $password)){

        // echo $decrypted_pass = password_hash($password, PASSWORD_BCRYPT,array('cost' , 12));  

				$user_found = User::verify_user($email,$password);

				if($user_found){

					$session->login($user_found);
					redirect("/Sketches/Admin/index.php");

				}elseif(!$user_found){
					echo "<i class='red-text'><b><i class='fa fa-window-close'> Username and Password mismatch!</b></i></i>";
				}else{
					$email = "";
					$password = "";
				}

				}else{
					echo "<i class='red-text'><b><i class='fa fa-window-close'> Opps! Fill in details!</b></i></i>";

				}
			}
				

				


		?>

      <!--Body-->




      <div class="md-form">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend33"><i class="fa fa-envelope"></i></span>
        </div>
        <input type="text" class="form-control is-invalid" name="email" value="<?php if(isset($email)) echo $email; ?>"  id="validationServerUsername33" placeholder=" Email"
          aria-describedby="inputGroupPrepend33" required>
        <div class="invalid-feedback">
          Enter email address
        </div>
      </div>

      </div>

      <div class="md-form pb-3">
      	<div class="input-group">
      	<div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend33"><i class="fa fa-key"></i></span>
        </div>
        <input type="password" name="password" placeholder=" Your password" id="Form-pass4" class="form-control">
        
       
      </div>
  	</div>
  	 <p class="font-small grey-text d-flex justify-content-end">Forgot <a href="#"
            class="dark-grey-text font-weight-bold ml-1"> Password?</a></p>

      <div class="text-center mb-4">
        <button type="submit" name="login_btn" class="btn btn-danger  btn-block z-depth-2">Log in</button>
    </div>
      </div>
      <p class="font-small grey-text d-flex justify-content-center">Don't have an account? <a id="signup" 
          class="dark-grey-text font-weight-bold ml-1"> Sign up</a></p>
      </form>

    </div>

  </div>
  <!--/Form with header-->

</section>







</div>
</body>