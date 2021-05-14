<?php
    require_once("Admin/includes/init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sketch</title>   
   <link rel="stylesheet" href="css/mdb.min.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="scss/_custom-styles.scss">
  <link rel="stylesheet" href="scss/mdb-free.scss">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="font/roboto">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <!-- <link rel="stylesheet" href="fontawesome/css/font-awesome.css"> -->
  <link rel="stylesheet" href="iconfont/material-icons.css">
  
  <link rel="icon" href="img/pattern.png" />
 
</head>



<body>
  <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar white green-text" style="min-width: 100%;">
      <a class="navbar-brand d-none d-lg-block"><img src="/Sketches/img/pattern.png" width="200px;"></a>
      <button type="button" class="navbar-toggler green-text" data-toggle="collapse" data-target="#content" aria-controls="content" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="material-icons">menu</i></button>
      <div class="container ">
        <a class="navbar-brand d-block d-lg-none"><img src="/Sketches/img/pattern.png" width="200px;"></a>
          <div class="collapse navbar-collapse" id="content">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item "><a  role="button" aria-haspopup="true" aria-expanded="false" href="index.php" class="nav-link hoverable green-text  text-uppercase ">Home</i></a></li>
              <li class="nav-item"><a class="nav-link hoverable green-text  text-uppercase ">About</i></a></li>
              <li class="nav-item"><a  data-toggle="modal" data-target="#modalDefaultContactForm" class="nav-link hoverable green-text text-uppercase ">Contact</i></a></li>
              <li class="nav-item"><a class="nav-link hoverable green-text text-uppercase ">Faq</i></a></li>

            </ul>  

            <ul class="navbar-nav ml-auto nav-flex-icons">
              <li class="nav-item"><a class="nav-link"><i class="fa fa-facebook"></i></a></li>
              <li class="nav-item"><a class="nav-link"><i class="fa fa-google"></i></a></li>
              <li class="nav-item"><a class="nav-link"><i class="fa fa-twitter"></i></a></li>
              <li class="nav-item"><a class="nav-link"><i class="fa fa-whatsapp"></i></a></li> 
               
               <?php
                  if(empty($_SESSION['sketch_user_id'])){
                   ?>
                    <a data-toggle="modal" data-target="#modalDefaultLoginForm"  class="btn btn-md green white-text m-0 px-3 hoverable "  id="MaterialButton-addon2">Signin</a>
                   <?php 
                  }
               ?>  
                         
             </ul> 
          </div>
      </div>
   </nav> 
