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
        
        if($aid==$_SESSION['a_id'])
        {
            $result=mysqli_query($con,"SELECT * FROM admin WHERE a_id=$aid");
            if($result)
            {
                if(mysqli_num_rows($result)>0)
                {
                    $row=mysqli_fetch_array($result);
                    
                    if(!isset($_POST['submit']))
                    {
                        ?>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?aid=$aid"; ?>">
                            <h2 class="form-signin-heading">Edit Profile</h2>
                            <label for="inputusername">Username</label>
                            <input value="<?php echo $row['a_name']; ?>" type="text" id="inputusername" name="ausername" class="form-control"  required autofocus>
                            <label for="inputemail">E-mail</label>
                            <input value="<?php echo $row['a_email']; ?>" type="email" name="aemail" id="inputemail" class="form-control"  required>
                            <br>
                            <button class="btn btn-lg btn-primary" type="submit" name="submit">Edit</button>
                        </form>
                        <?php
                    }
                    else
                    {
                        $ausername=validate($_POST['ausername']);
                        $aemail=validate($_POST['aemail']);
                        
                        $result=mysqli_query($con,"UPDATE admin SET a_name='$ausername',
                                                                    a_email='$aemail'
                                                                    WHERE a_id=$aid");
                        if($result)
                        {
                            $_SESSION['a_name']=$ausername;
                            $_SESSION['a_email']=$aemail;
                            output_msg("s","Profile Updated");
                            redirect(2,"profile.php?aid=$aid");
                        }
                        else
                        {
                            output_msg("f","Unexpected Error");
                            redirect(2,"profile.php?aid=$aid");
                        }
                    }
                }
            }
        }
        else
        {
            output_msg("f","Unexpected Error");
            session_destroy();
            redirect(2,"index.php");
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
        redirect(2,"index.php");
    }
    
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>