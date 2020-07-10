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
                            <h2 class="form-signin-heading">Item Color</h2>
                            <br>
                            
                         <?php
            
                $result_color=mysqli_query($con,"SELECT * FROM color");
                if($result_color)
                {
                    if(mysqli_num_rows($result_color)>0)
                    {
                        ?>
                            <label for="input">Color</label>
                            <select class="form-control" name="colorname">
                        <?php
                            while($row_color=mysqli_fetch_array($result_color))
                            {
                                ?>
                                    <option value="<?php echo $row_color['cl_id']; ?>" style="background: <?php echo $row_color['cl_name']; ?>"></option>
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
                    $colorname=validate($_POST['colorname']);
        

                    if($colorname==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"addcoloritem.php?$itemid=$itemid");
                    }
                    else
                    {
                       $result=mysqli_query($con,"INSERT INTO coloritem VALUES ('$itemid','$colorname')");
                       if($result)
                       {
                            
                            output_msg("s","Color addedto item");
                            redirect(2,"viewcolor.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"Addcoloritem.php?itemid=$itemid");
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