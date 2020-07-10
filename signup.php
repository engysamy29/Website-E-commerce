<?php
ob_start();
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

    <title>Sign in to MR.Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

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
   <label for="inputemail">Admin Email</label>
    <input type="email" name="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="admin email">
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" name="password" class="form-control" id="exampleDropdownFormEmail2" placeholder="Password">
  </div>
   <div class="form-group">
  <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
   </div>
</form>
         
        </form>  
  <!-- -->
    <?php
        }
        else
        {
            $username=validate($_POST['username']);
            $password=validate($_POST['password']);
            $email=validate($_POST['email']);
            
            if($username==NULL or $password==NULL or $email==NULL)
            {
                output_msg("f","Please fill all data");
            }
            else
            {
                $enc_password=enc_pass($password);
                
                $result=mysqli_query($con,"INSERT Into admin VALUES(null,'$username','$email','$enc_password')");
                if($result)
                {
                    
                    
                       
                        output_msg("s","Account Created successfully");
                        redirect(2,"index.php");
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
