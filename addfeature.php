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
            <h2 class="form-signin-heading">Add Feature</h2>
            <label for="inputcategory">Feature Name</label>
            <input type="text" id="inputfname" name="fname" class="form-control"  required autofocus>
                <br>
            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add</button>
        </form>
        <?php
    }
    else
    {
        $fname=validate($_POST['fname']);
        
        if($fname!=NULL)
        {
            $result=mysqli_query($con,"INSERT INTO feature VALUES (NULL,'$fname')");
            
            if($result)
            {
                redirect(2,"viewfeature.php");
                output_msg("s","Feature Added");
                
            }
            else
            {
                output_msg("f","Unexpected Error");
                redirect(2,"addfeature.php");
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