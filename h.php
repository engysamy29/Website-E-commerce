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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
       <a class="navbar-brand" href="index.php"><?php echo $_SESSION['a_name']; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><span class="glyphicon glyphicon-dashboard"></span></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php?aid=<?php echo $_SESSION['a_id']; ?>">Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="editprofile.php?aid=<?php echo $_SESSION['a_id']; ?>">Edit Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="changepassword.php?aid=<?php echo $_SESSION['a_id']; ?>">Change Password</a></li>
                     <li role="separator" class="divider"></li>
                  
                </ul>
            </li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Categories</a></li>
            <li><a href="#">Add</a></li>
            <li><a href="#">View</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Products</a></li>
            <li><a href="#">Add</a></li>
            <li><a href="#">View</a></li>
          </ul>
         
        </div>
        
        <!--Start of the body of website-->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">