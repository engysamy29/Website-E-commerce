<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(!isset($_POST['submit']))
    {
        ?>
        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
            <h2 class="form-signin-heading">Add Category</h2>
            <label for="inputcategory">Category Name</label>
            <input type="text" id="inputcategory" name="cname" class="form-control"  required autofocus>
                <br>
            <label for="inputcategory">Category Description</label>
           <!-- <input type="text"  name="cname" class="form-control"  required autofocus> -->
                <br>
            <textarea name="cdesc"  id="inputcategory" rows="4" class="form-control"cols="35" required autofocus></textarea>
            <br>
                <label for="inputcatimage">Category Image</label>
            <input type="file" id="inputcatimage" name="catimg" class="form-control"  required >
            <br>
            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add</button>
        </form>
        <?php
    }
    else
    {
        $cname=validate($_POST['cname']);
        $cdesc=validate($_POST['cdesc']);
        
        $cimage_name=time().$_FILES['catimg']['name'];
        $cimage_old_path=$_FILES['catimg']['tmp_name'];
        
        
        if($cname!=NULL and $cdesc!=NULL and $cimage_old_path!=NULL)
        {
            $result=mysqli_query($con,"INSERT INTO category VALUES (NULL,'$cname','$cdesc','$cimage_name')");
            
            if($result)
            {
               
                move_uploaded_file($cimage_old_path,"../imgs/$cimage_name");
                redirect(2,"viewcategory.php");
                output_msg("s","Category Added");
                
            }
            else
            {
                output_msg("f","Unexpected Error");
                redirect(2,"addcategory.php");
            }
        }
        
        
        

    }
    
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>