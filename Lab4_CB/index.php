<!DOCTYPE html>
<html><!-- FIX THIS PAGEEEEE-->
    <head>
        <meta charset="UTF-8">
        <title>LAB 4 - Chris Brown</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <style>
            .buhh{
             width:35%;
             margin-left:15%;
             float:left;
             margin-top:3%;
             margin-bottom:3%;
            }
            
            .muhh{
             width:65%;
             margin-left:15%;
             float:left;                
            }
            </style>
    </head>    
    <body>
<div class="buhh">
    <h4><a href="../index.php">Return to Course Page</a></h4><br />
<?php

    include 'sortForm.php';
    include 'filterForm.php';
    ?><br/>
        <input type="submit" value="Search" />
</form></div>
<br /><br />
<div class="muhh">
<table class="table table-hover">
            <th>ID #</th>
      <th>Corp</th>
      <th>Date</th>
      <th>Email</th>
      <th>Zipcode</th>
      <th>Owner</th>
      <th>Phone</th>
    </tr>
<?php 

    include 'functions.php';
    include 'sqlStuff.php';
    
if(isPostRequest()){
 $sortBy = $_POST['sortBy'];
 $sortOrder = $_POST['sortOrder'];
 $filterBy = $_POST['filterBy'];
 $searchParam = $_POST['searchParam'];
$theGoods = array();
$theGoods = gettheGoods($sortBy, $sortOrder, $filterBy, $searchParam);
     
 }
 else{
     $theGoods = array();
$theGoods = gettheGoods("None", "", "", "");     
 }
 
 $row; 
$countMe = 0;
 foreach($theGoods as $row){
     $countMe++;
 }
 if($countMe == 0){
     echo "<h3>No Results :L </h3><br />";
     
 }
 else{
 echo "<h3>$countMe Results <br /></h3>";
 }
 
 foreach ($theGoods as $row){
     $rowCount++;
      echo '<tr class="table-active">';
                echo "<td>";
                echo $row['id'];
                echo "</td>";
                echo "<td>";
                echo $row['corp'];
                echo "</td>";
                echo "<td>";
                echo $row['incorp_dt'];
                echo "</td>";
                echo "<td>";
                echo $row['email'];
                echo "</td>";
                echo "<td>";
                echo $row['zipcode'];
                echo "</td>";
                echo "<td>";
                echo $row['owner'];
                echo "</td>";
                echo "<td>";
                echo $row['phone'];
                echo "</td>";
            }  
 
?>
</div>
    </body>    
</html>