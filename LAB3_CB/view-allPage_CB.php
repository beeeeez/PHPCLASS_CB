<html>
    <head>
        <meta charset="UTF-8">
        <title>View All - Lab 3 - Chris Brown</title>
        <link rel="stylesheet" href="bootstrap.min.css" />
        <style>
            body{
                background-color:whitesmoke;
            }
            .muh{
                width:75%;
                margin:3%;
            }
        </style></style>

    </head>
    <body>
        
        <div class="muh">
            <h2>What's in the database? :</h2><br>
            <h4><a href="create.php">Create a new entry</a>  |   <a href="../index.php">Return to Course Page</a></h4><br />
        <table class="table table-hover">
      <th scope="col">Corporation : </th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
        
        <?php
        include 'dbconnect.php';
        include 'functions.php';
        try{
        $db = getDatabase();
        $theGoods = array();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $db->prepare("Select id, corp from corps");
        if($statement->execute() && $statement->rowCount() > 0){
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
                echo $row['corp'];
                echo "</td>"; 
                echo '<td><a href="read.php?id=';
                echo $row['id'];
                echo '">Read</a></td>';                
                echo '<td><a href="update.php?id=';
                echo $row['id'];
                echo '">Update</a></td>';
                echo '<td><a href="delete.php?id=';
                echo $row['id'];
                echo '">Delete</a></td>';
            }
            
        }
                
        
        ?>
        
        
        </div>
    </body>
</html>