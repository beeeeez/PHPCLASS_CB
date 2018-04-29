<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Database Entries - Chris Brown</title>
        <link rel="stylesheet" href="bootstrap.min.css" />
        <style>
            body{
                background-color:whitesmoke;
            }
            .form-group {
                width:25%;
                float:left;
                margin:3%;
            }
        </style>
    </head>
    <body>
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
         <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/PHPCLASS_CB/index.php">Main Course Page</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Lab 2 - Add Page</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewPage.php">Lab 2 - View Page</a>
      </li>
    </ul>
             <div>
                 </nav>
        
        
        <br/>
       <div class="form-group">
        <form method="post" action="addPage.php">
        First Name: <input class="form-control" type="text" name="first" /><br/>
            Last Name : <input  class="form-control" type="text" name="last" /><br />
            Date of Birth: <input class="form-control" type="text" name="dob" /><br />
            Height: <input class="form-control" type="text" name="height" /><br />
            <input type="submit" value="Add Record to Database"/>
        </form>
       </div>
        <br/>
        
        <?php
        
        if(isset($_POST['first']))
        {
            if($_POST['first'] == ""||$_POST['last'] == ""||$_POST['dob'] == ""||$_POST['height'] == "" )
            {
                echo "<br/><p>Please fill out all fields.</p>";
                
            }
            
        else{
        $first = filter_input(INPUT_POST, 'first');
        $last = filter_input(INPUT_POST, 'last');
        $dob = filter_input(INPUT_POST, 'dob');
        $height = filter_input(INPUT_POST, 'height');        
        
        try{
        $user = "root";
        $pass = "";
        $dbh = new PDO('mysql:host=localhost;port=3306;dbname=phpclasswinter2017', $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $dbh->prepare("INSERT INTO actors SET firstname = :first, lastname = :last,dob= :dob,height= :height");
            $bubbahGump = array(
                ":first" => $first,
                ":last" => $last,
                ":dob" => $dob,
                ":height" => $height               
            );
            if($statement->execute($bubbahGump) && $statement->rowCount() > 0){
                echo "Values have been added successfully";
            }
            
        }
        catch(PDOException $e) {
            echo "<br>" . $e->getMessage();
            echo "it got boned up, son";
        }}
        $statement = null;
        $dbh = null;
        }
        
        
        
        
        
        ?>
    </body>
</html>
