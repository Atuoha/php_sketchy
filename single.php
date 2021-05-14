<?php
	require_once("includes/head.php");
	require_once("contact.php");
	require_once("signin.php");
	require_once("register.php");


?>




<!-- MAIN WORK -->
 <section class="view hm-gradient" id="single_div">
 	<div id="inner_body">
        <!-- <div class="full-bg-img d-flex align-items-center"> -->
          <div class="container" id="search_con" style="margin-top: 200px;">
                     <div class="col-md-10 col-lg-12 text-center text-md-left margins">
                <div class="white-text">
                  <div class="wow flipInY text-center" data-wow-delay="3.1s">
                    <h1 class="h1-responsive  font-bold mt-sm-5">/ SKETCH SINGLE</h1>
                    <h5 class="wow rollIn" data-wow-delay="4.5s">
                      ...developing the best contents without considering who is watching them
                     </h5> 
  
                  
                </div>
              </div>
            </div>
          </div>

  </section>


<?php
	
	if(isset($_GET['single_post'])){

		$single_post_id = $_GET['single_post'];

		$single_photo = Photo::find_by_id($single_post_id);

	}elseif(empty($_GET['single_post'])){
		redirect("index.php");
	}


?>





<div class="container "  data-wow-delay="3.5s" id="main_desc">

    <div class="row">
      	<div class="col-lg-7">
      		<div>
      			<h1 class="h1-responsive"><b><?php echo $single_photo->title?></b></h1>
      			<h5><b class="green-text">...by <?php echo $single_photo->author?></b></h5>
      			<p><i>on <?php echo date('l M d ,Y | h:i:a', strtotime($single_photo->date))?></i></p>
      		<div>

      			<div class="view overlay zoom" >
				 <img  src="/Sketches/Admin/photo_uploads/<?php echo $single_photo->filename?>" class="img-responsive" width="635">
				 <a href="/Sketches/Admin/photo_uploads/<?php echo $single_photo->filename?>">
					<div class="mask flex-center waves-effect waves-light rgba-grey-light">
                    <p class="white-text"><b><?php echo $single_photo->title?></b></p>
                  </div>
				</a>
				</div>


      			<p style="text-align: justify;" class="mt-5"><?php echo $single_photo->description?></p>
      		</div>

      		</div>	
      	</div>	

      	<div class="col-lg-5">
      		 <div id="comment-div" class="grey lighten-4 " >

                  <!-- COMMENT FORM -->
         	<p class="p-top">Leave a Comment</p><br>
              <form method="post">

              	<?php
              		if(isset($_POST['send_message'])){


	              		$fullname = $_POST['comment_name'];
	              		$email = $_POST['comment_mail'];
	              		$comment = $_POST['comment_msg'];

	              		if(!empty($fullname && $email && $comment)){

	              			$sql = mysqli_query($database->conn,"SELECT * FROM comment WHERE comment  = '$comment' AND email = '$email'");

	              			$count_rows = mysqli_num_rows($sql);

	              			if($count_rows > 0){
	              				echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Comment Already Exists with the same details...</b></i>";
	              			}else{
	              				$new_comment = Comment::create_comment($single_post_id,$email,$fullname,$comment);

		              		$new_comment->save();

		              		echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> | $fullname | Your comment has been sent!</b></i>"; 
	              			}

	              		}else{
						 	echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Enter details...</b></i>";

	              		}

	              			
              		}

              		



              	?>




              <br>	
              Display Name<br>
               <input type="text" value="<?php if(isset($fullname)) echo $fullname ?>" name="comment_name" id="input" placeholder="Name">
               <br> <br>
               Email<br>
               <input type="Email" value="<?php if(isset($email)) echo $email ?>" name="comment_mail" id="input" placeholder="Email">
               <br> <br>
               Your Comment<br>
               <textarea type="text" value="<?php if(isset($comment)) echo $comment ?>" name="comment_msg" id="inputss" placeholder="Comment" ></textarea>  <br>

               <button type="submit" id="abc" name="send_message" class="green waves-effect white-text waves-light hoverable"><i class="fa fa-envelope"></i> Comment</button> 

               </form>
               <br><br><br><br>

<div class="comments">
        <?php
        	
        	$comments = Comment::find_comment($single_post_id);

        	foreach ($comments as $comment) { 
        	?>


				 <!-- Previewing comments -->
               		<div class="chat-message grey lighten-3">
              <img class="circle" src="img/avatar.png"alt="img" width="50">
              <b><h6><?php echo $comment->fullname . '</b> <i>(' . $comment->email   . ') '  ?>: </h6></i><span class="green-text"> <?php echo $comment->comment ?>  </span><br>  on <?php echo  date('M d ,Y | h:i:a',strtotime($comment->date)) ?>   
            </div>

               <!-- End of previewing comments -->


        	<?php






	// VIEWING REPLIES QUREY

			
				$view_reply_query = mysqli_query($database->conn,"SELECT * FROM reply_comment WHERE photo_id = '$single_post_id' AND comment_id = $comment->id ");


			if(!$view_reply_query){
				die("QUERY PROBLEM WITH PULLING REPLIES " . mysqli_error($database->conn));
			}

			while ($row = mysqli_fetch_assoc($view_reply_query)) {
				
				$name_reply = $row['reply_name'];
				$reply_mail = $row['reply_mail'];
				$reply_msg = $row['reply_msg'];
				$date = $row['date']

			?>
				<!-- Previewing replies -->

               	 <div class="chat-message right">
	              <img class="circle" src="img/hl.png"alt="img" width="50">
	             <b class="white-text"><h6><?php echo $name_reply  . ' <i>(' . $reply_mail   . ') ' ?>: </h6></i><span class="white-text"> <?php echo $reply_msg ?>  </b></span><br>  on <?php echo  date('M d ,Y | h:i:a', strtotime($date)) ?> 
	            </div>    	  	 	

               <!-- End of previewing replies -->


            <?php
            }   

        }
       

			?>

			 <!-- END OF VIEWING REPLIES QUERY  -->		






		</div>	

      	</div>	


	</div>


</div>
</div>
</div>











































































<div>
<?php include "includes/foot.php" ?>
</div>

     <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->

    <script>new WOW().init();</script>
</body>
</html>
