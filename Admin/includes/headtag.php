<?php 
ob_start();
?>

<?php require_once("init.php"); ?>


<!-- Testing database -->
<?php
    if(!$database->conn){
        die("ERROR WITH DATABASE " . mysqli_error($database->conn));
    }
?>




<!-- Checking to see if any one is logged in -->
<?php

// if(!$session->is_signed_in()){

//     redirect("/Sketches/index.php");
// }

if(!$_SESSION['sketch_user_id']){
    
    redirect("/Sketches/index.php");
}







?>





<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin Section</title>
	<link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="iconfont/material-icons.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" href="image/avatar.png" />
    <script src="javascript/jquery-2.1.3.min.js"></script>
    <script src="javascript/materialize.min.js"></script>
    <script src="javascript/main.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript" src="javascript/dropzone.js"></script>
     <script type="text/javascript" src="javascript/script.js"></script>

</head>








<!-- Checking Users Online -->

   
<!-- End of checking users online -->


