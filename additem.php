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
            <h2 class="form-signin-heading">Add Item</h2>
           
                     <?php
            
                $result_mod=mysqli_query($con,"SELECT * FROM model");
                if($result_mod)
                {
                    if(mysqli_num_rows($result_mod)>0)
                    {
                        ?>
                            <label for="inputmodname">Model Name</label>
                            <select class="form-control" name="imid">
                        <?php
                            while($row_mod=mysqli_fetch_array($result_mod))
                            {
                                ?>
                                    <option value="<?php echo $row_mod['model_id']; ?>"><?php echo $row_mod['model_name']; ?></option>
                                <?php
                            }
                        ?>
                            </select>
                        <?php
                    }
                }
                ?>
            
            
            <br>
         <label for="inputitem">Item Description</label>
                <br>
            <textarea name="itemdesc"  id="inputitem" rows="4" class="form-control"cols="35" required autofocus></textarea>
            <br>
            <label for="inputitemp">Item Price</label>
            <input type="number" id="inputitemp" name="itemprice" class="form-control"  required autofocus>
            <br>
            <label for="inputitemimage">item Image</label>
            <input type="file" id="inputitemimage" name="iimage" class="form-control"  required >
            <br>
            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add</button>
        </form>
        <?php
    }
    else
    {
     
        $imid=intval($_POST['imid']);
        $idesc=validate($_POST['itemdesc']);
        $itemp=intval($_POST['itemprice']);
        
        $iimage_name=time().$_FILES['iimage']['name'];
        $iimage_old_path=$_FILES['iimage']['tmp_name'];
        
        
        
        if($idesc!=NULL and $imid!=NULL and $iimage_old_path!=NULL and $itemp!=NULL)
        {
            $result=mysqli_query($con,"INSERT INTO item VALUES (NULL,'$idesc','$iimage_name','$itemp','$imid')");
            
            if($result)
            {
                move_uploaded_file($iimage_old_path,"../imgs/$iimage_name");
                redirect(2,"viewitem.php");
                output_msg("s","item Added");
            }
                else
            {
                output_msg("f","Unexpected Error");
                redirect(2,"additem.php");
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