<?php
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/order-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:19 GMT -->
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
                <h1 class="text-center">CHECK OUT</h1>
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
                    <li>Check Out</li>
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
                <!-- Process List of the Page -->
                <ul class="list-unstyled process-list">
                  <li class="active">
                    <span class="counter">01</span>
                    <strong class="title">Shopping Cart</strong>
                  </li>
                  <li class="active">
                    <span class="counter">02</span>
                    <strong class="title">Check Out</strong>
                  </li>
                </ul>
                <!-- Process List of the Page end -->
              </div>
            </div>
          </div>
        </div><!-- Mt Process Section of the Page end -->
        <!-- Mt Detail Section of the Page -->
        <section class="mt-detail-sec toppadding-zero">
          <div class="container">
            <div class="row">
             <?php
              if(!isset($_POST['submit']))
              {
             ?>
                <!-- Bill Detail of the Page -->
       <form class="product-form" style="margin-bottom: 40px" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <div class="col-xs-12 col-sm-6">
                <h2>BILLING DETAILS</h2>
                  <fieldset>
                    <div class="form-group">
                      <div class="col">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                      </div>
                    </div>
                     <br> <br>
                    <div class="form-group">
                      <textarea class="form-control"  name="address" placeholder="Address" required></textarea>
                    </div>
                     <br> <br>
                    <div class="form-group">
                      <input type="text" name="city" class="form-control" placeholder="Town / City" required>
                    </div>
                     <br> <br>
                   
                    <div class="form-group">
                    
                      <div class="col">
                        <input type="tel" name="number" class="form-control" placeholder="Phone Number" required>
                      </div>
                    </div>
                    <br> <br>
                    <div class="form-group">
                      <textarea class="form-control" name="note" placeholder="Order Notes"></textarea>
                    </div>
        </div>
                     <br> <br>
         <div class="col-xs-12 col-sm-6">
                <div class="holder">
                  <h2>YOUR ORDER</h2>
                  <ul class="list-unstyled block">
                     <li>
                      <div class="txt-holder">
                        <div class="text-wrap pull-left">
                          <strong class="title">ITEMS</strong>
                    <?php
                    $usr=$_SESSION['us_id'];
                     $rslt=mysqli_query($con,"SELECT * FROM addtocart WHERE usr_id=$usr");
                     while($r1=mysqli_fetch_array($rslt))
                     {
                        $i=$r1['item_id'];
                        $rslt2=mysqli_query($con,"SELECT * FROM model WHERE model_id IN(SELECT imodel_id FROM item WHERE i_id=$i)");
                        $r2=mysqli_fetch_array($rslt2);
                        ?>
                        
                          <span><?php echo $r2['model_name']; ?></span>
                        <?php
                        
                     }
                    
                    ?>
                     </div>
                        <div class="text-wrap txt text-right pull-right">
                          <strong class="title">TOTALS</strong>
                    <?php
                    $usr1=$_SESSION['us_id'];
                     $rslt3=mysqli_query($con,"SELECT * FROM addtocart WHERE usr_id=$usr1");
                     
                     while($r3=mysqli_fetch_array($rslt3))
                     {
                        $ill=$r3['item_id'];
                        $rslt4=mysqli_query($con,"SELECT * FROM item WHERE i_id=$ill");
                        $r4=mysqli_fetch_array($rslt4);
                        ?>
                         <span><i class="fa fa-eur"></i><?php  echo $r4['i_price'];?></span>
                         
                        <?php
                        
                     }
                    
                    ?>
                        </div>
                      </div>
                    </li>
                   
                    <li style="border-bottom: none;">
                      <div class="txt-holder">
                        <strong class="title sub-title pull-left">ORDER TOTAL</strong>
                        <div class="txt pull-right">
                     <?php
                    $usr1=$_SESSION['us_id'];
                     $rslt4=mysqli_query($con,"SELECT * FROM addtocart WHERE usr_id=$usr1");
                     $sum=0;
                     while($r4=mysqli_fetch_array($rslt4))
                     {
                        $ill=$r4['item_id'];
                        $rslt5=mysqli_query($con,"SELECT * FROM item WHERE i_id=$ill");
                        $r5=mysqli_fetch_array($rslt5);
                        $p=$r5['i_price'];
                        $sum=$sum+$p;

                     }
                     ?>
                         <span><i class="fa fa-eur"></i><?php  echo $sum;?></span>
                          
                        </div>
                      </div>
                    </li>
                  </ul>
                  <label>PAYMENT METHODS</label>
                  <br>
                  <!-- Panel Group of the Page -->
                 <?php
                            $rslt7=mysqli_query($con,"SELECT * FROM paytype");
                            while($r7=mysqli_fetch_array($rslt7))
                            {
                                ?>
                                 <input type="radio" name="pay"  value="<?php echo $r7['pt_id']; ?>" ><span style="margin-right: 80px; margin-top: 60px;" required><?php echo $r7['pt_name']; ?></span><br>
                                <?php
                            }
                            ?>
                          
             
                         
                  <!-- Panel Group of the Page end -->
                </div>
                     <button type="submit" name="submit" class="process-btn" style="margin-top: 200px;margin-left: 600px;">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a> 
                   </div>
         </fieldset>
                </form>
                <?php
              }
              else{
                $name=$_POST['name'];
                $usrid=$_SESSION['us_id'];
                $add=$_POST['address'];
                $city=$_POST['city'];
                $number=$_POST['number'];
                $note=$_POST['note'];
                $pay=$_POST['pay'];
                $usr2=$_SESSION['us_id'];
             
                    $usr1=$_SESSION['us_id'];
                     $rslt4=mysqli_query($con,"SELECT * FROM addtocart WHERE usr_id=$usr1");
                     $sum=0;
                     while($r4=mysqli_fetch_array($rslt4))
                     {
                        $ill=$r4['item_id'];
                        $rslt5=mysqli_query($con,"SELECT * FROM item WHERE i_id=$ill");
                        $r5=mysqli_fetch_array($rslt5);
                        $p=$r5['i_price'];
                        $sum=$sum+$p;

                     }
                   
                if($name!=NULL && $add!=NULL && $city!=NULL && $number!=NULL && $note!=NULL && $pay!=NULL)
                {
                    $rslt10=mysqli_query($con,"INSERT INTO ordert VALUES (NULL,'$pay','$usrid','$add','$sum','$name','$city','$number','$note')");
                ?>
                <div style="border: 5px solid #400040; width: 150px;height: 60px;color: black;padding-left: 5px; font-size: larger;margin-left: 500px;">Order Is coming</div>
                <?php
                  
                }
              }
                ?>
                

                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Mt Detail Section of the Page end -->
      </main><!-- Main of the Page end here -->
      <!-- footer of the Page -->
    
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

<!-- Mirrored from htmlbeans.com/html/schon/order-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:19 GMT -->
</html>