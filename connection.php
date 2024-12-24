<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="mystudent_record";

    $conn= mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        echo "Connection Failed!";
    }
?>