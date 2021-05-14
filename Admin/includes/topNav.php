<?php

$user_session = Session::find_user_session($_SESSION['sketch_user_id']);


while ($row = mysqli_fetch_array($user_session)) {
     $login_uname = $row['uname'];

}


?>



<ul class="navbar-list right">

            <li class="dropdown-button waves-effect waves-light" data-activates="msg-drop" ><i class="material-icons" style="margin-right:40px;">email arrow_drop_down</i></li>
            <li>Sketch Admin <b>| <?php echo $login_uname ?>  |</b></li>
            <li><a href="" class="dropdown-button waves-effect waves-light" id="admin-img" data-activates="drop-list2" ><img src="image/admin.png" width="40px;" height="30px;"  alt="avatar"></a></li>

        </ul>
        

         <ul class="dropdown-content" id="drop-list2" style="min-width: 30%;" >
              <li><a class="teal-text text-darken-1" href="profile.php"><i class="material-icons">person_outline</i> Profile</a></li>
              <li><a class="teal-text text-darken-1" href="comment.php"><i class="material-icons">question_answer</i> Inbox</a></li>
               <li><a class="teal-text text-darken-1" href="comment.php"><i class="material-icons">build</i> Settings</a></li>
              <li><a class="teal-text text-darken-1" href="logout.php"><i class="material-icons">settings_power</i> Logout</a></li>
        </ul>



        <ul class="dropdown-content" id="msg-drop" >
              <div class="row">
                <div class="col l9" id="msg-con">
                    <ul class="responsive">
                      <li><a><b>Timothy Sams</b><br>
                       2019-07-12<br>
                       The purpose of writing this review is help people get ...
                     </a>
                      </li>

                    </ul>  
                    
                 </div>

                <div class="col l3 right">
                    <img src="image/links2.png" class="circle" width="50px;">
                 </div>
               </div> 



                <div class="row">
                <div class="col l9" id="msg-con">
                    <ul class="responsive">
                      <li><a><b>Emeka Chukwu</b><br>
                       2017-07-12<br>
                       Lines of floatings straight into the actions of our stripe...
                     </a>
                      </li>

                    </ul>  
                    
                 </div>

                <div class="col l3 right">
                    <img src="image/links.png" class="circle" width="50px;">
                 </div>
               </div> 



                <div class="row">
                <div class="col l9" id="msg-con">
                    <ul class="responsive">
                      <li><a><b>Sandra Adams</b><br>
                       2018-07-12<br>
                       We walked in chains but because of the nature of our...
                     </a>
                      </li>

                    </ul>  
                    
                 </div>

                <div class="col l3 right">
                    <img src="image/links3.jpg" class="circle" width="50px;">
                 </div>
               </div> 

        </ul>
