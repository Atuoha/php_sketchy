<?php
	include "head.php";?>

<div  class="mainContainer">
<div class="center-align">
<h2 class="center-align">
	<img src="image/adU.png" alt="Some-image" width="170px;">
</h2>
</div>	


<div style="padding: 10px;">
<div class="panel-heading">
<h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-user-plus fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / Add User</span></h5>
</div>

<form method="post" enctype="multipart/form-data">

		<?php

			if(isset($_POST['user_btn'])){

				 $uname = $database->escape($_POST['uname']);
				 $fname = $database->escape($_POST['fname']);
				 $lname = $database->escape($_POST['lname']);
				 $mail = $database->escape($_POST['mail']);
				 $role = $database->escape($_POST['role']);
				 $pass = $database->escape($_POST['pass']);
				  $file = $_FILES['user_img']['name'];
				 $tmp_file = $_FILES['user_img']['tmp_name'];

				 $pass = password_hash($pass, PASSWORD_BCRYPT,array('cost' => 12));

				 $user = new User();


			if(!empty($uname &&  $fname &&  $lname  &&  $mail &&  $pass &&  $file &&  $role)){

				$checking_email = $user->find_user_mail($mail);

				$count_avail_rows = mysqli_num_rows($checking_email);

				if($count_avail_rows == 0 ){

					move_uploaded_file("$tmp_file", "user_imgs/$file");
				
				
					// $perform_query = $user->create_user($uname,$fname,$lname,$mail,$role,$pass,$file);

					$user->uname = $uname;
					$user->fname = $fname;
					$user->lname = $lname;
					$user->email = $mail;
					$user->role  = $role;
					$user->pass = $pass;
					$user->image = $file; 

					$user->create();

					$last_id = $database->last_id();

					echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> User successfully registered!</b></i>";

				}else{

					echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Email Already Exists...</b></i>";

				}

			}else{
				echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Enter details...</b></i>";
			}	 				 


			}

		?>

<div class="row">
	<div class="col l6 s12">
		<div class="input-field">
		<h6><b>Username</b> <i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($uname)) echo $uname ?>" name="uname" placeholder="Enter Username">
	</div>	

	<div class="input-field">
		<h6><b>Firstname</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($fname)) echo $fname ?>" name="fname" placeholder="Enter Firstname">
	</div>	

		<div class="input-field">
		<h6><b>Lastname</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($lname)) echo $lname ?>" name="lname" placeholder="Enter Lastname">
	</div>	

	<div class="input-field">
		<h6><b>Role</b><i class="material-icons right">card_membership</i></h6>


<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field" >
    <select name="role" class=" icons">
			<option disabled selected>Select Role</option>
    		<option>Admin</option>
    		<option>Subscriber</option>
    		<option>User</option>

    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->

	</div>


	<div class="input-field">
		<h6><b>Email</b><i class="material-icons right">mail</i></h6>
		<input type="email" class="validate" value="<?php if(isset($mail)) echo $mail ?>" id="cat-input" name="mail" placeholder="Enter Email">
	</div>	


	</div>



	<div class="col l6 s12">


		<div class="input-field">
		<h6><b>Password</b><i class="material-icons right">lock</i></h6>
		<input type="password" id="cat-input" value="" name="pass" placeholder="Enter Password">
	</div>	
	
	

		<div class="input-field">
			<i class="teal-text fa fa-user fa-5x"></i>
		<h6><b>User Image</b><i class="material-icons right">photo_library</i></h6>
		<input type="file" name="user_img"  id="cat-input">
	</div>	

	

	<div class="input-field">
		<!-- <button type="submit" id="pst-btn" name="draft_btn" class="yellow accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Draft Product</button> -->

		<button type="submit" id="pst-btn" name="user_btn" class="teal waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Add User</button>
	</div>




	</div>
	




</div>


</form>	



</div>	
</div>