<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */

include 'dbconnect.php';


function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function loginAttempt($user, $pass){
   if($user != "" && $pass != ""){
                     
       try{
       $db = getDatabase();
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $theGoods = array();
       $statement = $db->prepare("SELECT userName, passWord FROM myBuddies WHERE 0=0 AND userName = :user");
       $binds = array(
                    ":user" => $user,                        
                );
        if($statement->execute($binds) && $statement->rowCount() > 0){
         $theGoods = $statement->fetch(PDO::FETCH_ASSOC);   
        }
        else{
           $_SESSION['login'] = false;                      
       }
       }          
        catch(PDOException $e){
            
        }
       if(isset($theGoods['passWord']) && $theGoods['passWord'] == sha1($pass)){
           $_SESSION['login'] = true;           
       }
       else{
        
           $_SESSION['login'] = false;     
           echo "<br /> Incorrect Username and Password <br />";           
       }
        
   }     
    else {
        echo "<br /> Incorrect Username and Password  <br />";
    }
}

function dbChangeUp(){
    try{
   $db = getDatabase();
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $theGoods = array();
   $statement = $db->prepare("Delete from schools");

   if($statement->execute()){
         $theGoods = $statement->fetch(PDO::FETCH_ASSOC);   
   }
   }
   catch(PDOException $e){
             echo "<br>" . $e->getMessage();
            echo "it got boned up, son";
        }
    
$file = fopen ('./uploads/'.$_FILES['file1']['name'], 'rb');
$db = getDatabase();
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $theGoods = array();
while (!feof($file)) {
   $school = fgetcsv($file);
   if(($school[0]) == "INSTNM" || $school[0] == ""){}
   else{
   //echo ($school[0]) . "<br />";
   $name = ($school[0]);
   $city = ($school[1]);
   $state = ($school[2]);
   try{
   
   $statement = $db->prepare("Insert Into schools (name, city, state) VALUES (:name, :city, :state)");
   $binds = array(
                    ":name" => $name,      
                    ":city" => $city,
                    ":state" => $state 
                );
   if($statement->execute($binds)){
         $theGoods = $statement->fetch(PDO::FETCH_ASSOC);   
         header('Location: search.php');
   }
   }
   catch(PDOException $e){
             echo "<br>" . $e->getMessage();
            echo "it got boned up, son";
        }
   }
}  
fclose($file);

    
}

function searchME($name, $city, $state){
    $binds = array();
    $nameString = "";
    $cityString = "";
    $stateString = "";
    
    
    if($name != ""){
        $nameString = " AND name LIKE :name ";
        $name = '%'.$name.'%';
        $binds += array(":name" => $name);
    }
    if($city != ""){
        $cityString = " AND city LIKE :city ";
        $city = '%'.$city.'%';
        $binds += array(":city" => $city);
    }
    if($state != ""){
        $stateString = " AND state = :state ";
        $binds += array(":state" => $state);
    }
    
    try{
        $db = getDatabase();
        $theGoods = array();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $db->prepare("SELECT name, city, state FROM schools WHERE 0=0 ".$nameString.$cityString.$stateString);
        if($statement->execute($binds) && $statement->rowCount() > 0){
         $theGoods = $statement->fetchAll(PDO::FETCH_ASSOC);   
        }
        }
        catch(PDOException $e){
             echo "<br>" . $e->getMessage();
            echo "it got boned up, son";
        }
    return $theGoods;
    
}

function getStates(){
    try{
        $db = getDatabase();
        $theGoods = array();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $db->prepare("Select Distinct state From schools where 0=0");
        if($statement->execute() && $statement->rowCount() > 0){
         $theGoods = $statement->fetchAll(PDO::FETCH_ASSOC);   
        }
        }
        catch(PDOException $e){
             echo "<br>" . $e->getMessage();
            echo "it got boned up, son";
        }
    return $theGoods;
    
    
}


function checkLogin(){
   if(isset ($_SESSION['login']) && ($_SESSION['login']) == true){
   }
   else{
       session_destroy();
       header('Location: login.php');
   }   
    
}

function logOut(){
    
    session_destroy();
       header('Location: login.php');
    
}