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
            <h2 class="form-signin-heading">Add color</h2>
            <label for="inputcolor">Color Name</label>
            <input type="color" id="inputcolor" name="cname" class="form-control" style="width: 100px;height: 100px;" required autofocus>
                <br>
            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add color</button>
        </form>
        <?php
    }
    else
    {
        $cname=$_POST['cname'];
        
        
        if($cname!=NULL)
        {
            $result=mysqli_query($con,"INSERT INTO color VALUES (NULL,'$cname')");
            
            if($result)
            {
                redirect(2,"viewcolor.php");
                output_msg("s","Color Added");
                
            }
            else
            {
                output_msg("f","Unexpected Error");
                redirect(2,"addcolor.php");
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