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
        $result=mysqli_query($con,"SELECT * FROM model WHERE model_id=$modid");
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_array($result);
                
                if(!isset($_POST['submit']))
                {
                    ?>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?modid=$modid"; ?>" enctype="multipart/form-data">
                            <h2 class="form-signin-heading">Edit model</h2>
                            <label for="inputmodel">Model Name</label>
                            <input value="<?php echo $row['model_name']; ?>" type="text" id="inputmodel" name="mname" class="form-control"   autofocus>
                            <br>
                             <label for="inputmimage">Model Image</label>
                      <input type="file" id="inputmimage" name="mimg" class="form-control"  required >
                         <br>
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Edit</button>
                        </form>
                    <?php
                }
                else
                {
                    $mname=validate($_POST['mname']);
                    $mimage_name=time().$_FILES['mimg']['name'];
                    $mimage_old_path=$_FILES['mimg']['tmp_name'];
                    if($mname==NULL || $mimage_old_path==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"editmodell.php?$modid=$modid");
                    }
                    else
                    {
                       $result=mysqli_query($con,"UPDATE model
                                                  SET
                                                  model_name='$mname',
                                                  model_img='$mimage_name'
                                                  WHERE model_id=$modid");
                       if($result)
                       {
                            move_uploaded_file($mimage_old_path,"../imgs/$mimage_name");
                            output_msg("s","Model Updated");
                            redirect(2,"viewmodel.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"editmodell.php?modid=$modid");
                       }
                    }
                }
            }
            else
            {
                output_msg("f","Unexpecteddddd error");
                redirect(2,"viewmodel.php");
            }
        }
        else
        {
            output_msg("f","Unexpected1 error");
            redirect(2,"viewmodel.php");
        }
    }
    else
    {
        output_msg("f","Unexpected2 error");
        redirect(2,"viewmodel.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>