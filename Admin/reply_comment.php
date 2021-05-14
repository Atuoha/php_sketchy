<?php
	include "head.php";

?>

<?php ob_start();?>

<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/mg.png" alt="Some-image" width="150px;">
</h2>
</div>	



<div id="post-div" >
  <div style="padding: 10px;">
<div class="panel-heading">
  <h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-envelope-o fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / Reply Single Comments</span></h5>
</div>

	<!-- <h5 class="center-align"><b>COMMENT WITH REPLY</b></h5> -->

<?php
// CHECKING POST COUNT
			$rpst_id = $_GET['replypst'];
			$check_query = mysqli_query($database->conn,"SELECT * FROM comment WHERE photo_id ='$rpst_id' ");

			$check_comment_count = mysqli_num_rows($check_query);


			// END OF CHECKING POST COUNT
?>
<h6 ><b><i class="material-icons">question_answer</i>COMMENT COUNT: <?php echo $check_comment_count; ?></b></h6>

<a href="photo_comment.php?photo_comment=<?php echo  $rpst_id ?>" id="pst-btn" name="pst-btn" class="teal waves-effect white-text waves-light hoverable"><i class="material-icons right ">question_answer</i>View Related Comment(s)</a>






                     <!-- MAIN DIVISION -->

                    <div id="comment-div" class="grey lighten-4" >




	
		<!-- PULLING COMMENTS -->
		<?php
			if(isset($_GET['replypst'])){

			$rpst_id = $_GET['replypst'];

			$comment_id = $_GET['comment'];

			 
        	
        	$comments = Comment::find_single_comment($comment_id);

        	foreach ($comments as $comment) { 
        	?>


				 <!-- Previewing comments -->
               		<div class="chat-message grey lighten-3">
              <img class="circle" src="image/avatar.png"alt="img" width="50">
              <a id="<?php echo $comment->id ?>" alt="<?php echo $comment->photo_id ?>" rel="<?php echo $comment->comment . ' by ' . $comment->fullname ?>" href="#del_comment" class="modal-trigger modal-close red-text reply_del_comment">
              <i class='fa fa-times-circle-o red-text'></a></i> 
              <b><?php echo $comment->fullname . '</b> <i> (' . $comment->email   . ') ' ?>: </i><span class="blue-text"> <?php echo $comment->comment ?>  </span><br>  on <?php echo  date('M d ,Y | h:i:a', strtotime($comment->date)) ?>   
            </div><br>

               <!-- End of previewing comments -->


        	<?php
        	}
        }else{
        	redirect("comment.php");
        }


	


		


			// VIEWING REPLIES QUREY

			
				$view_reply_query = mysqli_query($database->conn,"SELECT * FROM reply_comment WHERE photo_id = '$rpst_id' AND comment_id = $comment_id ");


			if(!$view_reply_query){
				die("QUERY PROBLEM WITH PULLING REPLIES " . mysqli_error($database->conn));
			}

			while ($row = mysqli_fetch_assoc($view_reply_query)) {
				
				$reply_id = $row['id'];
				$name_reply = $row['reply_name'];
				$reply_mail = $row['reply_mail'];
				$reply_msg = $row['reply_msg'];
				$date = $row['date']

			?>
				<!-- Previewing replies -->

               	 <div class="chat-message right">
	              <img class="circle" src="image/hl.png"alt="img" width="50">

	             <a id="<?php echo $reply_id ?>" alt="<?php echo $comment->photo_id ?>" link="<?php echo $comment_id ?>" rel="<?php echo $reply_msg  . ' by ' . $name_reply ?>" href="#del_reply" class="modal-trigger modal-close red-text reply_admin_comment">
              	<i class='fa fa-times-circle-o red-text'></i></a> 

	             <b class="white-text"><?php echo $name_reply  . ' </b> <i class="white-text"> (' . $reply_mail   . ') ' ?>: </i><span class="white-text"> <?php echo $reply_msg ?>  </span><br>  on <?php echo  date('M d ,Y | h:i:a', strtotime($date)) ?> 
	            </div>    	  	 	

               <!-- End of previewing replies -->


            <?php
            }   
       

			?>

			 <!-- END OF VIEWING REPLIES QUERY  -->

		<!-- END OF PULLING COMMENTS -->

		

                        	



                        






                        <!-- SENDING COMMENT -->
                        <?php

                            if(isset($_POST['send-message'])){
                                $com_name =  $_POST['comment-name'];
                                $com_mail = $_POST['comment-mail'];
                                $com_msg = mysqli_real_escape_string($database->conn,$_POST['comment_msg']);
                               	$post_id = $rpst_id;
                               	$com_id = $comment_id;

                               if($com_name && $com_mail && $com_msg){

                               	$sql = mysqli_query($database->conn,"SELECT * FROM reply_comment WHERE comment_id  = $com_id AND reply_mail = '$com_mail'");

	              				$count_rows = mysqli_num_rows($sql);

 								if($count_rows > 0){
									echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! You've already replied this comment buddy...</b></i>";

 								}else{
 									Comment::create_comment_reply($com_id,$post_id,$com_name,$com_mail,$com_msg);
                              
                                    echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> $com_name | your reply has been sent succesfully!</b></i>"; 
 								}                                   

                               }else{
									echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Enter details...</b></i>";
                                
                               }
                            }


                        ?>

                        <!-- END OF SENDING COMMENT -->


                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <p class="p-top">Leave a Reply</p>
                        <form method="post" action="">
                            Admin Name<br>
                            <input type="text" name="comment-name" id="input" placeholder="Name">
                            Admin Email<br>
                            <input type="Email" name="comment-mail" id="input" placeholder="Email">
                            Your Reply<br>
                            <textarea type="text" name="comment_msg" id="inputs" placeholder="Comment" ></textarea>  
                            <button type="submit" id="abc" name="send-message" class="teal waves-effect white-text waves-light hoverable"><i class="material-icons right ">insert_comment</i>Comment</button> 
                        </form>

                    </div>  


                    <!-- end of comment -->


		<!-- END OF MAIN DIVISION -->


</div>
</div>












<!-- DELETING COMMENT -->
	<?php
		if(isset($_GET['del_com'])){
			$com_idd = $_GET['del_com'];

			$pull_content = Comment::find_by_id($com_idd);
			


			$comment->delete($com_idd);

			header("location:reply_comment.php?replypst=$rpst_id && comment=$comment_id");

		}
	?>
<!-- END OF DELETING COMMENT -->





<!-- DELETING REPLY -->
	<?php
		if(isset($_GET['del_reply_com'])){
			$reply_idd = $_GET['del_reply_com'];
			$sql = mysqli_query($database->conn,"DELETE FROM reply_comment WHERE id = $reply_idd");	
			header("location:reply_comment.php?replypst=$rpst_id && comment=$comment_id");

		}
	?>
<!-- END OF DELETING REPLY -->









<!-- MODAL FOR DELETING COMMENT-->

		  <!-- Modal Structure -->
    <div id="del_comment" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;"  class=" white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-minus"></i><b> Delete Comment</b></h5>
      <hr class="white-text">
      <p class="white-text">Are you sure about deleting Comment? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalDel modal-close waves-effect waves-green btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL  -->




	<!-- MODAL FOR REPLYING COMMENT-->

		  <!-- Modal Structure -->
    <div id="del_reply" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;"  class=" white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-minus"></i><b> Delete Reply</b></h5>
      <hr class="white-text">
      <p class="white-text">Are you sure about deleting Reply? <b>"<span class="para_rep">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalRep modal-close waves-effect waves-green btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL  -->