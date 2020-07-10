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
                    ?>
                    <div class="jumbotron">
                        <h3>Username : <?php echo $row['a_name']; ?></h3>
                        <p>E-mail : <?php echo $row['a_email']; ?></p>
                        <p><a class="btn btn-primary btn-lg" href="editprofile.php?aid=<?php echo $aid; ?>" role="button">Edit</a></p>
                    </div>
                    <?php
                }
                else
                {
                    output_msg("f","Unexpected Error");
                    redirect(2,"index.php");
                }
            }
            else
            {
                output_msg("f","Unexpected Error");
                redirect(2,"index.php");
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