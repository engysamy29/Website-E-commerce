<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['phone']))
    {
        $phone=intval($_GET['phone']);
        $result=mysqli_query($con,"SELECT * FROM branchnumber WHERE bn_phonenum=$phone");
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_array($result);
                $bi=$row['bn_id'];
                
                if(!isset($_POST['submit']))
                {
                    ?>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?phone=$phone"; ?>" enctype="multipart/form-data">
                            <h2 class="form-signin-heading">Edit Category</h2>
                            
                            <label for="inputp">phone Number</label>
                            <input type="number" id="inputp" name="phone" class="form-control"   autofocus>
                           
                         <br>
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Edit</button>
                        </form>
                    <?php
                }
                else
                {
                    $pho=validate($_POST['phone']);
                    
                    if($pho==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"editphone.php?phone=$phone");
                    }
                    else
                    {
                       $result=mysqli_query($con,"UPDATE branchnumber
                                                  SET
                                                  bn_phonenum='$pho'
                                                  WHERE bn_phonenum=$phone");
                       if($result)
                       {
                            
                            output_msg("s","Phone  Updated");
                            redirect(2,"viewphone.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"editphone.php?phone=$phone");
                       }
                    }
                }
            }
            else
            {
                output_msg("f","Unexpecteddddd error");
                redirect(2,"viewphone.php");
            }
        }
        else
        {
            output_msg("f","Unexpected1 error");
            redirect(2,"viewphone.php");
        }
    }
    else
    {
        output_msg("f","Unexpected2 error");
        redirect(2,"viewphone.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>