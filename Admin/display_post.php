<?php
	include "head.php";
	unset($_SESSION['filename_id']);
	?>



<div  class="mainContainer" id="display_post_div" >
<div class="center-align">
<h2 class="center-align">
	<img src="image/ps.png" alt="Some-image" width="140px;">
</h2>
</div>	


<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title teal-text grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-file-powerpoint-o fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / All Photos</span></h5>
</div>


<?php
	if(isset($_SESSION['photo_message'])){
		 $photo_id = $_SESSION['photo_message'];

		 $photo_session = Photo::find_by_id($photo_id);

		 echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> $photo_session->title successfully edited!</b></i>";
		 unset($_SESSION['photo_message']);
	}elseif(isset($_SESSION['delete_photo_message'] )){
		 $del_photo = $_SESSION['delete_photo_message'];


		 echo "<i class='red-text'><b><i class='fa fa-check-circle'></i> $del_photo successfully deleted!</b></i>";
		 unset($_SESSION['delete_photo_message']);
	}


?>




<!-- FOR MULTI-ACTION -->





<?php
	if(isset($_POST['checkedbox'])){

		foreach (($_POST['checkedbox']) as $array_input ) {
			$sel_options = $_POST['sel_options'];
			if($sel_options){
				
				switch ($sel_options) {
						case 'Unapprove':
							$query_draft = "UPDATE photos SET status = 'Unapproved' WHERE id = '$array_input ' ";

							$exec_draft = mysqli_query($database->conn,$query_draft);

							if(!$exec_draft){
								die("ERROR WITH UPDATING POST TO DRAFT" . mysqli_error($database->conn));
							}
								header("location:display_post.php");
							break;


							case 'Approve':
							$query_publish = "UPDATE photos SET status = 'Approved' WHERE id = '$array_input ' ";

							$exec_publish = mysqli_query($database->conn,$query_publish);

							if(!$exec_publish){
								die("ERROR WITH UPDATING POST TO PUBLISHED" . mysqli_error($database->conn));
							}
								header("location:display_post.php");

							break;


							

							case 'Delete':



							$query_del = "DELETE FROM photos WHERE id = '$array_input ' ";

							$exec_del = mysqli_query($database->conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH DELETE" . mysqli_error($database->conn));
							}
								header("location:display_post.php");

							break;

							default:
							# code...
							break;

						}
					}		

				}
			}	
	?>








<!-- END OF MULTI ACTION -->






<form method="post" >
	<div class="input-field col s12 m4" id="sel_input_divs" >
    <select name="sel_options">
			<option disabled selected value="none">Select options</option>
    	
    		 <option  class=" circle" value="Approve">Approve</option>
    		 <option  class=" circle" value="Unapprove">Unapprove</option>
    		 <option  class=" circle" value="Delete">Delete</option>




    </select>
  </div>


<button type="submit"   name="activate_btn" class="del-cat-btn teal  waves-effect  waves-light hoverable"><i class="material-icons right ">assignment_turned_in</i>Apply</button>



<br>
<br>

<a href="add_post.php" class="del-cat-btn teal waves-effect waves-light hoverable white-text"  ><i class="material-icons right ">add_circle</i>Add New Product</a>

	<table class="bordered centered responsive-table highlight">
		<thead>
			<tr>
				<th><input type="checkbox"  name="select_all" id="select_all" />
			      <label for="select_all"></label></th>
				<th><i class="fa fa-sort-numeric-asc"></i> S/N</th>
				<th><i class="fa fa-photo"></i> Photo</th>
				<th><i class="fa fa-pencil-square-o"></i> Title</th>
				<th><i class="fa fa-tasks"></i> Category</th>
				<th><i class="fa fa-hashtag"></i> Description</th>
				<th><i class="fa fa-address-book-o"></i> Author</th>
				<th><i class="fa fa-check-square-o"></i> Status</th>
				<th><i class="fa fa-check-square-o"></i> Size</th>
				<th><i class="fa fa-check-square-o"></i> Type</th>
				<th><i class="fa fa-eye-slash"></i> Review</th>
				<th><i class="fa fa-eye-slash"></i> Seen</th>
				<th><i class="fa fa-envelope"></i> Comments</th>
				<th><i class="fa fa-eye"></i>  Date</th>
				

			</tr>

		</thead>

		
		<tbody>
			<br>
			<?php
				
				$photos = Photo::select();



				foreach ($photos as $photo){
				

			?>
			<tr>
					<td>			
			      	<input type="checkbox"  class="checkboxes" name="checkedbox[]" value="<?php echo $photo->id?>"  id="<?php echo $photo->id?>" />
			      	<label for="<?php echo $photo->id?>"></label>
			      	</form>
			      </td>	
				<td><?php echo $photo->id ?></td>
				<td><img src="photo_uploads/<?php echo $photo->filename ?>" class="img-responsive" width="130">
					<p>
						<a id="<?php echo $photo->id ?>" rel="<?php echo $photo->title . " by " . $photo->author ?>" class="edit_upload green-text modal-trigger  model-close" href="#edit_upload" href="">Edit</a> 
						| 
						<a id="<?php echo $photo->id ?>" rel="<?php echo $photo->title . " by " . $photo->author ?>" class="modal-trigger model-close delete_upload red-text" href="#del_upload">Delete</a>
						|
						<a class="teal-text" href="view_post.php?view_ups=<?php echo $photo->id?>">View</a>
						|
						<a class="teal-text" href="display_post.php?app=<?php echo $photo->id?>">Approve</a>
						|
						<a class="teal-text" href="display_post.php?unapp=<?php echo $photo->id?>">Unapprove</a>
					</p>
				</td>
				<td><?php echo $photo->title ?></td>

				<td><?php echo Category::pull_category($photo->category) ?></td>

				<td><?php echo substr($photo->description, 0,50) ?></td>
				<td><?php echo $photo->author ?></td>
				<td><?php echo $photo->status ?></td>
				<td><?php echo $photo->size ?></td>
				<td><?php echo $photo->type ?></td>
				<td><?php echo $photo->review ?></td>
				<td><?php echo $photo->seen ?></td>
				<td><a href="photo_comment.php?photo_comment=<?php echo $photo->id ?>"><?php echo Comment::return_comment_count($photo->id) ?></a></td>
				<td><?php echo $photo->date ?></td>

			</tr>

			<?php } ?>	

		</tbody>









</div>
</div>

	<!-- DELETING POST -->
	<?php
		if(isset($_GET['del_upload'])){
			$pro_idd = $_GET['del_upload'];

			$pull_content = Photo::find_by_id($pro_idd);
			unlink("photo_uploads/$pull_content->filename");

			$_SESSION['delete_photo_message'] = $pull_content->title;


			$photo->delete($pro_idd);



			header("location:display_post.php");

		}
	?>
<!-- END OF DELETING POST -->











	<!-- APPROVING COMMENT -->
	<?php
		if(isset($_GET['app'])){
			$idd = $_GET['app'];

			$pull_content = Comment::find_by_id($idd);
			


			$photo->single_update('status','Approved',$idd);

			header("location:display_post.php");

		}
	?>
<!-- END OF APPROVING  COMMENT -->





	<!-- UNAPPROVING COMMENT -->
	<?php
		if(isset($_GET['unapp'])){
			$idd = $_GET['unapp'];

			$pull_content = Comment::find_by_id($idd);
			


			$photo->single_update('status','Unapproved',$idd);

			header("location:display_post.php");

		}
	?>
<!-- END OF UNAPPROVING  COMMENT -->


























<!-- MODAL FOR DELETING PRODUCT-->

		  <!-- Modal Structure -->
    <div id="del_upload" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;"  class=" white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-minus"></i><b> Delete Product</b></h5>
      <hr class="white-text">
      <p class="white-text">Are you sure about deleting Product? <b>"<span class="para">  </span>"</b>
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
    <div id="edit_upload" class="modal  teal" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;" class="white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-pencil-square-o"></i><b> Edit Upload</b></h5>
      <hr class="white-text">
      <p class="white-text">Are you sure about editing Upload? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalEdit modal-close waves-effect waves-white btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL -->