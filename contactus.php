<?php
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:29 GMT -->
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schön. | eCommerce HTML5 Template</title>
  <!-- include the site stylesheet -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic%7cMontserrat:400,700%7cOxygen:400,300,700' rel='stylesheet' type='text/css'>
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/icon-fonts.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/main.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
  <!-- main container of all the page elements -->
  <div id="wrapper">
    <!-- Page Loader -->
    <div id="pre-loader" class="loader-container">
      <div class="loader">
        <img src="images/svg/rings.svg" alt="loader">
      </div>
    </div>
    <div class="w1">
      <!-- mt header style4 start here -->
       <?php
			include_once("head.php");
                        
                        ?>
      
      <!-- Main of the Page -->
      <main id="mt-main">
        <!-- Mt Map Holder of the Page -->
        <div class="mt-map-holder wow fadeInUp" data-wow-delay="0.4s" data-lat="52.392363" data-lng="1.480408" data-zoom="8">
         
        </div>
        
        
        
        
         <div class="mt-contact-detail wow fadeInUp" data-wow-delay="0.4s">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-4 mt-paddingbottomxs text-center">
                <span class="icon"><i class="fa fa-map-marker"></i></span>
                <strong class="title">ADDRESS</strong>
                 <?php
                  $rs1=mysqli_query($con,"SELECT * FROM branch");
                  while($row11=mysqli_fetch_array($rs1))
                  {
                    $bn=$row11['b_city'];
                    ?>
                     
                <address><?php echo $bn;?></address>
                <?php
                  }
                ?>
              </div>
              <div class="col-xs-12 col-sm-4 mt-paddingbottomxs text-center">
                <span class="icon"><i class="fa fa-phone"></i></span>
                <strong class="title">PHONE</strong>
                <?php
                  $rs1=mysqli_query($con,"SELECT * FROM branch");
                  while($row11=mysqli_fetch_array($rs1))
                  {
                    $b=$row11['b_id'];
                    
                    ?>
                <a href="#">
                    
                    <?php
                     $rs11=mysqli_query($con,"SELECT * FROM branchnumber WHERE bn_id=$b");
                     while($row111=mysqli_fetch_array($rs11))
                     {
                     echo $row111['bn_phonenum']; ?>-
                     <?php
                     
                    
                     }
                    ?>
                </a>
                <?php
                  }
                ?>
              </div>
          
            </div>
          </div>
        </div>
        
        
   
        <!-- Mt Form Section of the Page -->
        
    </div>
    <span id="back-top" class="fa fa-arrow-up"></span>
  </div>
  <!-- include jQuery -->
  <script src="js/jquery.js"></script>
  <!-- include jQuery -->
  <script src="js/plugins.js"></script>
  <!-- include jQuery -->
  <script src="js/jquery.main.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/schon/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:29 GMT -->
</html>