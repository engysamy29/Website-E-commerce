<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['pid']))
    {
        $pid=intval($_GET['pid']);
        
        $result1=mysqli_query($con,"DELETE FROM paytype WHERE pt_id=$pid");
       if($result1)
        {
       output_msg("s","Payment Type is deleted");
       redirect(2,"viewpayment.php");
        }
         else
       {
       output_msg("f","Unexpected2 error");
       redirect(2,"viewpayment.php");
        }
    }
    else
    {
        output_msg("f","Unexpected1 error");
        redirect(2,"viewpayment.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>