<!DOCTYPE html>
<html><!-- FIX THIS PAGEEEEE-->
    <head>
        <meta charset="UTF-8">
        <title>Update - Lab 3 - Chris Brown</title>
        <link rel="stylesheet" href="bootstrap.min.css" />
        <style>
            body{
                background-color:whitesmoke;
            }
            .muh{
                width:75%;
                margin:3%;
            }
            .ugh{
                visibility: hidden;
            }
            .textbox{
                width:50%;
            }
        </style>

    </head>
    <body>
        <div class="muh">
<?php
include 'dbconnect.php';
        include 'functions.php';
        

       $db = getDatabase();
        $theGoods = array();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if(isPostRequest()){
            $id = $_POST['id'];
            $statement = $db->prepare("update corps set corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
                $binds = array(
                    ":id" => $id,
                    ":corp" => $_POST['corporation'],
                    ":email" => $_POST['email'],
                    ":zipcode" => $_POST['zipcode'],
                    ":owner" => $_POST['owner'],
                    ":phone" => $_POST['phone']                            
                );
        if($statement->execute($binds)){
            echo "Updated Sucessfully!<br /><br />";
        }
        
        }
        else{
                   $id = filter_input(INPUT_GET, 'id');
        }
     
            try{
        
        $statement = $db->prepare("Select corp, email, zipcode, owner, phone from corps where id = :id");
        
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

            
            foreach ($theGoods as $row){
                echo 'ID # :  ';
                echo $id;
                echo '<br /><br />
            <form method="post" action="update.php">
            Corporation :  <input type="text" class="textbox" value="';
                echo $row['corp'];
                echo '" name="corporation"/><br /><br />
            Email : <input type="text" class="textbox"  value="';
                echo $row['email'];
                echo '" name="email"/><br /><br />
            Zipcode : <input type="text" class="textbox"  value="';
                echo $row['zipcode'];
                echo '" name="zipcode"/><br /><br />
            Owner :  <input type="text" class="textbox"  value="';
                echo $row['owner'];
                echo '" name="owner"/><br /><br />
            Phone : <input type="text" class="textbox"  value="';
                echo $row['phone'];
                echo '" name="phone"/><br /><br />';
                echo '<input type="text" value="';
                echo $id;
                echo '" class="ugh" name="id"><br />';
                echo '<input type="submit"  value="Update the Database!" /> ';
                
            
        }
        


?>
            <br />
            <br />
            <h4><a href="view-allPage_CB.php">Return to the main page</a></h4>
        </div>
    </body>
</html>

