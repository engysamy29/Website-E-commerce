<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['branchid']))
    {
        $branchid=intval($_GET['branchid']);
        
        $result1=mysqli_query($con,"DELETE FROM branch WHERE b_id=$branchid");
        $result2=mysqli_query($con,"DELETE FROM branchinventory WHERE bi_id=$branchid");
        $result3=mysqli_query($con,"DELETE FROM branchnumber WHERE bn_id=$branchid");
       if($result1 and $result2 and $result3)
        {
       output_msg("s","This Branch is Deleted from Branch,Branch Inventory and BranchNumber");
       redirect(2,"viewbranch.php");
        }
         else
       {
       output_msg("f","Unexpected2 error");
       redirect(2,"viewbranch.php");
        }
    }
    else
    {
        output_msg("f","Unexpected1 error");
        redirect(2,"viewbranch.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>