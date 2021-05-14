

<!-- login us modal -->
<div class="modal fade bottom  " id="modalDefaultLoginForm" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <!--Modal: Contact form-->
  <div class="modal-dialog  cascading-modal" role="document">

    <!--Content-->
    <div class="modal-content ">

      <!--Header-->
      <div class="modal-header green white-text">
        <h4 class="title">
          <i class="fa fa-user"></i> Login</h4>
        <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">

        <form class="needs-validation" novalidate method="post">

          <?php

          if(isset($_POST['login_btn'])){
             $email = $_POST['email'];
             $password = mysqli_real_escape_string($database->conn,$_POST['password']);

             if(!empty($email && $password)){
             
              $sql = mysqli_query($database->conn,"SELECT * FROM users WHERE email = '$email' AND status = 'Approved' ");

              while ($row = mysqli_fetch_array($sql)) {
                $user_id = $row['id'];
                $username = $row['uname'];
                $db_password = $row['pass'];
              }

               $counting = mysqli_num_rows($sql);

               if($counting > 0 ){
                    
                  if(password_verify($password, $db_password)){
                      $_SESSION['sketch_user_id'] = $user_id;
                  ?>
                                
                    <script>window.location.replace("Admin");</script>
                  <?php    
                  }else{

                     echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Incorrect password!...</b></i>";

                    
                  }  

               }else{
                echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! User not recognised!...</b></i>";
                
               }


             }else{
              
              echo "<i class='red-text'><b><i class='fa fa-times-circle-o'></i> Opps! Fill in fields please!...</b></i>";
                
             }
          }

        ?>

        <!-- Default input email -->
        <br>
        <label for="defaultFormEmailModalEx">Your email</label>
        <input type="email" id="validationCustom012 defaultFormEmailModalEx" name="email" class="form-control form-control-sm">
        <div class="valid-feedback">
        Looks good!
        </div>

        <br>

        <!-- Default input subject -->
        <label for="defaultFormEmailModalEx" required>Password</label>
        <input type="password" id="validationCustom012 defaultFormEmailModalEx" name="password" class="form-control form-control-sm">
        <div class="valid-feedback">
        Looks good!
        </div>
        <br>

       

        <div class="text-center mt-4 mb-2">
          <button class="btn green btn-block my-4" name="login_btn" type="submit">Sign in</button>
        </div>


        



        <div class="text-center">
        <p>Not a member?
            <a data-dismiss="modal" data-toggle="modal"  data-target="#modalDefaultRegisterForm" >Register</a>
        </p>


       <p>
       	<a >Forgot Password?</a>
       </p>
     </div>

        <form>
    </div>


      </div>
    </div>
    <!--/.Content-->
  </div>
  <!--/Modal: Contact form-->
</div>

<!-- End of login us modal -->





















