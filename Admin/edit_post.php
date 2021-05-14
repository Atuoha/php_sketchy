
<?php
	include "head.php";?>



<div  class="mainContainer">

<h2 class="center-align">
	<img src="image/adP.png" alt="Some-image" width="150px;">
</h2>

<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-pencil fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / Edit Upload</span></h5>
</div>


<?php
	
	if(isset($_GET['edit_ups'])){
		$ed_id = $_GET['edit_ups'];

		$pull_contents = Photo::find_by_id($ed_id);
	}else{
		redirect("display_post.php");
	}


?>




<form method="post" enctype="multipart/form-data">
		
		<?php

				if(isset($_POST['upload_btn'])){

					$title   = $_POST['upload_title'];
					$author  = $_POST['upload_author'];
					$desc 	 = $_POST['upload_desc'];
					$category = $_POST['upload_cat'];
					$img 	 = $_FILES['upload_img']['name'];
					$tmp_image = $_FILES['upload_img']['tmp_name'];


					$photo = new Photo();
					if(!empty($title  && $author  && $desc && $img && $category )){

					
						unlink("photo_uploads/$pull_contents->filename");
						move_uploaded_file($tmp_image, "photo_uploads/$img");
						
						
						$photo->id = $ed_id;
						$photo->title = $title;
						$photo->description = $desc;
						$photo->author = $author;
						$photo->category = $category;
						$photo->set_file($_FILES['upload_img']);
						$photo->filename = $img;
						$photo->update();

						$_SESSION['photo_message'] = $photo->id;

						redirect("display_post.php");


					}elseif (!empty($category) && empty($img)) {
						$photo->id = $ed_id;
						$photo->title = $title;
						$photo->description = $desc;
						$photo->author = $author;
						$photo->category = $category;
						$photo->filename = $pull_contents->filename;
						$photo->update();
						$_SESSION['photo_message'] = $photo->id;

						redirect("display_post.php");

					}elseif (empty($category) && !empty($img)) {
						unlink("photo_uploads/$pull_contents->filename");
						move_uploaded_file($tmp_image, "photo_uploads/$img");
						
						
						$photo->id = $ed_id;
						$photo->title = $title;
						$photo->description = $desc;
						$photo->author = $author;
						$photo->category = $pull_contents->category;
						$photo->set_file($_FILES['upload_img']);
						$photo->filename = $img;
						$photo->update();
						$_SESSION['photo_message'] = $photo->id;

						redirect("display_post.php");
	
					}elseif(empty($category && $img)){
						$photo->id = $ed_id;
						$photo->title = $title;
						$photo->description = $desc;
						$photo->author = $author;
						$photo->category = $pull_contents->category;
						$photo->filename = $pull_contents->filename;
						$photo->update();
						$_SESSION['photo_message'] = $photo->id;
						
						redirect("display_post.php");

					}elseif(empty($title  && $author  && $desc && $img && $category )){
						
						echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Enter details...</b></i>";

					}

					




					


				}

		?>
	





<div class="row">
	<div class="col l6 s12">
		<div class="input-field">
		<h6><b>Upload Title</b> <i class="material-icons right">format_size</i></h6>
		<input type="text" id="cat-input" name="upload_title" value="<?php if(isset($pull_contents->title)) echo $pull_contents->title; ?>" placeholder="Enter photo title">
	</div>	

	<!-- <div class="input-field">
		<h6><b>Type</b><i class="material-icons right">spa</i></h6>
		<input type="text" id="cat-input" name="upload_type" placeholder="Enter photo type">
	</div>	 -->


	<div class="input-field">
		<h6><b>Category</b><i class="material-icons right">card_membership</i></h6>


<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field" >
    <select name="upload_cat" class=" icons">
			<option disabled selected><?php echo Category::pull_category($pull_contents->category)?></option>
  
    		<?php
    			$cats = Category::select();

    			foreach ($cats as $cat) {
    			?>	
    				<option value="<?php echo $cat->id ?>"><?php echo $cat->cat_title ?></option>
    			<?php
    			}

    		?>


    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->

	</div>


	<div class="input-field">
		<h6><b>Upload Author</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" name="upload_author" value="<?php if(isset($pull_contents->author)) echo $pull_contents->author; ?>" placeholder="Enter Author">
	</div>	
	
	<div>
		

  <ul class="collapsible">
  
    <li>
      <div class="collapsible-header"><i class="material-icons">info_outline</i><b> Upload Extra Details</b></div>
      <div class="collapsible-body">
      	<p><b>File Name:</b> <?php echo $pull_contents->filename ?></p>
      	<p><b>File Size:</b> <?php echo $pull_contents->size ?></p>
      	<p><b>File Type:</b> <?php echo $pull_contents->type ?></p>
      	<p><b>Upload Date:</b> <?php echo date('d-M-y | h:i:a', strtotime($pull_contents->date)) ?></p>

      </div>
    </li>


  </ul>
	</div>	


	</div>



	<div class="col l6 s12" style="border-left: 1px dotted grey">


		<div class="input-field">
			<p><img src="photo_uploads/<?php echo $pull_contents->filename ?>" width="200"></p>
			
		<h6><b>Upload Image</b><i class="material-icons right">add_a_photo</i></h6>
		<input type="file" name="upload_img" value="<?php echo $pull_contents->filename ?>"  id="cat-input">	
		</div>

		<div class="input-field">
		<h6><b>Upload Description</b><i class="material-icons right">library_books</i></h6>
		<textarea id="msg" type="text" name="upload_desc"  placeholder="Enter Post content" ><?php if(isset($pull_contents->description)) echo $pull_contents->description; ?></textarea>
	</div>



	<div class="input-field">
		<button type="submit" id="pst-btn" name="upload_btn" class="teal waves-effect white-text waves-light hoverable"><i class="fa fa-pencil"></i> Edit Upload</button>

<!-- 		<button type="submit" id="pst-btn" name="draft_btn" class="blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Draft Upload</button> -->

		
	</div>




	</div>
	




</div>


</form>	

	
</div>	
</div>	




