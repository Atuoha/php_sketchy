
<?php
	include "head.php";
	include "photo_library.php"
?>



<div  class="mainContainer">

<h2 class="center-align">
	<img src="image/ps.png" alt="Some-image" width="140px;">
</h2>

<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-file-powerpoint-o fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / View Single Upload</span></h5>
</div>


<?php
	
	if(isset($_SESSION['filename_id'])){
		$ed_id = $_SESSION['filename_id'];

		$pull_contents = Photo::find_by_id($ed_id);

	}else{
		redirect('display_post.php');
	}


?>












<div class="row">
	<div class="col l6 s12">

		<div>
			<h6><b>Upload Title</b> <i class="material-icons right">format_size</i></h6>
			<p><?php if(isset($pull_contents->title)) echo $pull_contents->title; ?></p>
		</div>	

<!-- 	<div>
		<h6><b>Category</b><i class="material-icons right">card_membership</i></h6>
		<h5>Categories</h5>
	</div>
 -->
 		<br>
		<div>
			<h6><b>Upload Author</b><i class="material-icons right">account_circle</i></h6>
			<p><?php if(isset($pull_contents->author)) echo $pull_contents->author; ?></p>
		</div>	
	
		<br>
		<div>
			<h6><b>Upload Description</b><i class="material-icons right">library_books</i></h6>
			<hp><?php if(isset($pull_contents->description)) echo$pull_contents->description; ?></p>
		</div>

	</div>



	<div class="col l6 s12" style="border-left: 1px dotted grey">


		<div>
			<h6><b>Upload Image</b><i class="material-icons right">add_a_photo</i></h6>
			<p><a class="modal-trigger modal-close" href="#gallary"><img src="photo_uploads/<?php echo $pull_contents->filename ?>" class="responsive-img" width="500"></a></p>
		</div>

		<a id="<?php echo $pull_contents->id ?>" rel="<?php echo $pull_contents->title . " by " . $pull_contents->author ?>" class="edit_upload green-text modal-trigger btn white-text model-close" href="#edit_upload" href="">Edit</a> 


		
	</div>




</div>
	



	
</div>	
</div>	


















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