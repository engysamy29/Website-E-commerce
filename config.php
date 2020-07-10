<?php

function db_connect()
{
    $hostname="localhost";
    $db_username="root";
    $db_password=NULL;
    $db_name="e-commerce";
    
    $connection=@mysqli_connect($hostname,$db_username,$db_password,$db_name) or die("DB Connection Error");

    return $connection;
}

$con=db_connect();


?>