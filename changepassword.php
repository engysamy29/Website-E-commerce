<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    
    
    if(isset($_GET['aid']))
    {
        $aid=intval($_GET['aid']);
        
        if(!isset($_POST['submit']))
        {
            ?>
            <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?aid=$aid"; ?>">
                <h2 class="form-signin-heading">Change Password</h2>
                <label for="inputpassword">Password</label>
                <input type="password" id="inputpassword" name="apassword" class="form-control"  required autofocus>
                <label for="inputpassword">Confirm Password</label>
                <input type="password" id="inputpassword" name="aconfirmpassword" class="form-control"  required autofocus>
                <br>
                <button class="btn btn-lg btn-primary" type="submit" name="submit">Edit</button>
            </form>
            <?php
        }
        else
        {
            $apassword=validate($_POST['apassword']);
            $aconfirmpassword=validate($_POST['aconfirmpassword']);
            
            if($apassword==NULL or $aconfirmpassword==NULL)
            {
                output_msg("f","Please fill all data");
                redirect(2,"changepassword.php?aid=$aid");
            }
            else
            {
                $apassword_enc=enc_pass($apassword);
                $aconfirmpassword_enc=enc_pass($aconfirmpassword);
                
                if($apassword_enc==$aconfirmpassword_enc)
                {
                    $result=mysqli_query($con,"UPDATE admin
                                           SET
                                           a_pass='$apassword_enc'
                                           WHERE a_id=$aid");
                    if($result)
                    {
                        output_msg("s","Password Changed");
                        redirect(2,"profile.php?aid=$aid");
                    }
                    else
                    {
                        output_msg("f","Unexpected Error");
                        redirect(2,"changepassword.php?aid=$aid");
                    }
                }
                else
                {
                   
                    output_msg("f","Password field does not match confirm password field");
                    redirect(2,"changepassword.php?aid=$aid");
                }
                
            }
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
        redirect(2,"changepassword.php?aid=$aid");
    }

    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>