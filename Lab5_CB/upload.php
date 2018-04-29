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
                
            }
            .form-control{
                width:40%;
                }
            
            </style>
 </head>    
    <body>
<div class="muhh">
<a href="../index.php" class="btn btn-secondary">Return to Course Page</a><a href="logout.php" class="btn btn-secondary">Logout</a><br />

<?php
include 'functions.php';
session_start();
checkLogin();

if (isset ($_FILES['file1'])) {
           
$tmp_name = $_FILES['file1']['tmp_name'];
$path = getcwd() .DIRECTORY_SEPARATOR . 'uploads';
$new_name = $path . DIRECTORY_SEPARATOR . $_FILES['file1']['name'];
move_uploaded_file($tmp_name, $new_name);
$fileStuff = pathinfo($new_name);
    if($fileStuff['extension'] == "csv"){
    dbChangeUp($_FILES['file1']['name']);
    }
    
    else{
        echo "You need to upload a csv file.";
    }
}
?>

<br />
<form action="#" method="post" enctype="multipart/form-data" class="form-control">
    <label>Upload 'schools.csv'</label>
    
<input type="file" name="file1"><br/><br/>
<input type="submit" value="Upload">


</form>
</div>
    </body>
</html>