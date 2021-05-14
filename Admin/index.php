<?php
	include "head.php";?>

<div  class="mainContainer" >
<div class="center-align">
<div class="Bigcontainer">
<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey teal-text lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-dashboard fa-2x"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> / Dashboard <i class="right"><i class="material-icons teal-text">people</i><b> New views:</b> <?php echo $session->count; ?></i></span></h5>
</div>



      <div class="row">
        <div class="col l3 s12 m12 z-depth-1">
          <div class="card teal cards ">
            <div class="card-content white-text">
              <div class="row">
              	<div class="col l4 s12 m12">
              		<i class="material-icons large">collections</i>
              	</div>

              	<div class="col l8 s12 m12">
              		<h5><?php echo Photo::count_table("photos") ?></b></h5>
              		<h6><b>Photos</b></h6>
              
              </div>
            </div>
             <hr class="white-text">
            <span><i class="clicked material-icons right">more</i><a href="display_post.php" class="white-text" style="text-transform: capitalize;" ><b>View Photos</b></a></span>
              	</div>
          </div>
        </div>


        <div class="col l3 s12 m12 cards z-depth-1">
          <div class="card white">
            <div class="card-content teal-text">
              <div class="row">
              	<div class="col l4 s12 m12">
              		<i class="material-icons large">question_answer</i>
              	</div>

              	<div class="col l8 s12 m12">

              		<h5><b><?php echo Comment::count_table("comments") ?></b></h5>
              		<h6><b>Comments</b></h6>
              	</div>
              		
              </div>
              <hr class="teal-text">
            <span><i class="clicked material-icons right">more</i><a href="comment.php" class="teal-text" style="text-transform: capitalize;" ><b>View Comments</b></a></span>
            </div>
            
          </div>
        </div>


	<div class="col l3 s12 m12 cardss z-depth-1">
          <div class="card teal">
            <div class="card-content white-text">
             <div class="row">

              	<div class="col l4 s12 m12">
              		<i class="material-icons large">perm_contact_calendar</i>
              	</div>

              	<div class="col l8 s12 m12">
              		<h5><b><?php echo User::count_table("users") ?></b></h5>
              		<h6><b>Users</b></h6>
              	</div>
              		
              </div>
               <hr class="white-text">
            <span><i class="clicked material-icons right">more</i><a href="users.php" class="white-text" style="text-transform: capitalize;"><b>View Users</b></a></span>
            </div>
          
          </div>
        </div>
	

<div class="col l3 s12 m12 cards z-depth-1">
          <div class="card white">
            <div class="card-content teal-text">
              <div class="row">

                <div class="col l4 s12 m12">
                  <i class="material-icons large">storage</i>
                </div>

                <div class="col l8 s12 m12">
                  <h5><b><?php echo Category::count_table("categories") ?></b></h5>
                  <h6><b>Categories</b></h6>
                </div>
                  
              </div>
               <hr class="teal-text">
             <span ><i class=" clicked material-icons right">more</i><a href="cat.php" class="teal-text" style="text-transform: capitalize;"><b>View Categories</b></a></span>
            </div>
          </div>
        </div>

      </div>

       <div style="margin-top: 20px" class="center-align">
               
                
                <div class="col l12 sm12 m12">
                    <table class="bordered centered responsive-table highlight">
    <thead>
      <tr>
        
        <th><i class="fa fa-photo"></i> Photo</th>
        <th><i class="fa fa-pencil-square-o"></i> Title</th>
        <th><i class="fa fa-tasks"></i> Category</th>
        <th><i class="fa fa-hashtag"></i> Description</th>
        <th><i class="fa fa-envelope"></i> Comments</th>
        <th><i class="fa fa-eye"></i>  Date</th>
        

      </tr>

    </thead>

    
    <tbody>
      <br>
      <?php
        
        $photos = Photo::select_limit(3);



        foreach ($photos as $photo){
        

      ?>
      
        <td><img src="photo_uploads/<?php echo $photo->filename ?>" class="img-responsive" width="130">
          <p>
            <a id="<?php echo $photo->id ?>" rel="<?php echo $photo->title . " by " . $photo->author ?>" class="edit_upload green-text modal-trigger  model-close" href="#edit_upload" href="">Edit</a> 
            | 
            <a id="<?php echo $photo->id ?>" rel="<?php echo $photo->title . " by " . $photo->author ?>" class="modal-trigger model-close delete_upload red-text" href="#del_upload">Delete</a>
            |
            <a class="teal-text" href="view_post.php?view_ups=<?php echo $photo->id?>">View</a>
          </p>
        </td>
        <td><?php echo $photo->title ?></td>

        <td><?php echo Category::pull_category($photo->category) ?></td>

        <td><?php echo substr($photo->description, 0,50) ?></td>
        <td><a href="photo_comment.php?photo_comment=<?php echo $photo->id ?>"><?php echo Comment::return_comment_count($photo->id) ?></a></td>
        <td><?php echo $photo->date ?></td>

      </tr>

      <?php } ?>  

    </tbody>
</table>
                </div>  

            </div>  
        </div>

         
    <div class="col l6 sm12 m12">
     <div  id="piechart_3d" style="width: 900px; height: 500px;"></div>
      </div>          
     
</div>
</div>	
</div>
















<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
         
          ['Photos',     <?php echo Photo::count_table("photos") ?> ],
          ['Comments',  <?php echo Comment::count_table("comments") ?>],
          ['Users', <?php echo User::count_table("users") ?>],
          ['Categories',    <?php echo Category::count_table("categories") ?>]
        ]);

        var options = {
          title: 'Dashboard Data',
          is3D: true,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>