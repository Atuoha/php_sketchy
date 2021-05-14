<!-- login us modal -->
<div class="modal fade top " id="modalDefaultRegisterForm" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <!--Modal: Contact form-->
  <div class="modal-dialog  cascading-modal" role="document">

    <!--Content-->
    <div class="modal-content ">

      <!--Header-->
      <div class="modal-header green white-text">
        <h4 class="title">
          <i class="fa fa-user-plus"></i> Register</h4>
        <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">

        
      <form class="text-center needs-validation" style="color: #757575;" >

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" class="form-control">
                        <label for="materialRegisterFormFirstName">First name</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="email" id="materialRegisterFormLastName" class="form-control">
                        <label for="materialRegisterFormLastName">Last name</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="materialRegisterFormEmail" class="form-control">
                <label for="materialRegisterFormEmail">E-mail</label>
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="materialRegisterFormPassword">Password</label>
                <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                </small>
            </div>

            <!-- Phone number -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPhone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                <label for="materialRegisterFormPhone">Phone number</label>
                <small id="materialRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                    Optional - for two step authentication
                </small>
            </div>

            <!-- Newsletter -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
              Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
            </div>

            
            <!-- Sign up button -->
            <button class="btn btn-outline-green btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

            <div class="text-center">
            <p>Already a memeber?
                <a data-dismiss="modal" data-toggle="modal" data-target="#modalDefaultLoginForm" >Login</a>
            </p>
            </div>

        </form>
        
    </div>


      </div>
    </div>
    <!--/.Content-->
  </div>
  <!--/Modal: Contact form-->
</div>

<!-- End of login us modal -->
