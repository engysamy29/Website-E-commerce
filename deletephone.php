<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['phone']))
    {
        $phone=intval($_GET['phone']);
        
        $result1=mysqli_query($con,"DELETE FROM branchnumber WHERE bn_phonenum=$phone");
       if($result1)
        {
       output_msg("s","This Phone Number is Deleted from BranchNumber");
       redirect(2,"viewphone.php");
        }
         else
       {
       output_msg("f","Unexpected2 error");
       redirect(2,"viewphone.php");
        }
    }
    else
    {
        output_msg("f","Unexpected1 error");
        redirect(2,"viewphone.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>