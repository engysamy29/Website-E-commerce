<?php
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/homepage7.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:13:48 GMT -->
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
		<!-- W1 start here -->
		<div class="w1">
			<!-- mt header style19 start here -->
                        <div class="mt-top-bar">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 hidden-xs">
								<span class="tel"> <i class="fa fa-phone" aria-hidden="true"></i> +1 (555) 333 22 11</span>
								<a href="#" class="tel"> <i class="fa fa-envelope-o" aria-hidden="true"></i> info@schon.chairs</a>
							</div>
							<div class="col-xs-12 col-sm-6 text-right">
								<!-- mt top lang start here -->
								<div class="mt-top-lang">
									<a href="#" class="lang-opener">Language<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<div class="drop">
										<ul class="list-unstyled">
											<li><a href="#">English</a></li>
										    
										</ul>
									</div>
								</div><!-- mt top lang end here -->
								<span class="account"><a href="logout.php">Login or logout</a> or <a href="signup.php">Create Account</a></span>
							</div>
						</div>
					</div>
				</div>
			 <?php
			include_once("head.php");
                        
                        ?>
			<!-- mt mainslider3 start here -->
			<div class="mt-mainslider3" style="height:auto; width:1000px;">
				<!-- slider banner-slider start here -->
				<div class="slider banner-slider">
					<!-- holder start here -->
                                        <?php
                                        $result5=mysqli_query($con,"SELECT * FROM category");
                                        if($result5)
                                        {
                                            if(mysqli_num_rows($result5)>0)
                                            {
                                                while($row5=mysqli_fetch_array($result5))
                                                {
                                                ?>
                                                <div class="holder">
						<img class="img" src="../imgs/<?php echo $row5['c_img']; ?>" alt="image description">
					        </div>
                                                <?php
                                                }
                                            }
                                        }
                                        ?>
					<!-- holder end here -->
                                     

				</div><!-- slider banner-slider start here -->
			</div><!-- mt mainslider3 end here -->
			<!-- mt main start here -->
			<main id="mt-main">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- mt productsc start here -->
							<div class="mt-productsc style3 wow fadeInUp" data-wow-delay="0.4s">
								<div class="row">
									<div class="col-xs-12 mt-heading text-uppercase text-center">
										<h2 class="heading">FEATURED ITEMS</h2>
									</div>
								</div>
								<!-- mt productscrollbar start here -->
								
									<div class="mt-holder" style="margin-left: 130px;">
										<?php
                                                                                $result6=mysqli_query($con,"SELECT * FROM item");
                                                                                if($result6)
                                                                                {
                                                                                    if(mysqli_num_rows($result6)>0)
                                                                                    {
                                                                                        while($row6=mysqli_fetch_array($result6))
                                                                                        {
                                                                                            ?>
                                                                                            <div class="product-3 hover2">
											<!-- img start here -->
                                                                                         <div class="img">
                                                                                        <img alt="image description" src="../imgs/<?php echo $row6['i_imag']; ?>" style="width:auto; height: 200px;">
                                                                                               </div>
                                                                                                   <?php
                                                                                            $itemmodelid=$row6['imodel_id'];
                                                                                             $itid=$row6['i_id'];
                                                                                            $result7=mysqli_query($con,"SELECT * FROM model WHERE model_id=$itemmodelid");
                                                                                            ?>
                                                                                            <div class="txt">
                                                                                            <?php
                                                                                            if($result7)
                                                                                            {
                                                                                                if(mysqli_num_rows($result7)>0)
                                                                                                {
                                                                                                    $row7=mysqli_fetch_array($result7);
                                                                                                  
                                                                                                    ?>
                                                                                                    
												<strong class="title"><?php echo $row7['model_name']; ?></strong>
												
                                                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                            <span class="price"><i class="fa fa-eur"></i><?php  echo $row6['i_price']; ?> </span>
											</div>
                                                                                                    <?php
                                                                                            $result8=mysqli_query($con,"SELECT * FROM coloritem WHERE citem_id=$itid");
                                                                                            if($result8)
                                                                                            {
                                                                                                if(mysqli_num_rows($result8)>0)
                                                                                                {
                                                                                                    ?>
                                                                                                    <ul class="color-box">
                                                                                                        <?php
                                                                                                    while($row8=mysqli_fetch_array($result8))
                                                                                                    {
                                                                                                        $colorid=$row8['ccolor_id'];
                                                                                                        $result9=mysqli_query($con,"SELECT * FROM color WHERE cl_id=$colorid");
                                                                                                        $row9=mysqli_fetch_array($result9);
                                                                                                               ?>
											         	<li  style="background:<?php echo $row9['cl_name']; ?>" class="active"><a style="background:<?php echo $row9['cl_name']; ?>" class="" href="#"></a></li>
                                                                                                                       <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    </ul>
                                                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                                  <p><?php echo substr($row6['i_des'],0,20)."....."; ?></p>
                                                                                                  <ul class="links">
												
												<li><a href="productdetail.php?itemid=<?php echo $row6['i_id'];?>" class="lightbox"><i class="icomoon icon-eye"></i></a></li>
											     </ul>
                                                                                            </div>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                }
                                                                                ?>
									</div><!-- mt holder end here -->
								<!-- mt productscrollbar end here -->
							</div><!-- mt productsc end here -->
							
						</div>
					</div>
				</div>
			</main>
			<!-- footer of the Page -->
			
		</div><!-- W1 end here -->
		<span id="back-top" class="fa fa-arrow-up"></span>
	</div>
	
	<!-- Popup Holder of the Page -->
	
	<!-- include jQuery -->
	<script src="js/jquery.js"></script>
	<!-- include jQuery -->
	<script src="js/plugins.js"></script>
	<!-- include jQuery -->
	<script src="js/jquery.main.js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/schon/homepage7.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:13:48 GMT -->
</html>