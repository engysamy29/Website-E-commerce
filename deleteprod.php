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
        
       // $result=mysqli_query($con,"DELETE FROM category WHERE c_id=$cid");
        // $result2=mysqli_query($con,"DELETE FROM product WHERE pcid=$cid");
        
        $result1=mysqli_query($con,"SELECT model_id FROM model WHERE mp_id=$pid");
         if($result1)
        {
            if(mysqli_num_rows($result1)>0)
            {
                 while($row=mysqli_fetch_array($result1))
                 {
                    $modelid=$row['model_id'];
                     $result2=mysqli_query($con,"SELECT i_id FROM item WHERE imodel_id=$modelid");
                     if($result2)
                     {
                        if(mysqli_num_rows($result2)>0)
                        {
                             while($row=mysqli_fetch_array($result2))
                             {
                                $iid=$row['i_id'];
                                $result3=mysqli_query($con,"SELECT i_id FROM item WHERE imodel_id=$mid");
                                if($result3)
                                {
                                            $result8=mysqli_query($con,"DELETE FROM branchinventory WHERE binvitem_id=$iid");
                                            $result50=mysqli_query($con,"DELETE FROM featureitem WHERE if_id=$iid");
                                            $result4=mysqli_query($con,"DELETE FROM item WHERE i_id=$iid");
                                            $result9=mysqli_query($con,"DELETE FROM liket WHERE li=$iid");
                                            $result10=mysqli_query($con,"DELETE FROM comment WHERE comi=$iid");
                                             if($result4 and $result8)
                                                {
                                                    output_msg("s","item of this product Deleted from Item and Branch inventory");
                                                    redirect(2,"viewprod.php");
                                                }
                                                else
                                                {
                                                    output_msg("f","Unexpected error");
                                                    redirect(2,"viewprod.php");
                                                }
                                }
                                  $result5=mysqli_query($con,"DELETE FROM model WHERE model_id=$mid");
                                   if($result5)
                                    {
                                        output_msg("s","Model of this product is deleted");
                                        redirect(2,"viewprod.php");
                                    }
                                    else
                                    {
                                        output_msg("f","Unexpected error");
                                        redirect(2,"viewprod.php");
                                    }
                             }
                        }
                     }
                   
                 }   
            }
        }
         $result6=mysqli_query($con,"DELETE FROM product WHERE p_id=$pid");
                    if($result6)
                        {
                            output_msg("s","Product is Deleted");
                            redirect(2,"viewprod.php");
                        }
                        else
                        {
                            output_msg("f","Unexpected error");
                            redirect(2,"viewprod.php");
                        }
       
    }
    else
    {
        output_msg("f","Unexpected error");
        redirect(2,"viewprod.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>