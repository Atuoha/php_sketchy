<?php
	require_once("includes/head.php");
	require_once("contact.php");
	require_once("signin.php");
	require_once("register.php");


?>




<!-- MAIN WORK -->
 <section class="view hm-gradient" id="backDiv">
        <div class="full-bg-img d-flex align-items-center">
          <div class="container">
            <div class="row no-gutters">
              <div class="col-md-10 col-lg-12 text-center text-md-left margins">
                <div class="white-text">
                  <div class="wow flipInY text-center" data-wow-delay="3.1s">
                    <h1 class="h1-responsive  font-bold mt-sm-5">/ SKETCH SEARCHED</h1>
                    <h5 class="wow rollIn" data-wow-delay="4.5s">
                      ...developing the best contents without considering who is watching them
                     </h5> 
                     <form method="post" action="searched.php">
                    <div class="md-form input-group mb-3 wow bounceInUp" data-wow-delay="4.7s">
                  <input type="text" name="search_input" id="defaultLoginFormEmail" class="form-control white-text" placeholder="Enter search keyword..." aria-label="Search keyword"
                    aria-describedby="MaterialButton-addon2">
                  <div class="input-group-append">
                    <button name="search_btn" class="btn btn-md green white-text m-0 px-3" type="submit" id="MaterialButton-addon2"><i class="fa fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
              Popular search for contents
  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  </section>





<div class="container wow fadeInRight text-center" id="desc_top" data-wow-delay="1.2s">
 <h4><b>Why <!-- <span class="green-text"> -->Sketch?<!-- </span> --></b></h4>
 <img src="/Sketches/img/pa.png" class="img-fluid" width="200">
<p class="article__content monospace">Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It's primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch's development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it's developer to acquire more knowledge of OOP and to aid users in ways possible.</p>
</div>




<!-- THIS CODE IS FOR THE COMMENT BUTTON -->


            



<!-- END OF THE COMMENT BUTTON CODE -->


















<?php
  
  if(isset($_POST['search_btn'])){
     
     $search_input = mysqli_real_escape_string($database->conn,$_POST['search_input']);

     $_SESSION['searched'] = $search_input;
     

     if(empty($search_input)){
      ?>
        <script>window.location.replace("index.php")</script>
     <?php   
     }
  }

?>



<div class="container" id="main_desc">
<div class="row">


  <?php
     $count_rows = Photo::count_table_rows($_SESSION['searched']);
      if($count_rows > 1){
       ?> 
<!-- MULTIPLE PHOTOS -->
   <div class="col-12 col-lg-4 col-sm-12 wow fadeInLeft " data-wow-delay="2.8s">
       <div class="card border-success mb-3" >
          <div class="card-header"><b>Photo Categories</b></div>
            <div class="card-body text-success">
                <div class="list-group-flush">
                   <ul class="list-group">
                    <!-- <a href="index.php" class="green-text">All Categories</a> -->
                   		<?php
			    			$cats = Category::select();

			    			foreach ($cats as $cat) {
			    			?>	
       			
								 <li class="list-group-item ">

								    <div class="md-v-line"></div><p class="mb-0 black-text zoom"><img src="/Sketches/Admin/cat_imgs_upload/<?php echo $cat->cat_img ?>" class=" mr-4  p-3 white-text rounded-circle "  width="100" aria-hidden="true"><a href="cat_post.php?cat=<?php echo $cat->id ?>" class="black-text"><?php echo $cat->cat_title?></a></p><i class="badge badge-success pr-3 pl-3 float-right"><?php echo date('d-M-y', strtotime($cat->date)) ?></i>
								 </li>

							<?php                   		
                   			}

                      }

                   		?>

						</ul>

                      
                      
                </div>
              </div>
          </div>
   </div> 





        <?php
            $count_rows = Photo::count_table_rows($_SESSION['searched']);

           if($count_rows > 1){
            ?>
         <div class="col-12 col-lg-8 col-sm-12   ">

      <h4 class="text-center wow zoomIn" data-wow-delay="2.0s"><img src="img/seen.png" width="50"><b>All Searches</b></h4><br>


         <!-- Card deck -->
        <div class="card-deck" >
           <?php 
           }

					 $photos = Photo::pull_photo_by_string($_SESSION['searched']);

          $count_rows = Photo::count_table_rows($_SESSION['searched']);

           if($count_rows > 1){

            foreach ($photos as $photo ) {
          ?>



        <!-- Card -->
              <div class="card mb-6 card_style wow fadeInRight"  data-wow-delay="2.2s">

                <!--Card image-->
                <div class="view overlay zoom" >
                  <img class="card-img-top img-fluid" src="/Sketches/Admin/photo_uploads/<?php echo $photo->filename?>"
                    alt="Card image cap">
                  <a href="/Sketches/Admin/photo_uploads/<?php echo $photo->filename?>">
                    <div class="mask flex-center waves-effect waves-light rgba-grey-light">
                    <p class="white-text"><?php echo $photo->title?></p>
                  </div>
                  </a>
                </div>

                <!--Card content-->
                <div class="card-body">

                  <!--Title-->
                  <h4 class="card-title"><?php echo $photo->title?></h4>
                  <h5 class="blue-text pb-2"><strong><?php echo $photo->author ?></strong></h5>

                  <!--Text-->
                  <p class="card-text"><?php echo substr($photo->description, 0,100) ?></p>
                  <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                  <a href="single.php?single_post=<?php echo $photo->id ?>" class="btn green accent-4 btn-md">Read more</a>

                </div>

              </div>
          <!-- Card -->



          <?php
          }

        ?>
        

      </div>
  <!-- Card deck -->


           <?php 
           }else{

             foreach ($photos as $photo ) {
           ?> 
           <!-- SINGLE PHOTO -->
              <div class="container">
              <div class="row">
        <div class="col-lg-7">
          <div>
            <h1 class="h1-responsive"><b><?php echo $photo->title?></b></h1>
            <h5><b class="green-text">...by <?php echo $photo->author?></b></h5>
            <p><i>on <?php echo date('l M d ,Y | h:i:a', strtotime($photo->date))?></i></p>
          <div>

            <div class="view overlay zoom" >
         <img  src="/Sketches/Admin/photo_uploads/<?php echo $photo->filename?>" width="635">
         <a href="/Sketches/Admin/photo_uploads/<?php echo $photo->filename?>">
          <div class="mask flex-center waves-effect waves-light rgba-grey-light">
                    <p class="white-text"><b><?php echo $photo->title?></b></p>
                  </div>
        </a>
        </div>


            <p style="text-align: justify;" class="mt-5"><?php echo $photo->description?></p>
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
                        $new_comment = Comment::create_comment($photo->id,$email,$fullname,$comment);

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
          
          $comments = Comment::find_comment($photo->id);

          foreach ($comments as $comment) { 
          ?>


         <!-- Previewing comments -->
                  <div class="chat-message grey lighten-3">
              <img class="circle" src="img/avatar.png"alt="img" width="50">
              <b><?php echo $comment->fullname . '</b> <i>(' . $comment->email   . ') '  ?>: </i><span class="green-text"> <?php echo $comment->comment ?>  </span><br>  on <?php echo  date('M d ,Y | h:i:a',strtotime($comment->date)) ?>   
            </div>

               <!-- End of previewing comments -->


          <?php






  // VIEWING REPLIES QUREY

      
        $view_reply_query = mysqli_query($database->conn,"SELECT * FROM reply_comment WHERE photo_id = '$photo->id' AND comment_id = $comment->id ");


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
               <b class="white-text"><?php echo $name_reply  . ' <i>(' . $reply_mail   . ') ' ?>: </i><span class="white-text"> <?php echo $reply_msg ?>  </b></span><br>  on <?php echo  date('M d ,Y | h:i:a', strtotime($date)) ?> 
              </div>            

               <!-- End of previewing replies -->


            <?php
            }   

        }
      }
    }
       

      ?>

       <!-- END OF VIEWING REPLIES QUERY  -->   






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
