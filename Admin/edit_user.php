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
<h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-pencil fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / Edit User</span></h5>
</div>



<?php
	
	if(isset($_GET['edit_user'])){
		$edit_id = $_GET['edit_user'];

		$users = User::find_by_id($edit_id);



	}else{
		redirect('users.php');
	}
	
?>



<form method="post" enctype="multipart/form-data">

		<?php

			if(isset($_POST['edit_btn'])){

				 $uname = $database->escape($_POST['uname']);
				 $fname = $database->escape($_POST['fname']);
				 $lname = $database->escape($_POST['lname']);
				 $mail = $database->escape($_POST['mail']);
				 $role = $database->escape($_POST['role']);
				 $pass = $database->escape($_POST['pass']);
				  $file = $_FILES['user_img']['name'];
				 $tmp_file = $_FILES['user_img']['tmp_name'];

				 $hashed_pass = password_hash($pass, PASSWORD_BCRYPT,array('cost' => 12));

				 $user = new User();

				 // existing data

				 	// $existing_role = $user->

				 // end 


			if(!empty($uname &&  $fname &&  $lname  &&  $mail &&  $pass ) && empty($file || $role)){
			
				// $user->update_user($uname,$fname,$lname,$mail,$users->role,$pass,$users->image,$edit_id);
					$user->id = $edit_id;
					$user->uname = $uname;
					$user->fname = $fname;
					$user->lname = $lname;
					$user->email = $mail;
					$user->role  = $users->role;
					$user->pass = $hashed_pass;
					$user->image = $users->image;
					$user->update();
			
					$last_id = $database->last_id();

					$_SESSION['user_message'] = $user->id;

					redirect('users.php');

			}elseif(empty($uname &&  $fname &&  $lname  &&  $mail &&  $pass )){
				echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Enter details...</b></i>";

			}elseif(!empty($uname &&  $fname &&  $lname  &&  $mail &&  $pass && $role )  && empty($file)){


				// $user->update_user($uname,$fname,$lname,$mail,$role,$pass,$users->image,$edit_id);
					$user->id = $edit_id;
					$user->uname = $uname;
					$user->fname = $fname;
					$user->lname = $lname;
					$user->email = $mail;
					$user->role  = $role;
					$user->pass = $hashed_pass;
					$user->image = $users->image;
					$user->update();
					
					$_SESSION['user_message'] = $user->id;


					redirect('users.php');


			}elseif(!empty($uname &&  $fname &&  $lname  &&  $mail &&  $pass && $file )  && empty($role)){

				unlink("user_imgs/$users->image");
				move_uploaded_file("$tmp_file", "user_imgs/$file");

				// $user->update_user($uname,$fname,$lname,$mail,$users->role,$pass,$file,$edit_id);

					$user->id = $edit_id;
					$user->uname = $uname;
					$user->fname = $fname;
					$user->lname = $lname;
					$user->email = $mail;
					$user->role  = $users->role;
					$user->pass = $hashed_pass;
					$user->image = $file;
					$user->update();
					

					$_SESSION['user_message'] = $user->id;



					redirect('users.php');


			}elseif(!empty($uname &&  $fname &&  $lname  &&  $mail &&  $pass && $file && $role )){
				unlink("user_imgs/$users->image");
				move_uploaded_file("$tmp_file", "user_imgs/$file");

				// $user->update_user($uname,$fname,$lname,$mail,$role,$pass,$file,$edit_id);
					$user->id = $edit_id;				
					$user->uname = $uname;
					$user->fname = $fname;
					$user->lname = $lname;
					$user->email = $mail;
					$user->role  = $role;
					$user->pass = $hashed_pass;
					$user->image = $file;
					$user->update();
					
					$_SESSION['user_message'] = $user->id;


					redirect('users.php');

			}				 


			}

		?>

<div class="row">
	<div class="col l6 s12">
		<div class="input-field">
		<h6><b>Username</b> <i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php echo $users->uname ?>" name="uname" placeholder="Enter Username">
	</div>	

	<div class="input-field">
		<h6><b>Firstname</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php echo $users->fname ?>" name="fname" placeholder="Enter Firstname">
	</div>	

		<div class="input-field">
		<h6><b>Lastname</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php echo $users->lname ?>" name="lname" placeholder="Enter Lastname">
	</div>	

	<div class="input-field">
		<h6><b>Role</b><i class="material-icons right">card_membership</i></h6>


<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field" >
    <select name="role" class=" icons">
			<option disabled selected><?php echo $users->role ?></option>
    		<option>Admin</option>
    		<option>Subscriber</option>
    		<option>User</option>

    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->

	</div>


	<div class="input-field">
		<h6><b>Email</b><i class="material-icons right">mail</i></h6>
		<input type="email" class="validate" value="<?php echo $users->email ?>" id="cat-input" name="mail" placeholder="Enter Email">
	</div>	


	</div>



	<div class="col l6 s12" style="border-left: 1px dotted grey">


		<div class="input-field">
		<h6><b>Password</b><i class="material-icons right">lock</i></h6>
		<input type="password" id="cat-input" value="<?php echo $users->pass ?>" name="pass" placeholder="Enter Password">
	</div>	
	
	

		<div class="input-field">
			<p><img src="user_imgs/<?php echo $users->image ?>" width="200"></p>
		<h6><b>User Image</b><i class="material-icons right">photo_library</i></h6>
		<input type="file" name="user_img"  id="cat-input">
	</div>	

	

	<div class="input-field">
		<!-- <button type="submit" id="pst-btn" name="draft_btn" class="yellow accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Draft Product</button> -->

		<button type="submit" id="pst-btn" name="edit_btn" class="teal waves-effect white-text waves-light hoverable"><i class="fa fa-pencil"></i>  Edit User</button>
	</div>




	</div>
	




</div>


</form>	



</div>	
</div>