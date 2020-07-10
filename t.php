<!DOCTYPE html>
<html lang="en">
  <head>
   <head>
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
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
    
 <nav id="navbar-example2" class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="#fat">@fat</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#mdo">@mdo</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#one">one</a>
        <a class="dropdown-item" href="#two">two</a>
        <div role="separator" class="dropdown-divider"></div>
        <a class="dropdown-item" href="#three">three</a>
      </div>
    </li>
    <li>
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Profile
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <li><a href="profile.php?aid=<?php echo $_SESSION['a_id']; ?>">Profile</a></li>
    
    <a class="dropdown-item" href="profile.php?aid=<?php echo $_SESSION['a_id']; ?>">Profile</a>
    <a class="dropdown-item" href="editprofile.php?aid=<?php echo $_SESSION['a_id']; ?>">Edit Profile</a>
    <a class="dropdown-item" href="changepassword.php?aid=<?php echo $_SESSION['a_id']; ?>">Change Password</a>
  </div>
</div>
        
    </li>
  </ul>
</nav>
<div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
  <h4 id="fat">@fat</h4>
  <p>...</p>
  <h4 id="mdo">@mdo</h4>
  <p>...</p>
  <h4 id="one">one</h4>
  <p>...</p>
  <h4 id="two">two</h4>
  <p>...</p>
  <h4 id="three">three</h4>
  <p>...</p>
</div>

    <div class="container-fluid">
      <div class="row">
        <div class=" col-md-1 ">
          <!-- Example single danger button -->
             
 
    
          
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Categories</a></li>
            <li><a href="addcategory.php">Add</a></li>
            <li><a href="viewcategory.php">View</a></li>
            
          </ul>
          
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Products</a></li>
            <li><a href="addprod.php">Add</a></li>
            <li><a href="viewprod.php">View</a></li>
           
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Models</a></li>
            <li><a href="addmodel.php">Add</a></li>
            <li><a href="viewmodel.php">View</a></li>
            
          </ul>
         <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Item</a></li>
            <li><a href="additem.php">Add</a></li>
            <li><a href="viewitem.php">View</a></li>
           
          </ul>
          
          
        </div>
          
        
        <!--Start of the body of website-->
        <div class="col-md-10 col-md-offset-1 main">