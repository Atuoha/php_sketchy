
<?php
	include "head.php";
	include "photo_library.php";
	?>



<div  class="mainContainer">

<h2 class="center-align">
		<img src="image/vT.png" class="hide-on-small-only" alt="Some-image" width="150px;">
</h2>

<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-user fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / View Single User</span></h5>
</div>


<?php
	
	if(isset($_GET['view_user'])){
		$ed_id = $_GET['view_user'];

		$pull_contents = User::find_by_id($ed_id);
	}elseif(empty($_GET['view_user'])){
		redirect("users.php");
	}


?>









<div class="row">
	<div class="col l6 s12">

		<div>
			<h6><b>Username</b> <i class="material-icons right">account_circle</i></h6>
			<p><?php if(isset($pull_contents->uname)) echo $pull_contents->uname; ?></p>
		</div>	

<!-- 	<div>
		<h6><b>Category</b><i class="material-icons right">card_membership</i></h6>
		<h5>Categories</h5>
	</div>
 -->
 		<br>
		<div>
			<h6><b>Firstname</b><i class="material-icons right">account_circle</i></h6>
			<p><?php if(isset($pull_contents->fname)) echo $pull_contents->fname; ?></p>
		</div>	
	
		<br>
		<div>
			<h6><b>Lastname</b><i class="material-icons right">account_circle</i></h6>
			<hp><?php if(isset($pull_contents->lname)) echo$pull_contents->lname; ?></p>
		</div>


		<br>
		<div>
			<h6><b>Role</b><i class="material-icons right">card_membership</i></h6>
			<hp><?php if(isset($pull_contents->role)) echo$pull_contents->role; ?></p>
		</div>

		

	</div>



	<div class="col l6 s12" style="border-left: 1px dotted grey">


		<div>
			<h6><b>Email</b><i class="material-icons right">mail</i></h6>
			<hp><?php if(isset($pull_contents->email)) echo$pull_contents->email; ?></p>
		</div>

		<br>
		<div>
			<h6><b>Profile Image</b><i class="material-icons right">add_a_photo</i></h6>
			<p><a class="modal-trigger modal-close" href="#gallary"><img src="user_imgs/<?php echo $pull_contents->image ?>" class="responsive-img" width="280"></a></p>
		</div>

		
	</div>




</div>
	



	
</div>	
</div>	




