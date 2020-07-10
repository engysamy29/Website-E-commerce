<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    if(isset($_GET['branchid']))
    {
        $branchid=intval($_GET['branchid']);
                if(!isset($_POST['submit']))
                {
                    ?>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?branchid=$branchid"; ?>" enctype="multipart/form-data">
                            <h2 class="form-signin-heading">Add phone Number to Branch</h2>
                            <label for="inputphone">Phone Number</label>
                            <input type="number" id="inputphone" name="phone" class="form-control"  required>
                            <br>
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Add Phone Number</button>
                        </form>
                    <?php
                }
                else
                {
                    $branchphone=validate($_POST['phone']);
                   
                    

                    if($branchphone==NULL )
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"addbranchnumber.php?$=$branchid");
                    }
                    else
                    {
                       $result=mysqli_query($con,"INSERT INTO branchnumber VALUES ('$branchid','$branchphone')");
                       if($result)
                       {
                            
                            output_msg("s","Phone added to Branch");
                            redirect(2,"viewbranch.php");
                       }
                       else
                       {
                            output_msg("f","Unexpected3 error");
                            redirect(2,"addbranchnumber.php?itemid=$branchid");
                       }
                    }
                }
           
           
        
        
    }
    else
    {
        output_msg("f","Unexpected2 error");
        redirect(2,"viewbranch.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>