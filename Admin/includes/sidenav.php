<?php

$user_session = Session::find_user_session($_SESSION['sketch_user_id']);


while ($row = mysqli_fetch_array($user_session)) {
     $login_uname = $row['uname'];

}


?>



<ul class="side-nav fixed teal navBar" id="sidenav" >
<li id="head-det">
    <div class="user-view">
         <div class="background">
             <img src="image/price_bg.jpg" class="responsive-img" alt="some-image">
    </div>
        <a href="">
             <img src="image/admin.png" width="150"  alt="some-image">
        </a>
            <span class="teal-text hide-on-large-only center-align"><b><?php echo $login_uname  ?> </b></span>
             <span class="teal-text hide-on-med-and-down center-align"><b> <?php echo $login_uname ?>  </b></span>
    </div>
</li>


<li><a href="index.php" class="white-text" id="home"><i class="material-icons white-text">apps</i><b>Dashboard</b></a></li>
<br >

<li><a id="pst" class="dropdown-button white-text" data-activates="posts-li"><i class="material-icons white-text">descriptions</i><i class="material-icons right white-text T-btn">arrow_drop_down</i><b>Gallary Uploads</b>
</a></li>

<ul class="dropdown-content" id="posts-li" >
<li><a  href="display_post.php" class="teal-text" ><i class="material-icons teal-text">book</i><b>View all uploads</b></a></li>
    <li><a href="add_post.php" class="teal-text"><i class="material-icons teal-text">add_cirlce</i><b>Add upload</b></a></li>
</ul>
<br >

<li><a href="cat.php" id="cat" class="white-text"><i class="material-icons white-text">storage</i><b>Upload Categories</b></a></li>
<br >

<li><a href="comment.php" id="comment" class="white-text"><i class="material-icons white-text">insert_comment</i><b>Comments Entries</b></a></li>
<br >

<li><a href="contact.php" id="comment" class="white-text"><i class="material-icons white-text">contacts</i><b>Contact Reachouts</b></a></li>
<br >


<li><a  id="users" class="dropdown-button white-text" data-activates="users-li"><i class="material-icons white-text">people</i><i class="material-icons right white-text T-btn ">arrow_drop_down</i><b>Users</b></a></li>

<ul class="dropdown-content" id="users-li" >
<li><a  href="users.php" class="teal-text" ><i class="material-icons teal-text">assignment_ind</i><b>View all users</b></a></li>
<li><a href="add_user.php" class="teal-text"><i class="material-icons teal-text">add_cirlce</i><b>Add user</b></a></li>
</ul>

<br >

<li><a href="profile.php" class="white-text" id="Profile"><i class="material-icons white-text">person</i><b>Profile Setup</b></a></li>
<br>




<li><a  href="" class="dropdown-button white-text waves-effect waves-light" data-activates="drop-list1" ><i class="material-icons white-text">account_circle</i><i class="material-icons right T-btn white-text" >arrow_drop_down</i><b><?php echo $login_uname ?></b></a></li>



</ul>


 <ul id="drop-list1" class="dropdown-content" style="min-width: 100%;">
    <li><a href="logout.php" id="liveChat" class="teal-text"><i class="material-icons teal-text">settings_power</i><b>Logout</b></a></li>
    <li><a href="../home.php" class="teal-text"><i class="material-icons teal-text">extension</i><b>Visit website</b></a></li>


</ul>