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
            <h2 class="form-signin-heading">Add PaymentType</h2>
            <label for="inputpayment">PaymentType Name</label>
            <input type="text" id="inputpayment" name="pname" class="form-control"  required autofocus>
                <br>
            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add</button>
        </form>
        <?php
    }
    else
    {
        $pname=validate($_POST['pname']);
        
        
        if($pname!=NULL)
        {
            $result=mysqli_query($con,"INSERT INTO paytype VALUES (NULL,'$pname')");
            
            if($result)
            {
                redirect(2,"viewpayment.php");
                output_msg("s","Payment Added");
                
            }
            else
            {
                output_msg("f","Unexpected Error");
                redirect(2,"addpayment.php");
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