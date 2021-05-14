
<?php
	include "head.php";?>



<div  class="mainContainer">

<h2 class="center-align">
	<img src="image/adP.png" alt="Some-image" width="150px;">
</h2>

<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-calendar-plus-o fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / Add Upload</span></h5>
</div>





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
					if(!empty($title  && $author  && $desc && $img)){

					
						$count  = $photo->count_column('title',$title);

						if($count == 0){

							move_uploaded_file($tmp_image, "photo_uploads/$img");
							
							$photo->title = $title;
							$photo->description = $desc;
							$photo->author = $author;
							$photo->category = $category;
							$photo->set_file($_FILES['upload_img']);

							$photo->create();
							echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> Photo uploaded successfully!</b></i>";

						}else{
							echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! There is an upload with the same title, change title!...</b></i>";

						}

						
							

					if($photo->save()){

						echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> Photo uploaded successfully!</b></i>";
					}else{
						echo $message = join("<br>", $photo->errors);
					}


					}else{
						
						echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Enter details...</b></i>";

					}

					




					


				}

		?>
	





<div class="row">
	<div class="col l6 s12">
		<div class="input-field">
		<h6><b>Upload Title</b> <i class="material-icons right">format_size</i></h6>
		<input type="text" id="cat-input" name="upload_title" value="<?php if(isset($upload_title)) echo $upload_title; ?>" placeholder="Enter photo title">
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
			<option disabled selected>Select Category</option>
  
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
		<input type="text" id="cat-input" name="upload_author" value="<?php if(isset($upload_author)) echo $upload_author; ?>" placeholder="Enter Author">
	</div>	
	
	<!-- <div class="input-field">
		<h6><b>Size</b><i class="material-icons right">aspect_ratio</i></h6>
		<input type="text" id="cat-input" name="upload_size" placeholder="Enter Size">
	</div>	 -->


	</div>



	<div class="col l6 s12">


		<div class="input-field">
			<i class="teal-text fa fa-photo fa-5x"></i>
		<h6><b>Upload Image</b><i class="material-icons right">add_a_photo</i></h6>
		<input type="file" name="upload_img"  id="cat-input">	
		</div>

		<div class="input-field">
		<h6><b>Upload Description</b><i class="material-icons right">library_books</i></h6>
		<textarea id="msg" type="text" name="upload_desc" value="<?php if(isset($upload_desc)) echo $upload_desc; ?>" placeholder="Enter Post content" ></textarea>
	</div>



	<div class="input-field">
		<button type="submit" id="pst-btn" name="upload_btn" class="teal waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Publish Upload</button>

<!-- 		<button type="submit" id="pst-btn" name="draft_btn" class="blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Draft Upload</button> -->

		
	</div>




	</div>
	




</div>


</form>	




<?php

	if(isset($_FILES['file'])){

		$add_photo = new Photo();

		$add_photo->title = $title;
		$add_photo->description = $desc;
		$add_photo->author = $author;
		$add_photo->category = $category;
		$add_photo->set_file($_FILES['file']);
		$add_photo->create();
		if($add_photo->save()){

		echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> Photo uploaded successfully!</b></i>";
		}else{
			echo $message = join("<br>", $add_photo->errors);
		}
	}

?>



<div class="col-lg-12">
	 <p><b>Upload Only Images</b></p>
	<form action="add_post.php" class="dropzone">
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>

</div>	

	
</div>	
</div>	




