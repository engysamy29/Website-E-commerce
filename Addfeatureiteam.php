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
                            <h2 class="form-signin-heading">Item Feature</h2>
                            <label for="inputfv">Feature Value</label>
                            <input type="number" id="inputfv" name="fv" class="form-control"  required>
                            <br>
                         <?php
            
                $result_feature=mysqli_query($con,"SELECT * FROM feature");
                if($result_feature)
                {
                    if(mysqli_num_rows($result_feature)>0)
                    {
                        ?>
                            <label for="inputfeaturename">Feature Name</label>
                            <select class="form-control" name="featurename">
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
                         <br>
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add Feature to item</button>
                        </form>
                    <?php
                }
                else
                {
                    $featurevalue=validate($_POST['fv']);
                    $featurename=validate($_POST['featurename']);
                    

                    if($featurevalue==NULL || $featurename==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"Addfeatureitem.php?$itemid=$itemid");
                    }
                    else
                    {
                       $result=mysqli_query($con,"INSERT INTO featureitem VALUES ('$featurename','$itemid','$featurevalue')");
                       if($result)
                       {
                            
                            output_msg("s","Feature added to item");
                            redirect(2,"viewitem.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"Addfeatureitem.php?itemid=$itemid");
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