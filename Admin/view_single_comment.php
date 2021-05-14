<?php
	include "head.php";

?>

<div  class="mainContainer" >
<div class="center-align">
<h2 class="center-align">
	<img src="image/ps.png" alt="Some-image" width="140px;">
</h2>
</div>	

<div id="post-div">
<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title teal-text grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-file-powerpoint-o fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / View comment Photo</span></h5>
</div>

	<!-- PREVIEWING COMMENT POSTS FROM DATABASE -->
		<?php
			if(isset($_GET['view_photo'])){
			 $vpst_id = $_GET['view_photo'];

			 $photo = Photo::find_by_id($vpst_id);

			 // CHECKING POST COUNT
			$check_count_query = "SELECT * FROM comment WHERE photo_id ='$vpst_id' ";

			$check_result = mysqli_query($database->conn,$check_count_query);

			if(!$check_result){
				die("CHECKING COUNT PULLING PROBLEM" . mysqli_error($conn));
			}

			$check_comment_count = mysqli_num_rows($check_result);


			// END OF CHECKING POST COUNT

			} 

		?>	



<h6><b><i class="material-icons">filter_1</i>POST ID: <?php echo $vpst_id ;?></b></h6>

	  	<h6 ><b><i class="material-icons">question_answer</i>COMMENT COUNT: <?php echo $check_comment_count; ?></b></h6>
<a href="photo_comment.php?photo_comment=<?php echo  $vpst_id ?>" id="pst-btn" name="pst-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">question_answer</i>View Comment(s)</a>

        <div class="row ">
            <div class="col l6 s12 m12 ">
                <span id="page-head"><b><?php echo  $photo->title;?></b></span>
                    <hr style="color: #f5f5f5">
                    <p><h5 class="light-blue-text text-accent-4"><?php echo  $photo->author;?></h5></p>

                    <span >Posted on: <?php echo date('d-M-Y || h:i:a', strtotime( $photo->date)) ?></span>
                   
                        

                    <p> <?php echo  $photo->description?>  </p> 
                    
                    </div> 

                     <div class="col l6 s12 m12 viePOST-div" >
                       <div class="view overlay zoom" >
								 <img  src="photo_uploads/<?php echo $photo->filename?>" width="545">
								 <a href="photo_uploads/<?php echo $photo->filename?>">
									<div class="mask flex-center waves-effect waves-light rgba-grey-light">
				                    <p class="white-text"><b><?php echo $photo->title?></b></p>
				                  </div>
								</a>
						</div>
                    </div>

                    <!-- comment -->

        
                     <br>

       </div>              

</div>
</div>
