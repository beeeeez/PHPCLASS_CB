<?php

    include 'dbconnect.php';
    
    function gettheGoods($sortBy, $sortOrder, $filterBy, $searchParam){
        
        if($searchParam != ""){
           
            $whereString = " WHERE $filterBy LIKE :searchParam ";
             $searchParam = '%'.$searchParam.'%';
            $binds = array(
                    ":searchParam" => $searchParam,                        
                );
        }
        else{
            $whereString = "";
            $binds = array();
        }
        if($sortBy != "None"){
        $orderString = " ORDER BY $sortBy $sortOrder ";
        }
        else{
            $orderString = "";
        }
        
        try{
        $db = getDatabase();
        $theGoods = array();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $db->prepare("SELECT * FROM corps ".$whereString.$orderString);
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
?>