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
                                                                        <?php
                                                                        if(isset($_SESSION['lo']))
                                                                        {
                                                                        ?>
									<li class="drop">
										<a href="#" class="cart-opener">
											<span class="icon-heart"></span>
											<span class="num"><?php
                                                                                                                $res15=mysqli_query($con,"SELECT COUNT(*) AS wish FROM wishitem");
                                                                                                                $rw15=mysqli_fetch_array($res15);
                                                                                                                echo $rw15['wish'];
                                                                                                                ?></span>
										</a>
										<div class="mt-drop">
											<!-- mt drop sub start here -->
											<div class="mt-drop-sub">
												<!-- mt side widget start here -->
												<div class="mt-side-widget">
													<!-- cart row start here -->
													<div class="cart-row">
                                                                                                            <?php
                                                                                                            $rr4=mysqli_query($con,"CREATE VIEW wishitem AS (SELECT * FROM wishlist )");
                                                                                                            $result=mysqli_query($con,"SELECT * FROM wishitem");//fiha el wishlist
                                                                                                            if($result)
                                                                                                            {
                                                                                                                if(mysqli_num_rows($result)>0)
                                                                                                                {
                                                                                                                    while($row=mysqli_fetch_array($result))
                                                                                                                    {
                                                                                                                        $itemid=$row['iit_id'];
                                                                                                                        $result12=mysqli_query($con,"CREATE VIEW itemwished AS(SELECT * FROM item WHERE i_id=$itemid)");
                                                                                                                        $result1=mysqli_query($con,"SELECT * FROM itemwished");
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
                                                                                                                        <img src="../imgs/<?php echo $row1['i_imag']; ?>" alt="image" class="img-responsive">
														<div class="mt-h">
															<span class="mt-h-title"><?php echo $modelname; ?></span>
															<span class="price"><i class="fa fa-eur" aria-hidden="true"></i><?php echo $row1['i_price'];?></span>
														</div>
														
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
										<?php
                                                                        }
                                                                                ?>
									</li>
                                                                        <?php
                                                                    if(isset($_SESSION['lo']))
                                                                    {
                                                                    ?>
                                                                        <li>
										<a href="addtocart.php">
											<span class="icon-handbag"></span>
											<span class="num"><?php
                                                                                        $iyy=$_SESSION['us_id'];
                                                                                        $res11=mysqli_query($con,"SELECT COUNT(*) AS c FROM addtocart WHERE usr_id=$iyy");
                                                                                        $rw12=mysqli_fetch_array($res11);
                                                                                        echo $rw12['c'];
                                                                                        ?></span>
										</a>
										
										
									</li>
									<?php
                                                                    }
                                                                        ?>
								</ul><!-- mt icon list end here -->
								<!-- navigation start here -->
								<nav id="nav">
									<ul>
                                                                            <li><?php if(isset($_SESSION['lo'])){?> <span>Welcome </span><?php echo $_SESSION['us_name'];}?> !</li>
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
				<!-- mt bottom bar end here -->
				<span class="mt-side-over"></span>
			</header>