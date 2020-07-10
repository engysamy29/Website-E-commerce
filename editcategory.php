<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['cid']))
    {
        $cid=intval($_GET['cid']);
        $result=mysqli_query($con,"SELECT * FROM category WHERE c_id=$cid");
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_array($result);
                
                if(!isset($_POST['submit']))
                {
                    ?>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?cid=$cid"; ?>" enctype="multipart/form-data">
                            <h2 class="form-signin-heading">Edit Category</h2>
                            <label for="inputcategory">Category Name</label>
                            <input value="<?php echo $row['c_name']; ?>" type="text" id="inputcategory" name="cname" class="form-control"   autofocus>
                            <br>
                            <label for="inputcategory">Category Description</label>
                            <input value="<?php echo $row['c_desc']; ?>" type="text" id="inputcategory" name="cdesc" class="form-control"   autofocus>
                            <br>
                             <label for="inputcatimage">Category Image</label>
                      <input type="file" id="inputcatimage" name="caatimg" class="form-control"  required >
                         <br>
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Edit</button>
                        </form>
                    <?php
                }
                else
                {
                    $cname=validate($_POST['cname']);
                    $cdesc=validate($_POST['cdesc']);
                    $cimage_name=time().$_FILES['caatimg']['name'];
                    $cimage_old_path=$_FILES['caatimg']['tmp_name'];
                    if($cname==NULL || $cdesc==NULL || $cimage_old_path==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"editcategory.php?cid=$cid");
                    }
                    else
                    {
                       $result=mysqli_query($con,"UPDATE category
                                                  SET
                                                  c_name='$cname',
                                                  c_desc='$cdesc',
                                                  c_img='$cimage_name'
                                                  WHERE c_id=$cid");
                       if($result)
                       {
                            move_uploaded_file($cimage_old_path,"../imgs/$cimage_name");
                            output_msg("s","Category Updated");
                            redirect(2,"viewcategory.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"editcategory.php?cid=$cid");
                       }
                    }
                }
            }
            else
            {
                output_msg("f","Unexpecteddddd error");
                redirect(2,"viewcategory.php");
            }
        }
        else
        {
            output_msg("f","Unexpected1 error");
            redirect(2,"viewcategory.php");
        }
    }
    else
    {
        output_msg("f","Unexpected2 error");
        redirect(2,"viewcategory.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>