<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Database Entries - Chris Brown - </title>
        <link rel="stylesheet" href="bootstrap.min.css" />
        <style>
            body{
                background-color:whitesmoke;
            }
            .muh{
                width:55%;
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
      <li class="nav-item">
        <a class="nav-link" href="addPage.php">Lab 2 - Add Page</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Lab 2 - View Page</a>
      </li>
    </ul>
             <div>
                 </nav>
        
        
        
        
        <div class="muh">
            <h2>What's in the database? :</h2><br>
        <table class="table table-hover">
            <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Height</th>
    </tr>
        <?php
        try{
        $theGoods = array();
        $user = "root";
        $pass = "";
        $dbh = new PDO('mysql:host=localhost;port=3306;dbname=phpclasswinter2017', $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $dbh->prepare("SELECT firstname, lastname, dob, height FROM actors");
            if($statement->execute() && $statement->rowCount() > 0){
                $theGoods = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        catch(PDOException $e) {
            echo "<br>" . $e->getMessage();
            echo "it got boned up, son";
        }
        $row;
        if(isset($theGoods)){
            foreach ($theGoods as $row){
                echo '<tr class="table">';
                echo "<td>";
                echo $row['firstname'];
                echo "</td>";
                echo "<td>";
                echo $row['lastname'];
                echo "</td>";
                echo "<td>";
                echo $row['dob'];
                echo "</td>";
                echo "<td>";
                echo $row['height'];
                echo "</td>";
                echo "</tr><br>";
            }
            
        }
        
        ?>
    
    
        </table>
        </div>
    </body>
    
</html>
