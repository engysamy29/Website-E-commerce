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
        $result=mysqli_query($con,"SELECT * FROM feature WHERE f_id=$fid");
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_array($result);
                
                if(!isset($_POST['submit']))
                {
                    ?>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?fid=$fid"; ?>" enctype="multipart/form-data">
                            <h2 class="form-signin-heading">Edit Feature</h2>
                            <label for="inputcategory">Feature Name</label>
                            <input value="<?php echo $row['f_name']; ?>" type="text" id="inputfeature" name="fname" class="form-control"   autofocus>
                            <br>
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Edit</button>
                        </form>
                    <?php
                }
                else
                {
                    $fname=validate($_POST['fname']);
                    if($fname==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"editfeature.php?fid=$fid");
                    }
                    else
                    {
                       $result=mysqli_query($con,"UPDATE feature
                                                  SET
                                                  f_name='$fname'
                                                  WHERE f_id=$fid");
                       if($result)
                       {
                            output_msg("s","Feature Updated");
                            redirect(2,"viewfeature.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"editfeature.php?fid=$fid");
                       }
                    }
                }
            }
            else
            {
                output_msg("f","Unexpected4 error");
                redirect(2,"viewfeature.php");
            }
        }
        else
        {
            output_msg("f","Unexpected1 error");
            redirect(2,"viewfeature.php");
        }
    }
    else
    {
        output_msg("f","Unexpected2 error");
        redirect(2,"viewfeature.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>