<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read - Lab 3 - Chris Brown</title>
        <link rel="stylesheet" href="bootstrap.min.css" />
        <style>
            body{
                background-color:whitesmoke;
            }
            .muh{
                width:75%;
                margin:3%;
            }
        </style>

    </head>
    <body>
        
        <div class="muh">
            <h2>What's in this particular dataset? :</h2><br>
        <table class="table table-hover">
            <th scope="col">ID #</th>
      <th scope="col">Corp</th>
      <th scope="col">Email</th>
      <th scope="col">Zipcode</th>
      <th scope="col">Owner</th>
      <th scope="col">Phone</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>

<?php
include 'dbconnect.php';
        include 'functions.php';
        try{
        $db = getDatabase();
        $theGoods = array();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $db->prepare("Select id, corp, email, zipcode, owner, phone from corps where id = :id");
        $id = filter_input(INPUT_GET, 'id');
                $binds = array(
                    ":id" => $id
                );
        if($statement->execute($binds) && $statement->rowCount() > 0){
         $theGoods = $statement->fetchAll(PDO::FETCH_ASSOC);   
        }
        }
        catch(PDOException $e){
             echo "<br>" . $e->getMessage();
            echo "it got boned up, son";
        }
        $row;
        
         if(isset($theGoods)){
            foreach ($theGoods as $row){
                echo '<tr class="table">';
                echo "<td>";
                echo $row['id'];
                echo "</td>";
                echo "<td>";
                echo $row['corp'];
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
                echo '<td><a href="update.php?id=';
                echo $row['id'];
                echo '">Update</a></td>';
                echo '<td><a href="delete.php?id=';
                echo $row['id'];
                echo '">Delete</a></td>';
            }
         }
        ?>
    
        </table>
             <br />
            <br />
            <h4><a href="view-allPage_CB.php">Return to the main page</a></h4>
        </div>
    </body>
</html>
        