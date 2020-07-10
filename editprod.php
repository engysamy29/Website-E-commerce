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
        $result=mysqli_query($con,"SELECT * FROM product WHERE p_id=$pid");
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_array($result);
                
                if(!isset($_POST['submit']))
                {
                    ?>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?pid=$pid"; ?>" enctype="multipart/form-data">
                            <h2 class="form-signin-heading">Edit Product</h2>
                            <label for="inputproduct">Product Name</label>
                            <input value="<?php echo $row['p_name']; ?>" type="text" id="inputproduct" name="pname" class="form-control"   autofocus>
                            <br>
                             <label for="inputpimage">Product Image</label>
                      <input type="file" id="inputpimage" name="pimg" class="form-control"  required >
                         <br>
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Edit</button>
                        </form>
                    <?php
                }
                else
                {
                    $pname=validate($_POST['pname']);
                    $pimage_name=time().$_FILES['pimg']['name'];
                    $pimage_old_path=$_FILES['pimg']['tmp_name'];
                    if($pname==NULL || $pimage_old_path==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"editprod.php?pid=$pid");
                    }
                    else
                    {
                       $result=mysqli_query($con,"UPDATE product
                                                  SET
                                                  p_name='$pname',
                                                  p_img='$pimage_name'
                                                  WHERE p_id=$pid");
                       if($result)
                       {
                            move_uploaded_file($pimage_old_path,"../imgs/$pimage_name");
                            output_msg("s","Product Updated");
                            redirect(2,"viewprod.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"editprod.php?pid=$pid");
                       }
                    }
                }
            }
            else
            {
                output_msg("f","Unexpecteddddd error");
                redirect(2,"viewprod.php");
            }
        }
        else
        {
            output_msg("f","Unexpected1 error");
            redirect(2,"viewprod.php");
        }
    }
    else
    {
        output_msg("f","Unexpected2 error");
        redirect(2,"viewprod.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>