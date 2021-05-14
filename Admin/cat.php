<?php
	include "head.php";?>



<?php ob_start();?>



<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/cat.png" alt="Some-image" width="150px;">
</h2>
</div>


<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-calendar-plus-o fa-fw"></i><b>Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / Category</span></h5>
</div>
<div>
	<div class="row">

		<div class="col l6 s12">
				<form method="post" enctype="multipart/form-data">
					<?php
				if(isset($_POST['cat-btn'])){
					$cat_input =$_POST['cat_input'];
					$cat_imagery = $_FILES['cat_img_upload']['name'];
					$cat_temp = $_FILES['cat_img_upload']['tmp_name'];
					
					$cat = new Category();
					if(!empty($cat_input) && !empty($cat_temp)){

						$count  = $cat->count_column('cat_title',$cat_input);

						if($count == 0){

						
						$cat->cat_title = $cat_input;
						$cat->cat_img = $cat_imagery;

						$cat->create();
						move_uploaded_file($cat_temp, "cat_imgs_upload/$cat_imagery");					

						echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><i><b>Bravos! </b>Category added successfully</i></p>";

						}else{
							echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! There is category with the same title, change title!...</b></i>";

						}

					}else{
						echo "<p class='red-text'><i class='material-icons right'>report_problem</i><i><b>OOPS! </b>Complete field data!</i></p>";
					}
				}
			?>

					<div class="input-field">
						<input type="text" id="cat-input" value="<?php if(isset($cat_input)) echo $cat_input ?>" name="cat_input" placeholder="Enter Category"/>
						<label for="cat-input"><i class="material-icons">storage</i></label>

						<input id="cat-input" type="file" name="cat_img_upload"><br>

					<button type="submit" id="cat-btn" name="cat-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">queue</i>Add Category</button>
		
					</div>
				</form>	


				<?php 

					if(isset($_GET['edit_cat'])){
							$cat_edit_id = $_GET['edit_cat'];
							$cat_edit_tits = $_GET['cat_tit'];

							$cat_edit_details = Category::find_by_id($cat_edit_id);


					?>
					<br>
					<form method="post" enctype="multipart/form-data">
						<p>EDIT <b><?php echo $cat_edit_tits ?></b></p>

						<?php
							if(isset($_POST['cat_edit_btn'])){
								$edit_input =$_POST['cat_edit_input'];
								$edit_imagery = $_FILES['cat_edit_img']['name'];
								$edit_temp_imagery = $_FILES['cat_edit_img']['tmp_name'];


								
								$cat  = new Category();
								if(!empty($edit_imagery) && !empty($edit_input)){

									unlink("cat_imgs_upload/$cat_edit_details->cat_img");
									move_uploaded_file($edit_temp_imagery, "cat_imgs_upload/$edit_imagery");

									$cat->id = $cat_edit_id;
									$cat->cat_title = $edit_input;
									$cat->cat_img = $edit_imagery;

									$cat->update();

									redirect("cat.php");
									
								}elseif(empty($edit_imagery) && empty($edit_input)){

										echo "<p class='green-text'><i><b>Huh! </b>You didn't make any change!</i></p>";

								}elseif(empty($edit_imagery) && !empty($edit_input)){

									$cat->id = $cat_edit_id;
									$cat->cat_title = $edit_input;
									$cat->cat_img = $cat_edit_details->cat_img;
									$cat->update();

									echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><i><b>Bravos! </b>Changes have successfully been saved!</i></p>";

								}elseif(!empty($edit_imagery) && empty($edit_input)){

									unlink("cat_imgs_upload/$cat_edit_details->cat_img");
									move_uploaded_file($edit_temp_imagery, "cat_imgs_upload/$edit_imagery");

									$cat->id = $cat_edit_id;
									$cat->cat_title = $edit_input;
									$cat->cat_img = $edit_imagery;

									$cat->update();

									redirect("cat.php");
								}


							}



						?>




						<div class="input-field">
						<input type="text" id="cat-input" name="cat_edit_input" value="<?php echo $cat_edit_tits ?>" />
						<label for="cat-input"><i class="material-icons">storage</i></label>
						<p><img src="cat_imgs_upload/<?php echo $cat_edit_details->cat_img ?>" width="100px" /></p>

						<input id="cat-input" type="file"  name="cat_edit_img">
						<br>

					<button type="submit" id="cat-btn" name="cat_edit_btn" class="green waves-effect white-text waves-light hoverable"><i class="material-icons right ">assignment_turned_in</i>Edit Category</button>
		
					</div>

					</form>	
				<?php	
					}
				

				?>

		</div>
		

		<div class="col l6 s12" id="display_cats">
			<span id="cat-specs" class="hoverable"><b><i class="material-icons right">storage</i>Categories</b></span>
			
			<table class="bordered centered highlight">
				<thead>
				
					<tr>
					<th><i class="material-icons  hide-on-med-and-down">filter_1 </i><b> ID</b></th>
					<th><i class="material-icons  hide-on-med-and-down">description </i><b> CATEGORY TITLE</b></th>
					<th><i class="material-icons  hide-on-med-and-down">content_cut </i><b> REMOVE</b></th>
					<th><i class="material-icons  hide-on-med-and-down">format_color_text </i><b> UPDATE</b></th>
					</tr>
				</thead>

						<?php
				
							$cats = Category::select();

							foreach ($cats as $cat){
				
							
						?>

				<tbody>
					<tr>
						<td><?php echo $cat->id?></td>
						<td><?php echo $cat->cat_title ?></td>
						<td><a href="#modal2" id="<?php echo $cat->id ?>" rel="<?php echo $cat->cat_title ?>" class="modal-trigger del-cat-btn red waves-effect waves-light hoverable white-text"  ><i class="material-icons right ">clear</i><b class="hide-on-med-and-down">Remove</b></a></td>

						<td><a  class=" edit-cat-btn green waves-effect waves-light hoverable" href="cat.php?edit_cat=<?php echo $cat->id ?> && cat_tit=<?php echo $cat->cat_title ?>" class="white-text"><i class="material-icons right ">playlist_add_check</i><b class="hide-on-med-and-down">Update</b></a></td>
					</tr>

					<?php

					}

					$count_cat_rows = Category::count_table();
					if($count_cat_rows == 0){
						echo "<p class='red-text'><b>CATEGORY SEEMS TO BE EMPTY!</b></p>";
					}

					?>


			
			</tbody>	
			</table>'	
		</div>	


	</div>	

</div>	
</div>	







	<!-- DELETING CATEGORY -->

		<?php

			if(isset($_GET['delCat'])){
				$del_id = $_GET['delCat'];

				$pull_content = Category::find_by_id($del_id);
				unlink("cat_imgs_upload/$pull_content->cat_img");


				$cat->delete($del_id);
				header("location:cat.php");
			}

		?>


	<!-- END OF DELETING CATEGORY -->





<!-- MODAL -->

		  <!-- Modal Structure -->
    <div id="modal2" class="modal  red lighten-1" >
    <div class="modal-content white-text">
      <a style="float: right;" class="modal-close waves-effect waves-red btn-flat"><i class="material-icons">close</i></a>

      <h5><b>Delete category</b></h5>
      <hr class="white-text">
      <p>Are you sure about deleting category? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalCat modal-close waves-effect waves-green btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL -->