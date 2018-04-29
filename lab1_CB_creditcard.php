<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lab 1 - Week 1 - Chris Brown</title>
        <style>
            table, th, td{
                border: 1px solid black;
            }
            
            
            </style>
    </head>
    <body>
        <form method="post" action="lab1_CB_creditcard.php">
            Amount Owed : <input type="text" value="1000" name="balance"/><br /><br />
            Interest Rate : %<input type="text" value="15" name="interest"/><br /><br />
            Monthly Payment : <input type="text" value="100" name="payment"/><br /><br />
            <input type="submit" value="Calculate" /> 
            
        </form>
        <br/>
        <hr/>
        
        
        <?php
        // put your code here
        if(isset($_POST['balance'])){
            
            
            
            if(is_numeric($_POST['balance']) && is_numeric($_POST['interest']) && is_numeric($_POST['payment']) ){
            echo '<br/><table><tr><th>Month</th><th>Interest Paid</th><th>Balance Total</th></tr>';   
                 
            $bal = $_POST['balance'];
            $staticBal =$_POST['balance'];
            $int = $_POST['interest']/100;
            $pay = $_POST['payment'];
            $month = 1;
            $totalIntPaid = 0;
            $totalPaid = 0;
            
            while ($bal > 0){
                
                $intPaid = $bal * ($int/12);
                $bal = $bal - $intPaid - $pay;
                $totalIntPaid = $totalIntPaid + $intPaid;
                $rIntPaid = Round($intPaid, 2);
                $rBal = Round($bal, 2);
                echo "<tr><td>$month</td><td>$rIntPaid</td>";
                
                if($bal > 0){
                echo "<td>$rBal</td></tr>";
                }
                
                else{
                    echo "<td>N/A</td></tr>";
                    $totalIntPaid = Round($totalIntPaid, 2) + $staticBal;
                     echo "</table><br/>Total Paid Over $month Months : $totalIntPaid";
                    
                }
                $month++;
                
            }
            
            }
            
            else{
                echo "You need to enter numbers into all of the fields.";
            }
        }
        
        ?>
    </body>
</html>
