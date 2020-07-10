<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/product-detail2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:16 GMT -->
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
    <?php
     if(isset($_GET['itemid']))
    {
        $ittemid=intval($_GET['itemid']);
    ?>
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<!-- W1 start here -->
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
			<!-- mt side menu start here -->
			<!-- mt main start here -->
			<main id="mt-main">
				<!-- Mt Product Detial of the Page -->
				<section class="mt-product-detial wow fadeInUp" data-wow-delay="0.4s">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
                                                           
								<!-- Slider of the Page -->
								<div class="slider">
									<!-- Comment List of the Page -->
									<ul class="list-unstyled comment-list">
                                                                           <?php
                                                                           $reslt1=mysqli_query($con,"SELECT COUNT(*) AS c FROM liket WHERE li_id=$ittemid");
                                                                           $rw1=mysqli_fetch_array($reslt1);
                                                                           $reslt2=mysqli_query($con,"SELECT COUNT(*) AS con FROM comment WHERE comi_id=$ittemid");
                                                                           $rw2=mysqli_fetch_array($reslt2);
                                                                           ?>
										<li><a href="#"><i class="fa fa-heart"></i></a><?php echo $rw1['c']; ?></li>
										<li><a href="#"><i class="fa fa-comments"></i></a> <?php echo $rw2['con']; ?></li>	
									</ul>
									<!-- Comment List of the Page end -->
									<!-- Product Slider of the Page -->
									<div class="product-slider">
                                                                             <div class="slide">
                                                                                <?php
                                                                                      $res=mysqli_query($con,"SELECT * FROM item WHERE i_id=$ittemid");
                                                                                      $ree=mysqli_fetch_array($res);
                                                                                        ?>
											<a href="productdetail.php?itemid=<?php echo $ittemid;?>"><img src="../imgs/<?php echo $ree['i_imag'];?>" alt="image descrption" style="margin-top: 20px;"></a>
										</div>
										
									</div>
									<!-- Product Slider of the Page end -->
									<!-- Pagg Slider of the Page -->
									<ul class="list-unstyled slick-slider pagg-slider">
                                                                            <?php
                                                                                
                                                                            $reslt3=mysqli_query($con,"SELECT * FROM model WHERE model_id IN(SELECT imodel_id FROM item WHERE i_id=$ittemid)");
                                                                            $rw3=mysqli_fetch_array($reslt3);
                                                                                $modellid=$rw3['model_id'];
                                                                                $reslt4=mysqli_query($con,"SELECT * FROM item WHERE imodel_id=$modellid");
                                                                                while($rw4=mysqli_fetch_array($reslt4))
                                                                                {
                                                                                ?>
                                                                               <li><a href="productdetail.php?itemid=<?php echo $rw4['i_id'];?>"><div class="img"><img src="../imgs/<?php echo $rw4['i_imag'];?>" alt="image description"></div></a></li>
                                                                                <?php
                                                                                }
                                                                            ?>
										
										
										
									</ul>
									<!-- Pagg Slider of the Page end -->
								</div>
								<!-- Slider of the Page end -->
								<!-- Detail Holder of the Page -->
								<div class="detial-holder">
									<!-- Breadcrumbs of the Page -->
									<ul class="list-unstyled breadcrumbs">
                                                                             <?php
                                                                                $reslt5=mysqli_query($con,"SELECT * FROM product WHERE p_id IN(SELECT mp_id FROM model WHERE model_id=$modellid)");
                                                                                $rw5=mysqli_fetch_array($reslt5);
                                                                                ?>
										<li><a href="#">
                                                                                 <?php echo $rw5['p_name'];?>
                                                                                <i class="fa fa-angle-right"></i></a></li>
										<li>Products</li>
									</ul>
									<!-- Breadcrumbs of the Page end -->
                                                                        <?php
                                                                        
                                                                        ?>
									<h2><?php
                                                                        echo $rw3['model_name'];
                                                                        ?></h2>
									<!-- Rank Rating of the Page -->
									
									<div class="text-holder">
                                                                            <?php
                                                                            $res6=mysqli_query($con,"SELECT * FROM item WHERE i_id=$ittemid");
                                                                            $rw6=mysqli_fetch_array($res6);
                                                                            
                                                                            ?>
										<span class="price">Price:$<?php echo $rw6['i_price']; ?></span>
									</div>
									<!-- Product Form of the Page -->
                                                                        <?php
                                                                        if(isset($_SESSION['lo']))
                                                                        {
                                                                      if(!isset($_POST['submitt']))
                                                                        {
                                                                            $b=$_SESSION['bu_id'];
                                                                            $ress=mysqli_query($con,"SELECT * FROM branchinventory WHERE binvitem_id=$ittemid and bi_id=$b");
                                                                            $rr=mysqli_fetch_array($ress);
                                                                            $q=$rr['quantity'];
                                                                        ?>
									
		     <form class="product-form" style="margin-bottom: 40px" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?itemid=$ittemid"; ?>" enctype="multipart/form-data">
											
											   <form class="product-form" style="margin-bottom: 40px" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?itemid=$ittemid"; ?>" enctype="multipart/form-data">
											<div class="row-val">
												<label for="qtty">qty</label>
												
                                                                                                        <select class="form-control" name="qty">
                                                                                                    <?php
                                                                                                    $i=1;
                                                                                                     while($i<=$q)
                                                                                                        {
                                                                                                            ?>
                                                                                                                <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                                                                                            <?php
                                                                                                            $i++;
                                                                                                        }
                                                                                                      
                                                                                                    ?>
                                                                                                        </select>

											</div>
										
									         
											<div class="row-val">
												<button type="submit" name="submitt">ADD TO CART</button>
											</div>
										
									</form>
                                                                        <?php
                                                                        }
                                                                        
                                                                        else
                                                                        {
                                                                            $uss=$_SESSION['us_id'];
                                                                            $qn=$_POST['qty'];
                                                                            $res10=mysqli_query($con,"INSERT INTO addtocart VALUES ('$uss','$ittemid','$qn')");
                                                                            if($res10)
                                                                            {
                                                                               output_msg("s","ADDED TO CART");
                                                                               header("Refresh: 1; url=productdetail.php?itemid=$ittemid");
                                                                            }
                                                                            else
                                                                            {
                                                                                output_msg("f","Already added");
                                                                              header("Refresh: 1; url=productdetail.php?itemid=$ittemid");
                                                                            }
                                                                        }
                                                                  }
                                                                  else{
                                                                    ?>
                                                                    <div style="font-size: larger;font-weight: bolder;color: black;"> Please login in order to add to cart</div>
                                                                        <?php
                                                                  }
                                                                  
                                                                        ?>
									<!-- Rank Rating of the Page end -->
									<div class="txt-wrap">
										<p style="font-size: larger;color: #400040;">Description:<br><?php echo $rw6['i_des']; ?></p>
                                                                        
                                                                                <?php
                                                                                $res7=mysqli_query($con,"SELECT * FROM featureitem WHERE if_id=$ittemid");
                                                                                
                                                                                while($rw7=mysqli_fetch_array($res7))
                                                                                {
                                                                                    $fid=$rw7['fi_id'];
                                                                                    $res8=mysqli_query($con,"SELECT * FROM feature where f_id=$fid");
                                                                                    $rw8=mysqli_fetch_array($res8);
                                                                                    ?>
                                                                                     <p style="font-size: larger;color: #400040;"><?php echo $rw8['f_name'];?> : <?php echo $rw7['value'];?></p> 
                                                                                 <?php
                                                                                }
                                                                               
                                                                                    $res9=mysqli_query($con,"SELECT * FROM color WHERE cl_id IN(SELECT ccolor_id FROM coloritem WHERE citem_id=$ittemid)");
                                                                                    ?>
                                                                                    <p style="font-size: larger;font-family: cursive;color: #800080;">Colors of this Item</p>
                                                                                     <ul class="color-box">
                                                                                    <?php
                                                                                    while($rw9=mysqli_fetch_array($res9))
                                                                                    {
                                                                                    
                                                                                     ?>
                                                                                     <div style="background:<?php echo $rw9['cl_name']; ?>; width: 30px;height: 30px; margin-top: 10px;margin-bottom: 5px;"></div>
                                                                            <?php
                                                                                    }
										?>
                                                                                     </ul>
									</div>
									<ul class="list-unstyled list">
										<?php
                                                                                if(isset($_SESSION['lo']))
                                                                                {
                                                                                        if(!isset($_POST['submi']))
                                                                                        {
                                                                                                ?>
                                                                                             <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?itemid=$ittemid"; ?>" enctype="multipart/form-data">
                
                                                                                            <button type="submit" name="submi">ADD TO WISHLIST</button>
                                                                                              </form>
                                                                                                <?php
                                                                                            
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $usff=$_SESSION['us_id'];
                                                                                            $it=$ittemid;
                                                                                            $rrr=mysqli_query($con,"INSERT INTO wishlist VALUES ('$it','$usff')");
                                                                                           
                                                        
                                                                                        }
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                                if(isset($_SESSION['lo']))
                                                                                {
                                                                                        if(!isset($_POST['subm']))
                                                                                        {
                                                                                                ?>
                                                                                             <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?itemid=$ittemid"; ?>" enctype="multipart/form-data">
                
                                                                                            <button type="submit" name="subm" style="margin-top: 50px;">Like Item</button>
                                                                                              </form>
                                                                                                <?php
                                                                                            
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $usfff=$_SESSION['us_id'];
                                                                                            $itt=$ittemid;
                                                                                            $rrr=mysqli_query($con,"INSERT INTO liket VALUES ('$itt','$usfff')");
                                                                                              
                                                        
                                                                                        }
                                                                                }
                                                                                ?>
									</ul>
									<!-- Product Form of the Page end -->
								</div>
								<!-- Detail Holder of the Page end -->
							</div>
						</div>
					</div>
				</section><!-- Mt Product Detial of the Page end -->
				<div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<ul class="mt-tabs text-center text-uppercase">
									<li><a href="#tab1">DESCRIPTION</a></li>
                                                                         <?php
                                                                                    $reslt17=mysqli_query($con,"SELECT COUNT(*) AS c FROM comment WHERE comi_id=$ittemid");
                                                                                    $rw17=mysqli_fetch_array($reslt17);
                                                                                    
                                                                                    ?>
									<li><a href="#tab3" class="active">REVIEWS (<?php echo $rw17['c']; ?>)</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab1">
										<?php
                                                                             echo $rw6['i_des'];
                                                                                ?>
									</div>
									
									<div id="tab3">
										<div class="product-comment">
                                                                                    <?php
                                                                                    $reslt6=mysqli_query($con,"SELECT * FROM comment WHERE comi_id=$ittemid");
                                                                                    while($rw10=mysqli_fetch_array($reslt6))
                                                                                    {
                                                                                    
                                                                                    ?>
											<div class="mt-box">
												<div class="mt-hold">
													<?php
                                                                                                        
                                                                                                        $uss=$rw10['usc_id'];
                                                                                                        $reslt7=mysqli_query($con,"SELECT * FROM user WHERE us_id=$uss");
                                                                                                        $rw11=mysqli_fetch_array($reslt7);
                                                                                                        
                                                                                                        ?>
													<span class="name"><?php echo $rw11['us_name']?></span>
													
												</div>
                                                                                                <p><?php echo $rw10['co_Text']; ?></p>
											</div>
                                                                                        <?php
                                                                                    }
											if(isset($_SESSION['lo']))
                                                                                            {
                                                                                                if(!isset($_POST['submit']))
                                                                                                {
                                                                                                ?>
                                                                                                
                                                                                                    <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?itemid=$ittemid"; ?>" enctype="multipart/form-data">
                                                                                                            <h2 class="form-signin-heading">ADD comment</h2>
                                                                                                            <label for="inputcomment">comment</label>
                                                                                                            <input  type="text" id="inputcomment" name="comment" class="form-control"   autofocus>
                                                                                                            <br>
                                                                                                            <button class="btn btn-lg btn-primary" type="submit" name="submit" style="margin-top: 10px;">comment</button>
                                                                                                        </form>
                                                                                        <?php
                                                                                                }
                                                                                                else{
                                                                                                   
                                                                                                    $us=$_SESSION['us_id'];
                                                                                                    $comm=validate($_POST['comment']);
                                                                                                    $reslt8=mysqli_query($con,"INSERT INTO comment VALUES ('$ittemid','$comm','$us')");
                                                                                                    if($reslt8)
                                                                                                    {
                                                                                                   echo "GGG";
                                                                                                    }
                                                                                                    else{
                                                                                                    redirect(1,"index.php");
                                                                                                    }
                                                                                                   
                                                                                                }
                                                                                            }
                                                                                            else{
                                                                                             
                                                                                                
                                                                                                ?>
                                                                                                <p style="border: 3px solid #400040; font-size: larger;padding: 30px;color: black;">Please Login or Signup to add an comment on this item</p>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</main><!-- mt main end here -->
                </div>
		<span id="back-top" class="fa fa-arrow-up"></span>
	</div>
	<!-- include jQuery -->
	<script src="js/jquery.js"></script>
	<!-- include jQuery -->
	<script src="js/plugins.js"></script>
	<!-- include jQuery -->
	<script src="js/jquery.main.js"></script>
        <?php
    }
        ?>
</body>

<!-- Mirrored from htmlbeans.com/html/schon/product-detail2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:16 GMT -->
</html>