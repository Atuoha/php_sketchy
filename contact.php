<!-- Contact us modal -->
<div class="modal fade top " id="modalDefaultContactForm" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <!--Modal: Contact form-->
  <div class="modal-dialog  cascading-modal" role="document">

    <!--Content-->
    <div class="modal-content ">

      <!--Header-->
      <div class="modal-header green white-text">
        <h4 class="title">
          <i class="fa fa-envelope"></i> Contact form</h4>
        <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
          <form method="post">

            <?php

                if(isset($_POST['contact_btn'])){

                  $fname = mysqli_real_escape_string($database->conn,$_POST['fname']);
                  $lname = mysqli_real_escape_string($database->conn,$_POST['lname']);
                  $subject = mysqli_real_escape_string($database->conn,$_POST['subject']);
                  $message = mysqli_real_escape_string($database->conn,$_POST['message']);

                  

                  

                  if(!empty($fname && $lname && $subject && $message)){

                    $sql = mysqli_query($database->conn,"SELECT * FROM contact WHERE subject = '$subject' AND fname = '$fname' ");

                    $counting = mysqli_num_rows($sql);

                    if($counting == 0 ){
                      

                      $contact = new Contact();

                    $contact->fname = $fname;
                    $contact->lname = $lname;
                    $contact->subject = $subject;
                    $contact->message = $message;
                    $contact->create();

                    echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> Contact sent successfully!</b></i>";

                  }else{

                     echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Message exists with the same details!...</b></i>";
                 }   

               }else{

                    echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Fill in fields please!...</b></i>";

                  }      

                }

            ?>

           <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" name="fname" class="form-control">
                        <label for="materialRegisterFormFirstName">First name</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormLastName" name="lname" class="form-control">
                        <label for="materialRegisterFormLastName">Last name</label>
                    </div>
                </div>
            </div>
        <!-- Default input subject -->
        <label for="defaultFormSubjectModalEx">Subject</label>
        <input type="text" id="defaultFormSubjectModalEx" name="subject" class="form-control form-control-sm">

        <br>

        <!-- Default textarea message -->
        <label for="defaultFormMessageModalEx">Your message</label>
        <textarea type="text" id="defaultFormMessageModalEx" name="message" class="md-textarea form-control"></textarea>

        <div class="text-center mt-4 mb-2">
          <button class="btn btn-outline-green btn-rounded btn-block my-4 waves-effect z-depth-0" name="contact_btn" type="submit">Send
            <i class="fa fa-paper-plane ml-2"></i>
          </button>
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
</form>
  <!--/Modal: Contact form-->
</div>

<!-- End of contact us modal -->
