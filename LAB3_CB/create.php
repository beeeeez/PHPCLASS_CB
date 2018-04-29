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
        </style>

    </head>
    <body>
        <div class="muh">
            <?php
             include 'dbconnect.php';
             include 'functions.php';
             if(isPostRequest() == false){
             echo '
            <h2>Create a new entry</h2><br />
            <form method="post" action="#">
                <h4>Corporation Name:</h4>
                <input type="text" value="" class="textbox" name="corp" /><br /><br />
                  <h4>Email:</h4>
                <input type="text" value="" class="textbox" name="email" /><br /><br />
                  <h4>Zip Code:</h4>
                <input type="text" value="" class="textbox" name="zipcode" /><br /><br />
                  <h4>Owner:</h4>
                <input type="text" value="" class="textbox" name="owner" /><br /><br />
                  <h4>Phone Number:</h4>
                  <input type="text" value="" class="textbox" name="phone" /><br /><br />
            <input type="submit"  value="Create a new entry!" />
            </form> ';
             }
        else {
              $db = getDatabase();
              $theGoods = array();
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $statement = $db->prepare("Insert Into corps (corp, email, zipcode, owner, phone ) Values (:corp, :email, :zipcode, :owner, :phone)");

                   $binds = array(
              ":corp" => $_POST['corp'],
              ":email" => $_POST['email'],
              ":zipcode" => $_POST['zipcode'],
              ":owner" => $_POST['owner'],
              ":phone" => $_POST['phone']       
             );             try{
                      if($statement->execute($binds) && $statement->rowCount() > 0){
                        echo '<h4>Record Created Successfully!</h4>';
                        }
                                }
                    catch(PDOException $e){
                              echo "<br>" . $e->getMessage();
                             echo "it got boned up, son";
                         }
                           }
        
              ?><br />
            <h4><a href="view-allPage_CB.php">Return to the main page</a></h4>
        </div>
    </body>
</html>