<?php

    $server="localhost";
    $username="root";
    $password="admin";
    $db="user_db";

    //create db connection
    $conn=mysqli_connect($server,$username,$password,$db);

    //check connection
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
    //echo "Connected successfully";
    return $conn;





?>