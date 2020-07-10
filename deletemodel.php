<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['modid']))
    {
        $modid=intval($_GET['modid']);
        
       // $result=mysqli_query($con,"DELETE FROM category WHERE c_id=$cid");
        // $result2=mysqli_query($con,"DELETE FROM product WHERE pcid=$cid");
        
        $result1=mysqli_query($con,"SELECT i_id FROM item WHERE imodel_id=$modid");
         if($result1)
        {
            if(mysqli_num_rows($result1)>0)
            {
                 while($row=mysqli_fetch_array($result1))
                 {
                        $itemid=$row['i_id'];
                        $result8=mysqli_query($con,"DELETE FROM branchinventory WHERE binvitem_id=$itemid");
                        $result50=mysqli_query($con,"DELETE FROM featureitem WHERE if_id=$iid");
                        $result4=mysqli_query($con,"DELETE FROM item WHERE i_id=$itemid");
                        $result9=mysqli_query($con,"DELETE FROM liket WHERE li=$itemid");
                        $result10=mysqli_query($con,"DELETE FROM comment WHERE comi=$itemid");
                         if($result4 and $result8)
                            {
                                output_msg("s","item of this model is Deleted from Item and Branch inventory");
                                redirect(2,"viewmodel.php");
                            }
                            else
                            {
                                output_msg("f","Unexpected error");
                                redirect(2,"viewmodel.php");
                            }
                   
                 }   
            }
        }
         $result6=mysqli_query($con,"DELETE FROM model WHERE model_id=$modid");
                    if($result6)
                        {
                            output_msg("s","Model is Deleted");
                            redirect(2,"viewmodel.php");
                        }
                        else
                        {
                            output_msg("f","Unexpected error");
                            redirect(2,"viewmodel.php");
                        }
       
    }
    else
    {
        output_msg("f","Unexpected error");
        redirect(2,"viewmodel.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>