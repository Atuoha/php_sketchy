
<!-- START OF MODAL FOR GALLARY LIBRARY -->


<!-- Modal -->
<div class="modal  fade" id="gallary"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true" data-backdrop="false">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document" style="min-width: 85%; min-height: 85%;">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title green-text" id="exampleModalLongTitle"><i class="fa fa-photo"></i><b> Gallary System Library</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
      <div class="col-lg-3 col-sm-12 col-md-12 sidebar_image">
         
      
       
        
      </div>

      <div class="col-lg-9 col-sm-12 col-md-12 photos_div_modal">
        <div class="row">
          <?php

            $photos = Photo::select();

            foreach ($photos as $photo) {
              ?>

                  
                  <img src="Admin/photo_uploads/<?php echo $photo->filename ?>" class="hoverable img-responisve ml-2 mb-2 imagery" width="110" data="<?php echo $photo->id ?>">

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
        <button type="button" disabled="true" class="btn btn-green " data-dismiss="modal"  id="select_btn"><i class="fa fa-check-circle"></i> LOOKS NICE RIGHT ?</button>
      </div>
    </div>
  </div>
</div>

<!-- END OF MODAL FOR GALLARY LIBRARY -->









