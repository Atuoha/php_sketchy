<?php
	include "head.php";?>




<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/contact.png" alt="Some-image" width="150px;">
</h2>
</div>	



<div style="padding: 10px;">
<div class="panel-heading">
  <h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-address-card-o fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / Contacts</span></h5>
</div>



<div id="post-div">

	<table class="bordered highlight centered">
		<thead>
			<tr>
				<th><i class="material-icons  hide-on-med-and-down">filter_1</i><b>  ID</b></th>
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">account_circle</i><b>  Fullname</b></th>
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">format_color_text</i><b>  Subject</b></th>
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">question_answer</i><b>  Message</b></th>
				<th><i class="material-icons  hide-on-med-and-down">content_cut</i><b>  Action</b></th>

			</tr>	
		</thead>	
		<tbody>


		</tbody>
			<?php
				$contacts = new Contact();
				$contacts = Contact::select();
				foreach ($contacts as $contact) {
				?>
					<tr>
						<td><?php echo $contact->id ?></td>
						<td><?php echo $contact->fname . ' ' . $contact->lname  ?></td>
						<td><?php echo $contact->subject ?></td>
						<td><?php echo $contact->message ?></td>
						<td><a class="red-text" href="contact.php?del=<?php echo $contact->id ?>">Delete</a></td>

					</tr>	
				<?php	
				}
			?>	
		</table>	


</div>

</div>




	<!-- DELETING POST -->
	<?php
		if(isset($_GET['del'])){
			$id = $_GET['del'];

			$pull_content = Contact::find_by_id($id);

			$contact->delete($id);



			header("location:contact.php");

		}
	?>
<!-- END OF DELETING POST -->
