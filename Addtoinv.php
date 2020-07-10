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
                if(!isset($_POST['submit']))
                {
                    ?>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?itemid=$itemid"; ?>" enctype="multipart/form-data">
                            <h2 class="form-signin-heading">Item Inventory</h2>
                            <label for="inputitemp">Item price</label>
                            <input type="number" id="inputitemp" name="itemprice" class="form-control"  required>
                            <br>
                             <label for="inputitemimage">Item Quantity</label>
                      <input type="number" id="inputitemquantity" name="itemquantity" class="form-control"  required >
                         <?php
            
                $result_branch=mysqli_query($con,"SELECT * FROM branch");
                if($result_branch)
                {
                    if(mysqli_num_rows($result_branch)>0)
                    {
                        ?>
                            <label for="inputbranchname">Branch Name</label>
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
                         <br>
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add to INV</button>
                        </form>
                    <?php
                }
                else
                {
                    $itemprice=validate($_POST['itemprice']);
                    $itemquantity=validate($_POST['itemquantity']);
                    $itembranch=validate($_POST['branchname']);
                    

                    if($itemprice==NULL || $itemquantity==NULL || $itembranch==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"Addtoinv.php?$itemid=$itemid");
                    }
                    else
                    {
                       $result=mysqli_query($con,"INSERT INTO branchinventory VALUES ('$itembranch','$itemid','$itemquantity','$itemprice')");
                       if($result)
                       {
                            
                            output_msg("s","Item added to inventory");
                            redirect(2,"viewitem.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"Addtoinv.php?itemid=$itemid");
                       }
                    }
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