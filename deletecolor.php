<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['cid']))
    {
        $cid=intval($_GET['cid']);
        
        $result1=mysqli_query($con,"DELETE FROM color WHERE cl_id=$cid");
       if($result1)
        {
       output_msg("s","Color is deleted");
       redirect(2,"viewcolor.php");
        }
         else
       {
       output_msg("f","Unexpected2 error");
       redirect(2,"viewcolor.php");
        }
    }
    else
    {
        output_msg("f","Unexpected1 error");
        redirect(2,"viewcolor.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>