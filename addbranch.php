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
            <h2 class="form-signin-heading">Add Branch</h2>
            <label for="inputbranch">Branch Name</label>
            <input type="text" id="inputbranch" name="branchname" class="form-control"  required autofocus>
                <br>
            <label for="inputbranchCity">Branch City</label>
           <input type="text" id="inputbranchCity" name="branchcity" class="form-control"  required autofocus>
            <br>
            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add</button>
        </form>
        <?php
    }
    else
    {
        $branchname=validate($_POST['branchname']);
        $branchcity=validate($_POST['branchcity']);
        
        
        if($branchname!=NULL and $branchcity!=NULL)
        {
            $result=mysqli_query($con,"INSERT INTO branch VALUES (NULL,'$branchname','$branchcity')");
            
            if($result)
            {
                redirect(2,"viewbranch.php");
                output_msg("s","Branch Added");
                
            }
            else
            {
                output_msg("f","Unexpected Error");
                redirect(2,"addbranch.php");
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