<?php
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/order-shopping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:16 GMT -->
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
      <!-- mt -header style14 start from here -->
  <?php
			include_once("head.php");
                        
                        ?>
      <!-- mt search popup start here -->
      <div class="mt-search-popup">
        <div class="mt-holder">
          <a href="#" class="search-close"><span></span><span></span></a>
          <div class="mt-frame">
            <form action="#">
              <fieldset>
                <input type="text" placeholder="Search...">
                <span class="icon-microphone"></span>
                <button class="icon-magnifier" type="submit"></button>
              </fieldset>
            </form>
          </div>
        </div>
      </div><!-- mt search popup end here -->
      <!-- Main of the Page -->
      <main id="mt-main">
        <section class="mt-contact-banner mt-banner-22" style="background-image: url(images/img-76.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h1 class="text-center">SHOPPING CART</h1>
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
                    <li>Shopping Cart</li>
                  </ul>
                </nav>
                <!-- Breadcrumbs of the Page end -->
              </div>
            </div>
          </div>
        </section>
        <!-- Mt Process Section of the Page -->
        <div class="mt-process-sec">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <ul class="list-unstyled process-list">
                  <li class="active">
                    <span class="counter">01</span>
                    <strong class="title">Shopping Cart</strong>
                  </li>
                  <li>
                    <span class="counter">02</span>
                    <strong class="title">Check Out</strong>
                  </li>
                  <li>
                    <span class="counter">03</span>
                    <strong class="title">Order Complete</strong>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- Mt Process Section of the Page end -->
        <!-- Mt Product Table of the Page -->
        <div class="mt-product-table">
          <div class="container">
            <div class="row border">
              <div class="col-xs-12 col-sm-6">
                <strong class="title">ITEM</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">PRICE</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">QUANTITY</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">TOTAL</strong>
              </div>
            </div>
          <?php
          $usid=$_SESSION['us_id'];
           $resul21=mysqli_query($con,"CREATE VIEW usercart AS(SELECT * FROM addtocart WHERE usr_id=$usid)");
          $resul1=mysqli_query($con,"SELECT * FROM usercart");
          while($m1=mysqli_fetch_array($resul1))
          {
            $itm=$m1['item_id'];
            $resul2=mysqli_query($con,"SELECT * FROM item WHERE i_id=$itm");
            $m2=mysqli_fetch_array($resul2); //fiha item
            $mdic=$m2['imodel_id'];
            $resul3=mysqli_query($con,"SELECT * FROM model WHERE model_id=$mdic");
            $m3=mysqli_fetch_array($resul3);
            $modname=$m3['model_name'];
            
            ?>
            
            
            <div class="row border">
              <div class="col-xs-12 col-sm-2">
                <div class="img-holder">
                  <img src="../imgs/<?php echo $m2['i_imag']; ?>" alt="image description">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <strong class="product-name"><?php echo $modname; ?></strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="price"><i class="fa fa-eur"></i><?php echo $m2['i_price']; ?></strong>
              </div>
              <div class="col-xs-12 col-sm-2">
               <strong class="price"><i ></i><?php echo $m1['qun']; ?></strong>
              </div>
              <?php
              $q2=$m1['qun']*$m2['i_price'];
              ?>
              <div class="col-xs-12 col-sm-2">
                <strong class="price"><i class="fa fa-eur"></i><?php echo $q2; ?> </strong>
                <a href="#"><i class="fa fa-close"></i></a>
              </div>
            </div>
            
            <?php
            
          }
          ?>
          
          </div>
        </div><!-- Mt Product Table of the Page end -->
         <div class="col-xs-12 col-sm-6" style="border: 2px solid #400040; width:240px; margin-left: 600px; margin-bottom: 100px;">
             <a href="checkout.php" class="process-btn" style="color: black; font-size: larger;">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>
           </div>
      <!-- footer of the Page end -->
    </div>
    <span id="back-top" class="fa fa-arrow-up"></span>
  </div>
  <!-- include jQuery -->
  <script src="js/jquery.js"></script>
  <!-- include jQuery -->
  <script src="js/plugins.js"></script>
  <!-- include jQuery -->
  <script src="js/jquery.main.js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/schon/order-shopping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:19 GMT -->
</html>