<?php
session_start();
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
			 <?php
			include_once("head.php");
                        
                        ?>
			<main id="mt-main">

                                    <!-- Mt Contact Banner of the Page -->
                                <?php
                                $res1=mysqli_query($con,"SELECT * FROM product WHERE p_id=$prodid");
                                if($res1)
                                {
                                    if(mysqli_num_rows($res1))
                                    { $ro1=mysqli_fetch_array($res1);
                                ?>
                                
				<section class="mt-contact-banner style4" style="background-image: url(../imgs/<?php echo $ro1['p_img']; ?>)">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1><?php echo $ro1['p_name']; ?></h1>
								<!-- Breadcrumbs of the Page -->
								<nav class="breadcrumbs">
									<ul class="list-unstyled">
										<li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
										<li><a href="#">Products <i class="fa fa-angle-right"></i></a></li>
										<li><?php echo $ro1['p_name']; ?></li>
									</ul>
								</nav><!-- Breadcrumbs of the Page end -->
							</div>
						</div>
					</div>
                                        </section>
                                        <?php
                                    }
                                }
                                        ?>
				<!-- Mt Contact Banner of the Page end -->
				<div class="container">
					<div class="row">
						<!-- sidebar of the Page start here -->
						<aside id="sidebar" class="col-xs-12 col-sm-4 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
							<!-- shop-widget filter-widget of the Page start here -->
							<section class="shop-widget filter-widget bg-grey">
								<h2>FILTER</h2>
								<span class="sub-title">Filter by Products</span>
								<!-- nice-form start here -->
								<ul class="list-unstyled nice-form">
                                                                    <?php
                                                                        $res2=mysqli_query($con,"SELECT * FROM product WHERE p_id=$prodid");//
                                                                        if($res2)
                                                                        {
                                                                            $ro2=mysqli_fetch_array($res2);
                                                                            $cid=$ro2['pc_id'];
                                                                            $res3=mysqli_query($con,"SELECT * FROM product WHERE pc_id=$cid");
                                                                            if($res3)
                                                                            {
                                                                                
                                                                                while($ro3=mysqli_fetch_array($res3))
                                                                                {
                                                                                    $pcid=$ro3['p_id'];
                                                                                ?>
                                                                                <li>

											<a href="productview.php?prodid=<?php echo $pcid;?>"><span class="fake-label"><?php echo $ro3['p_name']; ?></span></a>
								                   <?php
                                                                                 $res4=mysqli_query($con,"SELECT COUNT(model_id) AS count FROM model WHERE mp_id=$pcid");
                                                                                 if($res4)
                                                                                 {
                                                                                  $ro4=mysqli_fetch_array($res4);
                                                                                    
                                                                                        ?>
                                                                                        <span class="num"><?php echo $ro4['count']; ?></span>
                                                                                        <?php
                                                                                    
                                                                                 }
                                                                                   
                                                                                   ?>
                                                                                 
										
									       </li>
                                                                             
                                                                                <?php
                                                                             }
                                                                            }
                                                                        }
                                                                    ?>
									

									
								</ul><!-- nice-form end here -->
								
                                                                   
								
							</section><!-- shop-widget filter-widget of the Page end here -->
							<!-- shop-widget of the Page start here -->
							<section class="shop-widget">
								<h2>CATEGORIES</h2>
								<!-- category list start here -->
								<ul class="list-unstyled category-list">
                                                                    <?php
                                                                        $res5=mysqli_query($con,"SELECT * FROM category");
                                                                        if($res5)
                                                                        {
                                                                            while($ro5=mysqli_fetch_array($res5))
                                                                            {
                                                                                $caid=$ro5['c_id'];
                                                                                ?>
                                                                                <li>
                                                                                    <a href="#">
                                                                                            <span class="name"><?php echo $ro5['c_name']; ?></span>
                                                                                            <?php
                                                                                             $res6=mysqli_query($con,"SELECT COUNT(*) AS counter FROM product WHERE pc_id IN(SELECT c_id FROM category WHERE c_id=$caid)");
                                                                                             $ro6=mysqli_fetch_array($res6);
                                                                                            ?>
                                                                                            <span class="num"><?php echo $ro6['counter']; ?></span>
                                                                                    </a>
								         	</li>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        
                                                                    ?>
									
									
									
									
									
								</ul><!-- category list end here -->
							</section><!-- shop-widget of the Page end here -->
						
							
						</aside><!-- sidebar of the Page end here -->
						<div class="col-xs-12 col-sm-8 col-md-9 wow fadeInRight" data-wow-delay="0.4s">
							<!-- mt shoplist header start here -->
							
							<!-- mt productlisthold start here -->
							<ul class="mt-productlisthold list-inline">
								
									<!-- mt product1 large start here -->
										
                                                                                                    <?php
                                                                                                       
                                                                                                        $res7=mysqli_query($con,"SELECT * FROM model WHERE mp_id=$prodid");
                                                                                                        if($res7)
                                                                                                        {
                                                                                                            while($ro7=mysqli_fetch_array($res7))
                                                                                                            {
                                                                                                                $modid=$ro7['model_id'];
                                                                                                                $res8=mysqli_query($con,"SELECT AVG(i_price) AS price FROM item WHERE imodel_id IN(SELECT model_id FROM model WHERE model_id=$modid)");
                                                                                                                $ro8=mysqli_fetch_array($res8);
                                                                                                                 $res9=mysqli_query($con,"SELECT COUNT(*) AS c FROM item WHERE imodel_id=$modid");
                                                                                                                 $ro9=mysqli_fetch_array($res9);
                                                                                                                ?>
                                                                                                                <li>
                                                                                                    	      <div class="mt-product1 large" style="margin-left: 20px;">
                                                                                                                <div class="box">
                                                                                                                    <div class="b1">
                                                                                                                            <div class="b2">
                                                                                                                                <?php
                                                                                                                                $reslt=mysqli_query($con,"SELECT * FROM item WHERE imodel_id=$modid LIMIT 1");
                                                                                                                                    $rw=mysqli_fetch_array($reslt);
                                                                                                                                    $iid=$rw['i_id'];
                                                                                                                                ?>
                                                                                                                <a href="productdetail.php?itemid=<?php echo $iid;?>"><img src="../imgs/<?php echo $ro7['model_img']; ?>" alt="image description"></a>
                                                        
                                                                                                               
                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                	<div class="txt">
                                                                                                                                <strong class="title" style="font-weight: bolder; color: black;"><a href="productdetail.php?itemid=<?php echo $iid;?>"><?php echo $ro7['model_name']; ?></a></strong>
                                                                                                                                <span style="font-family: cursive;font-size: medium;color: #590059;"><?php echo $ro9['c']; ?> Items from this model</span>
                                                                                                                                <span class="price"><i class="fa fa-eur"></i> <span><?php echo $ro8['price']; ?></span></span>
                                                                                                                        </div>
                                                                                                                  </div>
                                                                                                        </li>
                                                                                                                <?php
                                                                                                            }
                                                                                                        }
                                                                                                    ?>
													
												
									
									<!-- mt product1 center end here -->
								
						
							</ul><!-- mt productlisthold end here -->
							<!-- mt pagination start here -->
							
						</div>
					</div>
				</div>
			</main><!-- mt main end here -->
			
		</div><!-- W1 end here -->
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

<!-- Mirrored from htmlbeans.com/html/schon/product-grid-view.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 16:14:04 GMT -->
</html>