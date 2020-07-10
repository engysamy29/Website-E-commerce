<?php
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/product-grid-view.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:01 GMT -->
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
     if(isset($_GET['prodid']))
    {
        $prodid=intval($_GET['prodid']);
    ?>
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
			<!-- mt header style4 start here -->
			<header id="mt-header" class="style4">
				<!-- mt bottom bar start here -->
				<div class="mt-bottom-bar">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<!-- mt logo start here -->
								<div class="mt-logo"><a href="#"><img src="images/mt-logo.png" alt="schon"></a></div>
								<!-- mt icon list start here -->
								<ul class="mt-icon-list">
									<li class="hidden-lg hidden-md">
										<a href="#" class="bar-opener mobile-toggle">
											<span class="bar"></span>
											<span class="bar small"></span>
											<span class="bar"></span>
										</a>
									</li>
									<li class="drop">
										<a href="wishlist.php" class="icon-heart cart-opener"><span style="margin-bottom: -3px;" class="num"><?php ?></span></a>
										<!-- mt drop start here -->
										<div class="mt-drop">
											<!-- mt drop sub start here -->
											<div class="mt-drop-sub">
												<!-- mt side widget start here -->
												<div class="mt-side-widget">
													<!-- cart row start here -->
													<div class="cart-row">
                                                                                                            <?php
                                                                                                            $result=mysqli_query($con,"SELECT * FROM wishlist");//fiha el wishlist
                                                                                                            if($result)
                                                                                                            {
                                                                                                                if(mysqli_num_rows($result)>0)
                                                                                                                {
                                                                                                                    while($row=mysqli_fetch_array($result))
                                                                                                                    {
                                                                                                                        $itemid=$row['iit_id'];
                                                                                                                        $result1=mysqli_query($con,"SELECT * FROM item WHERE i_id=$itemid");
                                                                                                                        if($result1)
                                                                                                                        {
                                                                                                                            if(mysqli_num_rows($result1)>0)
                                                                                                                            {
                                                                                                                                $row1=mysqli_fetch_array($result1);
                                                                                                                                $modelid=$row1['imodel_id'];
                                                                                                                                $result2=mysqli_query($con,"SELECT * FROM model WHERE model_id=$modelid");
                                                                                                                                if($result2)
                                                                                                                                {
                                                                                                                                     if(mysqli_num_rows($result2)>0)
                                                                                                                                     {
                                                                                                                                        $row2=mysqli_fetch_array($result2);
                                                                                                                                        $modelname=$row2['model_name'];
                                                                                                                                         ?>
                                                                                                                        <img src="../images/<?php echo $row1['i_imag']; ?>" alt="image" class="img-responsive">
														<div class="mt-h">
															<span class="mt-h-title"><?php echo $modelname; ?></span>
															<span class="price"><i class="fa fa-eur" aria-hidden="true"></i><?php echo $row1['i_price'];?></span>
														</div>
														<a href="#" class="close fa fa-times"></a>
                                                                                                                <?php
                                                                                                                                     }
                                                                                                                                }
                                                                                                                               
                                                                                                                            }
                                                                                                                        }
                                                                                                                        
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                            ?>
														
													</div>
												</div>
											</div>
											
										</div>
										<span class="mt-mdropover"></span>
									</li>
                                                                        <li>
										<a href="addtocart.php" class="cart-opener">
											<span class="icon-handbag"></span>
											<span class="num">3</span>
										</a>
										
										
									</li>=
									
								</ul><!-- mt icon list end here -->
								<!-- navigation start here -->
								<nav id="nav">
									<ul>
										<li>
											<a href="index.php">HOME <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
											
										</li>
										<li><a  href="productview.php?prodid=<?php echo $prodid;?>">PRODUCTS</a></li>
										
										<li class="drop">
											<a href="#">Categoriess <i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<!-- mt dropmenu start here -->
											<div class="mt-dropmenu text-left">
												<!-- mt frame start here -->
												<div class="mt-frame">
													<!-- mt f box start here -->
													<div class="mt-f-box">
														<!-- mt col3 start here -->
                                                                                                                <?php
                                                                                                                $result3=mysqli_query($con,"SELECT * FROM category");
                                                                                                                if($result3)
                                                                                                                {
                                                                                                                    if(mysqli_num_rows($result3)>0)
                                                                                                                   
                                                                                                                    {
                                                                                                                        ?>
                                                                                                                        
                                                                                                                            <?php
                                                                                                                        while($row3=mysqli_fetch_array($result3))
                                                                                                                        {
                                                                                                                            $categoryid=$row3['c_id'];
                                                                                                                            ?>
                                                                                                                              <div class="mt-col-3">
															<div class="sub-dropcont">
																<strong class="title"><a href="#" class="mt-subopener"></a><?php echo $row3['c_name']; ?></strong>
																<div class="sub-drop">
																	<ul>
                                                                                                                            <?php
                                                                                                                            $result4=mysqli_query($con,"SELECT * FROM product WHERE pc_id=$categoryid");
                                                                                                                            if($result4)
                                                                                                                            {
                                                                                                                                if(mysqli_num_rows($result4)>0)
                                                                                                                                {
                                                                                                                                    while($row4=mysqli_fetch_array($result4))
                                                                                                                                
                                                                                                                                    {
                                                                                                                                        ///needmodify
                                                                                                                                        ?>
                                                                                                                                        <li><a href="productview.php?prodid=<?php echo $row4['p_id'];?>"><?php echo $row4['p_name'];?></a></li>
                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                ?>
                                                                                                                                        </ul>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                                <?php
                                                                                                                            }
                                                                                                                           
                                                                                                                            ?>
                                                                                                                         
                                                                                                                         <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                                ?>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
											
										</li>
										<li><a href="aboutus.php">About US</a></li>
										<li>
											<a  href="contactus.php">Contact US <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
											
										</li>
									</ul>
								</nav>
								<!-- mt icon list end here -->
							</div>
						</div>
					</div>
				</div>