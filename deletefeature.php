<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['fid']))
    {
        $fid=intval($_GET['fid']);
        
        $result1=mysqli_query($con,"DELETE FROM feature WHERE f_id=$fid");
        $result2=mysqli_query($con,"DELETE FROM featureitem WHERE fi_id=$fid");
       if($result1 and $result2)
        {
       output_msg("s","Feature is Deleted from Feature and FeatureItem");
       redirect(2,"viewfeature.php");
        }
         else
       {
       output_msg("f","Unexpected2 error");
       redirect(2,"viewfeature.php");
        }
    }
    else
    {
        output_msg("f","Unexpected1 error");
        redirect(2,"viewfeature.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>