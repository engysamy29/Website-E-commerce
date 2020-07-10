<?php
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");
$res4=mysqli_query($con,"SELECT COUNT (p_id) AS T FROM product WHERE pc_id=4");
$ro4=mysqli_fetch_array($res4);
echo $ro4['T'];
?>

 <ul class="links">
                                                                                                                        <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a></li>
                                                                                                                        <li><a href="#"><i class="icomoon icon-heart-empty"></i></a></li>  
                                                                                                                </ul>