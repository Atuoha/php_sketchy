<?php
	include "head.php";

?>

<div  class="mainContainer" id="profile_div">
<div class="center-align">

<h2 class="center-align">
	<img src="image/vT.png" class="hide-on-small-only" alt="Some-image" width="150px;">
</h2>
</div>	



<div class="container">
<div class="row">

	<div class="col l5  s12">
	
	<img src="/Sketches/Admin/image/admin.png" class="circle responsive-img materialboxed" data-caption="<?php echo $admin_username_db?>" width="250px" alt="some-image">
	</div>	

	<div class="col l7 grey lighten-3 z-depth-1 s12" style="padding: 10px; border-radius: 15px;">
		<table class="bordered centered highlight hoverable">

			<tr>
				<th class="teal-text"><i class="fa fa-address-book fa-1x"></i><b> Username</b></th>
				<td>Johnnny Walker</td>
			</tr> 


			<tr>
				<th class="teal-text"><i class="fa fa-address-book fa-1x"></i><b> Fullname</b></th>
				<td>John Enoch</td>
			</tr> 

			<tr>
				<th class="teal-text"><i class="fa fa-envelope fa-1x"></i><b> Email Address</b></th>
				<td><i>johnny@gmail.com</i></td>	
			</tr>

			

			<tr>
				<th class="teal-text"><i class="fa fa-briefcase fa-1x"></i><b> Role</b></th>
				<td>Chief Admin</td>	
			</tr>

			

			<tr>
				<th class="teal-text"><i class="fa fa-check-square-o fa-1x"></i><b> Status</b></th>
				<td><i class="fa fa-check-square-o"></i> Confirmed</td>	
			</tr>

			


			

	</table>	

	</div>

</div>	
<a class="btn btn-dark hoverable waves-effect waves-light teal btn-block btn-lg" href="edit_profile.php?edit_profile=<?php echo  $admin_id_db ?>"  id="create_btn"><i class="material-icons right">edit</i>Edit Profile</a>

</div>



</div>




</div>





