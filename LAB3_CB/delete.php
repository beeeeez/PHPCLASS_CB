<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete - Lab 3 - Chris Brown</title>
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

<?php

include 'dbconnect.php';
        include 'functions.php';
        try{
        $db = getDatabase();
        $theGoods = array();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id = filter_input(INPUT_GET, 'id');
        $statement = $db->prepare("Delete from corps where id = :id");
        $binds = array(
                    ":id" => $id
                );
        $check = false;
        if($statement->execute($binds) && $statement->rowCount() > 0){
         $check = true;
        }
        }
        catch(PDOException $e){
             echo "<br>" . $e->getMessage();
            echo "it got boned up, son";
        }
        if($check == true){
            echo "<h2>Record ";
            echo $id;
            echo " has been deleted!";
        }
        else{
            echo "There was a problem deleting that entry";
        }

?><br /><br />
         <h4><a href="view-allPage_CB.php">Return to the main page</a></h4>
    </body>
</html>