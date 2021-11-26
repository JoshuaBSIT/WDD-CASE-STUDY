<?php
    //define constants
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_USER', 'root');
    DEFINE('DB_PASS', '');
    DEFINE('DB_NAME','it15_database');

    //establish connection
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Error connecting...'.mysqli_connect_error());
   /*
    if($con){
        echo'Successfully connected to database...';
    }else{
        echo'Cannot connect to the database...';
    } */
?>