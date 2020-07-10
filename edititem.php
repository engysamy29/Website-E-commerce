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
        $result=mysqli_query($con,"SELECT * FROM item WHERE i_id=$itemid");
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_array($result); //row feha array item
                
                if(!isset($_POST['submit']))
                {
                    ?>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?itemid=$itemid"; ?>" enctype="multipart/form-data">
                            <h2 class="form-signin-heading">Edit Item</h2>
                            <label for="inputitem">Item Description</label>
                            <input value="<?php echo $row['i_des']; ?>" type="text" id="inputitem" name="itemdesc" class="form-control"   autofocus>
                            <br>
                             <label for="inputitemimage">Item Image</label>
                      <input type="file" id="inputitemimage" name="itemimg" class="form-control"  required >
                         <br>
                            
                            <label for="inputitemprice">Item Price in Inventory</label>
                      <input type="number" id="inputitemprice" name="itemprice" class="form-control"  required >
                         <br>
                         <label for="inputitemprice1">Item Price</label>
                      <input type="number" id="inputitemprice1" name="itemprice1" class="form-control"  required >
                         <br>
                            <label for="inputitemquantity">Item Quantity</label>
                      <input type="number" id="inputitemquantity" name="itemquantity" class="form-control"  required >
                         <br>
                           
                            <?php
            
                $result_branch=mysqli_query($con,"SELECT * FROM branch");
                if($result_branch)
                {
                    if(mysqli_num_rows($result_branch)>0)
                    {
                        ?>
                            <label for="inputbranchname">Item is in which Branch:</label>
                            <select class="form-control" name="branchname">
                        <?php
                            while($row_branch=mysqli_fetch_array($result_branch))
                            {
                                ?>
                                    <option value="<?php echo $row_branch['b_id']; ?>"><?php echo $row_branch['b_name']; ?></option>
                                <?php
                            }
                        ?>
                            </select>
                        <?php
                    }
                }
                ?>
                   <?php
            
                $result_feature=mysqli_query($con,"SELECT * FROM feature");
                if($result_feature)
                {
                    if(mysqli_num_rows($result_feature)>0)
                    {
                        ?>
                            <label for="inputfeaturename">Which Feature to be edited:</label>
                            <select class="form-control" name="fname">
                        <?php
                            while($row_feature=mysqli_fetch_array($result_feature))
                            {
                                ?>
                                    <option value="<?php echo $row_feature['f_id']; ?>"><?php echo $row_feature['f_name']; ?></option>
                                <?php
                            }
                        ?>
                            </select>
                        <?php
                    }
                }
                ?>
                 <label for="inputitemquantity">Item Feature Value</label>
                      <input type="number" id="inputitemfv" name="itemfv" class="form-control"  required >
                         <br>
                
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Edit</button>
                        </form>
                    <?php
                }
                else
                {
                    $itemdesc=validate($_POST['itemdesc']);
                    $itemimage_name=time().$_FILES['itemimg']['name'];
                    $itemimage_old_path=$_FILES['itemimg']['tmp_name'];
                    $itemprice=validate($_POST['itemprice']);
                    $itemquantity=validate($_POST['itemquantity']);
                    $itembranch=validate($_POST['branchname']);
                    $itemfeature=validate($_POST['itemfv']);
                    $featurename=validate($_POST['fname']);
                    $itemprice1=validate($_POST['itemprice1']);

                    if($itemdesc==NULL || $itemimage_old_path==NULL || $itemprice==NULL|| $itemquantity==NULL || $itembranch==NULL ||$itemfeature==NULL ||$featurename==NULL ||$itemprice1==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"edititem.php?$itemid=$itemid");
                    }
                    else
                    {
                       $result=mysqli_query($con,"UPDATE item
                                                  SET
                                                  i_des='$itemdesc',
                                                  i_imag='$itemimage_name',
                                                  i_price='$itemprice1'
                                                  WHERE i_id=$itemid");
                       $result2=mysqli_query($con,"UPDATE branchinventory
                                                  SET
                                                  quantity='$itemquantity',
                                                  price='$itemprice'
                                                  WHERE  binvitem_id=$itemid and binvitem_id=$itemid");
                       $result3=mysqli_query($con,"UPDATE featureitem
                                                  SET
                                                  value='$itemfeature'
                                                  WHERE  if_id=$itemid and fi_id=$featurename");
                       if($result)
                       {
                            move_uploaded_file($itemimage_old_path,"../imgs/$itemimage_name");
                            output_msg("s","Item Updated");
                            redirect(2,"viewitem.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"edititem.php?itemid=$itemid");
                       }
                    }
                }
            }
            else
            {
                output_msg("f","Unexpecteddddd error");
                redirect(2,"viewitem.php");
            }
        }
        else
        {
            output_msg("f","Unexpected1 error");
            redirect(2,"viewitem.php");
        }
    }
    else
    {
        output_msg("f","Unexpected2 error");
        redirect(2,"viewitem.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>