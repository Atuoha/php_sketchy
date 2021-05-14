<?php
	include "head.php";

?>

<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/us.png" alt="Some-image" width="150px;">
</h2>
</div>	

<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-user fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / All Users</span></h5>
</div>

<?php
	if(isset($_SESSION['user_message'])){
		 $user_id = $_SESSION['user_message'];

		 $user_session = User::find_by_id($user_id);

		 echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> $user_session->uname successfully edited!</b></i>";
		 unset($_SESSION['user_message']);
	}elseif(isset($_SESSION['delete_user_message'] )){
		 $del_user = $_SESSION['delete_user_message'];


		 echo "<i class='red-text'><b><i class='fa fa-check-circle'></i> $del_user successfully deleted!</b></i>";
		 unset($_SESSION['delete_user_message']);
	}


?>
<br>
<a href="add_user.php" class="del-cat-btn teal waves-effect waves-light hoverable white-text"  ><i class="material-icons right ">add_circle</i>Add New User</a>

	<table class="bordered centered responsive-table highlight">
		<thead>
			<tr>
				<!-- <th><input type="checkbox"  name="select_all" id="select_all" />
			      <label for="select_all"></label></th> -->
				<th><i class="fa fa-sort-numeric-asc"></i> S/N</th>
				<th><i class="fa fa-image"></i> PASSPORT</th>
				<th><i class="fa fa-pencil-square-o"></i> Username</th>
				<th><i class="fa fa-tasks"></i> FIRSTNAME</th>
				<th><i class="fa fa-photo"></i> LASTNAME</th>
				<th><i class="fa fa-pie-chart"></i> EMAIL</th>		
				<th><i class="fa fa-money"></i> STATUS</th>
				<th><i class="fa fa-hashtag"></i> ROLE</th>
				<th><i class="fa fa-calendar"></i> DATE</th>
				

			</tr>

		</thead>
		<tbody>
				 
			<?php 

				$users = User::select(); 

				 $count = User::count_table();	

				 if($count == 0){
					echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! No User available...</b></i>";
				 }else{

				 	foreach ($users as $user) {
				 	?>

						 <tr>
						<td><?php echo $user->id ;?></td>
						<td><img src="user_imgs/<?php echo $user->image ;?>" width="100">
							<p>
								<a id="<?php echo $user->id ?>" rel="<?php echo $user->fname ." " .  $user->lname ?>" class="green-text modal-trigger modal-close edit_user" href="#user_edit">Edit</a>
								|
								<a  id="<?php echo $user->id ?>" rel="<?php echo $user->fname ." " .  $user->lname ?>" class="red-text modal-close modal-trigger del_user" href="#user_del">Delete</a>
								|
								<a href="view_user.php?view_user=<?php echo $user->id ?>" class="teal-text  view_user" href="#user_del">View</a>
								|
								<a href="users.php?app=<?php echo $user->id?>">Approve</a>
								|
								<a class="brown-text" href="users.php?unapp=<?php echo $user->id?>">Unapprove</a>
							</p>
						</td>
						<td><?php echo $user->uname ;?></td>
						<td><?php echo $user->fname ;?></td>
						<td><?php echo $user->lname ;?></td>
						<td><?php echo $user->email ;?></td>
						<td><?php echo $user->status ;?></td>
						<td><?php echo $user->role ;?></td>
						<td><?php echo $user->date ;?></td>
					
				 	<?php	
				 	}
				 }

			?>
		</tr>
			

		</tbody>








</div>
</div>

	

<!-- Deleting User code -->
	
	<?php

		if(isset($_GET['del_user'])){

			$del_user_id = $_GET['del_user'];

			$pulluser_det = User::find_by_id($del_user_id);
			unlink("user_imgs/$pulluser_det->image");

			$_SESSION['delete_user_message'] = $pulluser_det->uname;

			$user = User::delete($del_user_id);
			redirect("users.php");
		}

	?>	
	
<!-- End of Deleting user code -->







	<!-- APPROVING COMMENT -->
	<?php
		if(isset($_GET['app'])){
			$idd = $_GET['app'];

			$pull_content = User::find_by_id($idd);
			


			$user->single_update('status','Approved',$idd);

			header("location:users.php");

		}
	?>
<!-- END OF APPROVING  COMMENT -->





	<!-- UNAPPROVING COMMENT -->
	<?php
		if(isset($_GET['unapp'])){
			$idd = $_GET['unapp'];

			$pull_content = User::find_by_id($idd);
			


			$user->single_update('status','Unapproved',$idd);

			header("location:users.php");

		}
	?>
<!-- END OF UNAPPROVING  COMMENT -->



















<!-- MODAL FOR DELETING PRODUCT-->

		  <!-- Modal Structure -->
    <div id="user_del" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;"  class=" white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-minus"></i><b> Delete User</b></h5>
      <hr class="white-text">
      <p class="white-text">Are you sure about deleting User? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalDel modal-close waves-effect waves-green btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL  -->


<!-- MODAL FOR EDITING PRODUCT-->

		  <!-- Modal Structure -->
    <div id="user_edit" class="modal  teal " >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;" class="white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-pencil-square-o"></i><b> Edit User</b></h5>
      <hr class="white-text">
      <p class="white-text">Are you sure about editing User? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalEdit modal-close waves-effect waves-white btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL -->


