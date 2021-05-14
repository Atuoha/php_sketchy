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
                    <h1 class="h1-responsive  font-bold mt-sm-5">/ SKETCH CATEGORY SELECT</h1>
                    <h5 class="wow rollIn" data-wow-delay="4.5s">
                      ...developing the best contents without considering who is watching them
                     </h5> 
                     <form method="post">
                    <div class="md-form input-group mb-3 wow bounceInUp" data-wow-delay="4.7s">
                  <input type="text" id="defaultLoginFormEmail" class="form-control white-text" placeholder="Enter search keyword..." aria-label="Search keyword"
                    aria-describedby="MaterialButton-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-md green white-text m-0 px-3" type="button" id="MaterialButton-addon2"><i class="fa fa-search"></i> Search</button>
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


<div class="container" id="main_desc">
<div class="row">

   <div class="col-12 col-lg-4 col-sm-12 wow fadeInLeft " data-wow-delay="2.8s">
       <div class="card border-success mb-3" >
          <div class="card-header"><b><i class='green-text'><b><i class='fa fa-check-circle'></i></b></i> Photo Categories</b></div>
            <div class="card-body text-success">
                <div class="list-group-flush">
                   <ul class="list-group">
                    <a href="index.php" class="green-text">All Categories</a>

                   		<?php
			    			$cats = Category::select();

			    			foreach ($cats as $cat) {
			    			?>	
       			
								 <li class="list-group-item ">

                    <div class="md-v-line"></div><p class="mb-0 black-text zoom"><a href="cat_post.php?cat=<?php echo $cat->id ?>"><img src="/Sketches/Admin/cat_imgs_upload/<?php echo $cat->cat_img ?>" class=" mr-4  p-3 white-text rounded-circle "  width="100" aria-hidden="true"></a><a href="cat_post.php?cat=<?php echo $cat->id ?>" class="black-text"><?php echo $cat->cat_title?></a></p><i class="badge badge-success pr-3 pl-3 float-right"><?php echo date('d-M-y - h:i:a', strtotime($cat->date)) ?></i>
                 </li>

							<?php                   		
                   			}

                   		?>

						 


										



						  
						</ul>

                      
                      
                </div>
              </div>
          </div>
   </div> 


<?php
  
  if(isset($_GET['cat'])){

      $cat_id = $_GET['cat'];

      $cat_title = Category::pull_cat_title($cat_id);
  }

?>




    <div class="col-12 col-lg-8 col-sm-12   " >
    
     <h4 class="text-center"><img src="img/seen.png" width="50"><b><?php echo $cat_title ?></b></h4><br>


       <!-- Card deck -->
			<div class="card-deck" >


				<?php

          $page = !empty($_GET['page'])? (int)$_GET['page']: 1;

          $items_per_page = 6;


          $sql = mysqli_query($database->conn,"SELECT * FROM photos WHERE category = '$cat_id' ");

          $items_total_count = mysqli_num_rows($sql);

          $pagination = new Pagination($page, $items_per_page, $items_total_count);

          

				  $sql = mysqli_query($database->conn,"SELECT * FROM photos WHERE category = '$cat_id' ORDER BY id DESC LIMIT {$items_per_page}  OFFSET {$pagination->offset()} ");

					while ($row = mysqli_fetch_assoc($sql)) {


          ?>

            <!-- Card -->
              <div class="card mb-6 card_style wow fadeInRight" data-wow-delay="3.5s">

                <!--Card image-->
                <div class="view overlay zoom" >
                  <a data-toggle="modal" data-target="#gallary">
                  <img class="card-img-top img-fluid" src="/Sketches/Admin/photo_uploads/<?php echo $row['filename']?>"
                    alt="Card image cap">
                  <div class="mask flex-center waves-effect waves-light rgba-grey-light">
                    <p class="white-text"><?php echo $row['title']?></p>
                  </div>
                  </a>
                </div>

                <!--Card content-->
                <div class="card-body">

                  <!--Title-->
                  <h4 class="card-title"><?php echo $row['title']?></h4>
                  <h5 class="blue-text pb-2"><strong><?php echo $row['author'] ?></strong></h5>

                  <!--Text-->
                  <p class="card-text"><?php echo substr($row['description'], 0,100) ?></p>
                  <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                  <a href="single.php?single_post=<?php echo $row['id'] ?>" class="btn green accent-4 btn-md">Read more</a>

                </div>

              </div>
          <!-- Card -->

          <?php
          }

          $counting = mysqli_num_rows($sql);

          if($counting == 0){
            echo "<div style='text-align:center'><img src='img/ss.png'></div>";
          }


          ?>



				



				
			</div>
	<!-- Card deck -->



  <!-- PAGINATION -->
  <nav aria-label="Page navigation example">
  <ul class="pagination pagination-circle pg-teal ">
   

    <?php

        if($pagination->page_total() > 1){
            if($pagination->has_previous()){
             ?>
                <li class="page-item"><a href="cat_post.php?cat=<?php echo  $cat_id?> && page=<?php echo $pagination->previous() ?>" class="green-text page-link">Previous</a></li>
                
             <?php 
            }
              
            for ($i=1; $i <= $pagination->page_total() ; $i++) { 
                if($i == $pagination->current_page){
                  ?>
                      <li class="page-item active"><a href="cat_post.php?cat=<?php echo  $cat_id?> && page=<?php echo $i ?>" class="white-text page-link"><?php echo $i ?></a></li>
                  <?php
                }else{
                  ?>
                      <li class="page-item "><a href="cat_post.php?cat=<?php echo  $cat_id?> && page=<?php echo $i ?>" class="green-text page-link"><?php echo $i ?></a></li>

                  <?php
                }
            }

            if($pagination->has_next()){
            ?>
                <li class="page-item"><a href="cat_post.php?cat=<?php echo  $cat_id?> && page=<?php echo $pagination->next() ?>" class="green-text page-link">Next</a></li>
            <?php  
            }
        }

    ?>

   



    
  </ul>
</nav>

<!-- END OF PAGINATION -->



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
