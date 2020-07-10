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
            <h2 class="form-signin-heading">Add Model</h2>
            <label for="inputmodel">Modle Name</label>
            <input type="text" id="inputmodel" name="mname" class="form-control"  required autofocus>
                <br>
                     <?php
            
                $result_prod=mysqli_query($con,"SELECT * FROM product");
                if($result_prod)
                {
                    if(mysqli_num_rows($result_prod)>0)
                    {
                        ?>
                            <label for="inputprodname">Product Name</label>
                            <select class="form-control" name="mpid">
                        <?php
                            while($row_prod=mysqli_fetch_array($result_prod))
                            {
                                ?>
                                    <option value="<?php echo $row_prod['p_id']; ?>"><?php echo $row_prod['p_name']; ?></option>
                                <?php
                            }
                        ?>
                            </select>
                        <?php
                    }
                }
                ?>
            
            <br>
            <label for="inputmodelimage">Model Image</label>
            <input type="file" id="inputmodelimage" name="mimage" class="form-control"  required >
            <br>
            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add</button>
        </form>
        <?php
    }
    else
    {
       $mname=validate($_POST['mname']);
        $mpid=intval($_POST['mpid']);
        
        $mimage_name=time().$_FILES['mimage']['name'];
        $mimage_old_path=$_FILES['mimage']['tmp_name'];
        
        if($mname!=NULL and $mpid!=NULL and $mimage_old_path!=NULL)
        {
            $result=mysqli_query($con,"INSERT INTO model VALUES (NULL,'$mname','$mimage_name','$mpid')");
            
            if($result)
            {
               
                move_uploaded_file($mimage_old_path,"../imgs/$mimage_name");
                redirect(2,"viewmodel.php");
                output_msg("s","Model Added");
            }
                else
            {
                output_msg("f","Unexpected Error");
                redirect(2,"addmodel.php");
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