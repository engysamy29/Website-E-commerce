<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");



if(isset($_SESSION['log']))
{
    
    // logged in
    include_once("header.php");

    output_msg("s","Logged Out Successfuly");
    session_destroy();
    redirect(2,"index.php");
    //session_destroy();
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>