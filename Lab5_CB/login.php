<!DOCTYPE html>
<html><!-- FIX THIS PAGEEEEE-->
    <head>
        <meta charset="UTF-8">
        <title>LAB 5 - Chris Brown</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <style>
            .muhh{
                float:left;
                width:45%;
                margin-left:3%;
                color:black;
                margin-top:2%;
                color:red;
            }
            .form-thing{
                width:40%;
            }
            </style>
 </head>    
    <body>
<div class="muhh">
    <h4><a href="../index.php" class="btn btn-secondary">Return to Course Page</a></h4><br />
<?php

include 'functions.php';
if(isPostRequest()){
    session_start();
    $user = $_POST['username'];
    $pass = $_POST['password'];
    loginAttempt($user, $pass);   
    if($_SESSION['login'] == true){
        header('Location: upload.php');
    }
}


?>
    
    <div class="form-thing">
    <form action="#" method="POST" class="form-control">
        <label>User Name : </label>
        <input name="username" type="text" value="" /><br />
        <label>Password : </label>
        <input name="password" type="text" value="" /><br />   
        <input type="submit" value="Login" />
    </form></div>
</body>

</html>