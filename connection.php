<?php
ini_set('display_errors',"1");
    $servername="localhost";
    $username="root";
    $password="";
    $db_name="cabinetveterinar";
    $conn= mysqli_connect($servername,$username,$password,$db_name);
    if(!$conn){
       die("Connection failed".mysqli_connect_error()); 
    }
    echo "";
?>