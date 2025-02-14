<?php


    $host = "localhost";
    $username = "root";
    $password = "";

    $connection = mysqli_connect($host,$username,$password);

    if ($connection) {
       echo "Connected!";
    } 
    else echo "Connection Error!";
   

    $sql = "create database SAEwebsite";

    if (mysqli_query($connection, $sql))
    {
       echo "Database is created!!";
    }
    
    else echo "Database creation error!!";


?>