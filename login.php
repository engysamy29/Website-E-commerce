<?php

include_once("../framework/sitefunc.php");
include_once("../framework/config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.min.js"></script>
      <script src="../js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

    <?php
        if(!isset($_POST['submit']))
        {
            ?>
            
         
          <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <form class="dropdown-menu p-4">
  <div class="form-group">
    <label for="inputusername">Admin name</label>
    <input type="text" name="username" class="form-control" id="exampleDropdownFormEmail2" placeholder="admin name">
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
</form>
         <div class="dropdown-divider" style="margin-left:420px;">
  <a class="dropdown-item" href="signup.php">New around here? Sign up</a>
  </div>
    <div class="dropdown-divider" style="margin-left:420px;">  
  <a class="dropdown-item" href="#">Forgot password?</a>
</div> 
        </form>  
  <!-- -->
    <?php
        }
        else
        {
            $username=validate($_POST['username']);
            $password=validate($_POST['password']);
            
            if($username==NULL or $password==NULL)
            {
                output_msg("f","Please fill all data");
            }
            else
            {
                $enc_password=enc_pass($password);
                
                $result=mysqli_query($con,"SELECT * FROM admin WHERE a_name='$username' and a_pass='$enc_password'");
                if($result)
                {
                    if(mysqli_num_rows($result)>0)
                    {
                        $_SESSION['log']="yes";
                        
                        $row=mysqli_fetch_array($result);
                        $_SESSION['a_name']=$row['a_name'];
                        $_SESSION['a_email']=$row['a_email'];
                        $_SESSION['a_id']=$row['a_id'];
                        output_msg("s","Welcome, $row[a_name]");
                        redirect(2,"index.php");
                    }
                    else
                    {
                        output_msg("f","Wrong Username/Password");
                        redirect(2,"index.php");
                    }
                }
                else
                {
                    output_msg("f","Unexpected Error");
                    redirect(2,"index.php");
                }
            }
        }
    ?>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
