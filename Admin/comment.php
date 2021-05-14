<?php
	include "head.php";?>

<?php ob_start();?>


<div  class="mainContainer" id="display_post_div" >
<div class="center-align">
<h2 class="center-align">
	<img src="image/mg.png" alt="Some-image" width="140px;">
</h2>
</div>	


<div style="padding: 10px;">
<div class="panel-heading">
  <h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-envelope-o fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / All Posts Comments</span></h5>
</div>

<?php
	
	if(isset($_SESSION['delete_comment_message'] )){
		 $del_comment = $_SESSION['delete_comment_message'];


		 echo "<i class='red-text'><b><i class='fa fa-check-circle'></i> $del_comment successfully deleted!</b></i>";
		 unset($_SESSION['delete_comment_message']);
	}



?>


<table class="bordered responsive-table centered highlight">
		<thead>
			<tr>
				<th><input type="checkbox"  name="select_all" id="select_all" />
			      <label for="select_all"></label></th>
				<th><i class="fa fa-sort-numeric-asc"></i> S/N</th>
				<th><i class="fa fa-user"></i> User</th>
				<th><i class="fa fa-envelope"></i> Mail</th>
				<th><i class="fa fa-envelope-o"></i> Comment</th>
				<th><i class="fa fa-sort-numeric-asc"></i> Photo ID</th>
				<th><i class="fa fa-check-circle"></i> Status</th>
				<th><i class="fa fa-calendar"></i>  Date</th>
				



			</tr>

		</thead>

		<tbody>

			<?php 

				$comments = Comment::select();

				foreach ($comments as $comment) {
				?>
					<tr>
						<td></td>
						<td><?php echo $comment->id ?></td>
						<td><?php echo $comment->fullname ?>
							<p>
								<a href="reply_comment.php?replypst=<?php echo $comment->photo_id ?> && comment=<?php echo $comment->id ?>" class="green-text">Reply</a>
								|
								<a href="view_single_comment.php?view_photo=<?php echo $comment->photo_id ?> && view_comment=<?php echo $comment->id ?>" class="teal-text">View post</a>
								|
								<a id="<?php echo $comment->id ?>" rel="<?php echo $comment->comment . ' by ' . $comment->fullname ?>" href="#del_comment" class="modal-trigger modal-close red-text del_comment">Delete</a>
								|
								<a href="comment.php?app=<?php echo $comment->id ?>">Approve</a>
								|
								<a class="brown-text" href="comment.php?unapp=<?php echo $comment->id ?>">Unapprove</a>
							</p>
						</td>
						<td><?php echo $comment->email ?></td>
						<td><?php echo $comment->comment ?></td>
						<td><?php echo $comment->photo_id ?></td>
						<td><?php echo $comment->status ?></td>
						<td><?php echo date('d-M-Y | h:i:a', strtotime($comment->date)) ?></td>

					</tr>	
				<?php	
				}



			?>
			
			

		</tbody>	

	</table>

</div>	

</div>




	<!-- DELETING COMMENT -->
	<?php
		if(isset($_GET['del_com'])){
			$com_idd = $_GET['del_com'];

			$pull_content = Comment::find_by_id($com_idd);
			
			$_SESSION['delete_comment_message'] = $pull_content->comment . " by " . $pull_content->fullname;


			$comment->delete($com_idd);

			header("location:comment.php");

		}
	?>
<!-- END OF DELETING COMMENT -->





	<!-- APPROVING COMMENT -->
	<?php
		if(isset($_GET['app'])){
			$com_idd = $_GET['app'];

			$pull_content = Comment::find_by_id($com_idd);
			


			$comment->single_update('status','Approved',$com_idd);

			header("location:comment.php");

		}
	?>
<!-- END OF APPROVING  COMMENT -->





	<!-- UNAPPROVING COMMENT -->
	<?php
		if(isset($_GET['unapp'])){
			$com_idd = $_GET['unapp'];

			$pull_content = Comment::find_by_id($com_idd);
			


			$comment->single_update('status','Unapproved',$com_idd);

			header("location:comment.php");

		}
	?>
<!-- END OF UNAPPROVING  COMMENT -->









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