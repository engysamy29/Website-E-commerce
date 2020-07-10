<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['itemid']))
    {
        $itemid=intval($_GET['itemid']);
        
        $result1=mysqli_query($con,"DELETE FROM item WHERE i_id=$itemid");
        $result2=mysqli_query($con,"DELETE FROM branchinventory WHERE binvitem_id=$itemid");
        $result20=mysqli_query($con,"DELETE FROM featureitem WHERE if_id=$itemid");
        $result3=mysqli_query($con,"DELETE FROM liket WHERE li=$itemid");
        $result4=mysqli_query($con,"DELETE FROM comment WHERE comi=$itemid");
       if($result1 and $result2)
        {
       output_msg("s","item of this model is Deleted from Item,Branch inventory and Featuresitem");
       redirect(2,"viewitem.php");
        }
         else
       {
       output_msg("f","Unexpected2 error");
       redirect(2,"viewitem.php");
        }
    }
    else
    {
        output_msg("f","Unexpected1 error");
        redirect(2,"viewitem.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>