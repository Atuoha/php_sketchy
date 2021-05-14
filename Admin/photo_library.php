
  <!-- Modal Structure -->
  <div id="gallary" class="modal modal-fixed-footer">
    <div class="modal-content gallary_modal_content">
    	<a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 2em;"  class=" teal-text material-icons">close</i></a>

      <p class="fixed"><i class="fa fa-photo"></i><b> Gallary System Library</b></p>
      <hr style="color: #f5f5f5">
     <div class="row">

        <div class="col l3 sm12 m12 sidebar_image">
             

        </div>  
        
     	<div class="col l9 sm12 m12 photos_div_modal">
     		<div class="row">
     			<?php

     				$photos = Photo::select();

     				foreach ($photos as $photo) {
     				  ?>

     				  		       
     							<img src="photo_uploads/<?php echo $photo->filename ?>" class="responsive-img hoverable imagery" width="120" data="<?php echo $photo->id ?>">
                                <input class="photo_id" type="hidden" value="<?php echo $photo->id ?>">
                                <input class="photo_name" type="hidden" value="<?php echo $photo->filename ?>">


     				  <?php	
     				}
     			?>




     		</div>	
     	</div>	

     	
     </div>	

    </div>
    <div class="modal-footer">
      <button disabled="true"  id="select_btn" class="modal-close teal white-text waves-effect waves-red btn-flat "><i class="fa fa-check-circle"></i> View Photo's post details</button>
    </div>
  </div>








    <script>

            $(document).ready(function(){

                var image_name;
                var photo_id;

                $('.imagery').click(function(){

                    $('#select_btn').prop('disabled',false);
                   $(this).toggleClass('selected').siblings().removeClass('selected');



                     var tach = $('.selected').prop('src');
                     var image_href = tach.split("/");
                     image_name = image_href[image_href.length -1];

                     photo_id = $(this).attr('data');


                     $.ajax({

                        url:"includes/ajax.php",
                        data:{photo_id:photo_id},
                        type:"POST",
                        success:function(data){

                            if(!data.error){
                               
                                $('.sidebar_image').html(data)
                            }
                        }
                    })

                   

                })


                $('#select_btn').click(function(){
                     
                    $.ajax({

                        url:"includes/ajax.php",
                        data:{image_name:image_name},
                        type:"POST",
                        success:function(data){

                            if(!data.error){
                                window.location.replace("session_post.php");
                                // location.reload(true);
                            }
                        }
                    })

                })



                


})



  </script>  






