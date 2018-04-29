<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Course Page -- Chris Brown -- SE266</title>
        <style>
            body{
                text-align: center;
                background-color:whitesmoke;
            }
            .wrapper{
                width:65%;
                float:left;
                color:#021310;
                border-style:solid;
                border-color:black;
                border-width:5px;
            }
            
        </style>
    </head>
    <body>
        <div class="wrapper">
        <?php
        // put your code here
        echo '<h2>Chris Brown - PHP SE266 - Main Course Page</h2><br /><a href ="https://github.com/beeeeez/PHPCLASS_CB.git">GITHUB REPO</a>';
        echo '<hr /><h2>Three places to learn PHP : </h2><ul><li><a href="https://www.w3schools.com/php/default.asp">W3 Schools : PHP</li>';
        echo '<li><a href="https://www.codecademy.com/">Code Academy</a></li>';
        echo '<li><a href="https://www.tutorialspoint.com/php/index.htm">Tutorials Point</a></li></ul><hr />';
        
            $file = "index.php";
$mod_date=date("F d Y h:i:s A", filemtime($file));

echo "Last modified $mod_date<hr />";
        
        echo '<h3>Week 1 Lab -- Credit Card</h3><a href="http://ict.neit.edu/001400553/se266/week1/lab1_CB_creditcard.php">Link to Solution</a><br/>';
        echo '<a href="http://ict.neit.edu/001400553/se266/week1/lab1_CB_creditcard.zip">Link to Zipped Solution</a><hr />';
        echo '<h3>Week 2 Lab -- Add/View SQL Pages</h3><a href="http://ict.neit.edu/001400553/se266/lab2_cb/lab2_CB.zip">Link to Zipped Solution</a><hr/>';
        
        
        
        
        
        ?>
            <h3>Week 3 Lab -- Update/Insert/Delete SQL Pages</h3>
            <a href="http://ict.neit.edu/001400553/se266/lab3_cb/view-allPage_CB.php">Link to Solution</a><br />
            <a href="http://ict.neit.edu/001400553/se266/lab3_cb/lab3_cb.zip">Link to Zipped Solution</a><hr />
            <h3>Week 4 Lab -- Sort/Filter SQL Pages</h3>
            <a href="http://ict.neit.edu/001400553/se266/lab4_cb/index.php">Link to Solution</a><br />
            <a href="http://ict.neit.edu/001400553/se266/lab4_cb/lab4_cb.zip">Link to Zipped Solution</a><hr />
            <h3>Week 5 Lab -- Login/Batch Processing/Search Pages</h3>
            <a href="http://ict.neit.edu/001400553/se266/lab5_cb/login.php">Link to Solution</a><br />
            <a href="http://ict.neit.edu/001400553/se266/lab5_cb/lab5_cb.zip">Link to Zipped Solution</a><hr />
        </div>
    </body>
</html>
