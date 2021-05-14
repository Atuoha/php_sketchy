<?php
	require("init.php");

	if(isset($_POST['image_name'])){

		$image = $_POST['image_name'];

		$sql = mysqli_query($database->conn,"SELECT * FROM photos WHERE filename = '$image' ");

		while ($row = mysqli_fetch_array($sql)) {
			 $id = $row['id'];
			  
		}	

		 $_SESSION['filename_id'] = $id;	
	}


	if(isset($_POST['photo_id'])){
		  $photo_id  = $_POST['photo_id'];

		  $photo = Photo::find_by_id( $photo_id);
	?>
		
			<hr style="color: #f5f5f5" class="hide-on-large-only">
     		<p><img src="photo_uploads/<?php echo $photo->filename ?>" class="responsive-img" width="150"></p>
     		<p><i class="fa fa-check-square-o"></i><b> Photo Title:</b> <?php echo $photo->title ?></p>
	        <p><i class="fa fa-user"></i><b> Photo Arthur:</b> <?php echo $photo->author ?></p>
	        <p><i class="fa fa-calendar"></i><b> Date:</b> <?php echo date('d-M-y - h:i:a', strtotime($photo->date)) ?></p>
	        <p><i class="fa fa-book"></i><b> Description:</b> <?php echo substr($photo->description, 0,100) ?></p>	


	        <p><a  class="edit_upload green-text btn white-text "  href="edit_post.php?edit_ups=<?php echo $photo->id ?>">Edit</a> </p>

	<?php	  
	}

?>













			