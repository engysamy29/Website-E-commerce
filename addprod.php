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
            <h2 class="form-signin-heading">Add Product</h2>
            <label for="inputproduct">Product Name</label>
            <input type="text" id="inputproduct" name="pname" class="form-control"  required autofocus>
                <br>
                     <?php
            
                $result_cat=mysqli_query($con,"SELECT * FROM category");
                if($result_cat)
                {
                    if(mysqli_num_rows($result_cat)>0)
                    {
                        ?>
                            <label for="inputprodname">Category Name</label>
                            <select class="form-control" name="pcid">
                        <?php
                            while($row_cat=mysqli_fetch_array($result_cat))
                            {
                                ?>
                                    <option value="<?php echo $row_cat['c_id']; ?>"><?php echo $row_cat['c_name']; ?></option>
                                <?php
                            }
                        ?>
                            </select>
                        <?php
                    }
                }
                ?>
            
            <br>
            <label for="inputprodimage">Product Image</label>
            <input type="file" id="inputprodimage" name="pimage" class="form-control"  required >
            <br>
            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add</button>
        </form>
        <?php
    }
    else
    {
       $pname=validate($_POST['pname']);
        $pcid=intval($_POST['pcid']);
        
        $pimage_name=time().$_FILES['pimage']['name'];
        $pimage_old_path=$_FILES['pimage']['tmp_name'];
        
        if($pname!=NULL and $pcid!=NULL and $pimage_old_path!=NULL)
        {
            $result=mysqli_query($con,"INSERT INTO product VALUES (NULL,'$pname','$pimage_name','$pcid')");
            
            if($result)
            {
               
                move_uploaded_file($pimage_old_path,"../imgs/$pimage_name");
                redirect(2,"viewprod.php");
                output_msg("s","product Added");
                
            }
            else
            {
                output_msg("f","Unexpected Error");
                redirect(2,"addprod.php");
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