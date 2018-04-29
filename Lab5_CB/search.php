
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
            .form-thing{
                width:40%;
            }
            
            </style>
 </head>    
    <body>
<div class="muhh">
<a href="../index.php" class="btn btn-secondary">Return to Course Page</a><a href="logout.php" class="btn btn-secondary">Logout</a><br />  
    <div class="form-thing">
    <form action="#" method="POST" class="form-control">
        <label>School Name :</label>
        <input type="text" name="name" value="" /><br/>
        <label>City :</label>
        <input type="text" name="city" value="" /><br/>
        <label>State : </label>
        <select name="state"><br/>
            <option value="">All States</option>
        <?php
            session_start();
            include 'functions.php';
            checkLogin();
            
            $theGoods = getStates();
            $row;
            foreach($theGoods as $row){
                echo '<option value="';
                echo $row['state'];
                echo '">';
                echo $row['state'];
                echo '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Search" />
    </form></div><br />
   
    <table class="table table-hover"><th scope="row">School Name</th>
      <th scope="row">City</th>
      <th scope="row">State</th>
      
        
     <?php
    if(isPostRequest()){
        $theGoods = searchME($_POST['name'], $_POST['city'], $_POST['state']);              
    }
    else{
        $theGoods = searchME("", "", "");
    }
    

    foreach($theGoods as $row){
        echo '<tr class="table-primary">';
                 echo "<td>";
                echo $row['name'];
                echo "</td>";
                echo "<td>";
                echo $row['city'];
                echo "</td>";
                echo "<td>";
                echo $row['state'];
                echo "</td>";         
        echo"</tr>";
    }
    
    ?>
    </table>
    </div>
</body>

</html>

