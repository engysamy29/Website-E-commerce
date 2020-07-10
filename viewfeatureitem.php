<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    $result=mysqli_query($con,"SELECT * FROM featureitem");
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
 
                            <th>Feature name</th>
                            <th>Model name</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    
            <?php
            while($row=mysqli_fetch_array($result)) //row feha array featureitem
            {
                $itemid=$row['if_id'];
                $featureid=$row['fi_id'];
                ?>
                        <tr>
                            <?php
                            $result1= mysqli_query($con,"SELECT f_name FROM feature WHERE f_id='$featureid'");
                                 if($result1)
                                 {
                                    $row1=mysqli_fetch_array($result1); //row1 feha feature
                                  ?>
                                  <td><?php echo $row1['f_name']; ?></td>
                                  <?php
                                $result2= mysqli_query($con,"SELECT imodel_id FROM item WHERE i_id='$itemid'");
                                if($result2)
                                 {
                                 $row3=mysqli_fetch_array($result2); //row3 feha item
                                 $modelid=$row3['imodel_id'];
                                 ?>
                                 <?php
                                 $result3= mysqli_query($con,"SELECT model_name FROM model WHERE model_id='$modelid'");
                                 if($result3)
                                 {
                                    $row4=mysqli_fetch_array($result3); //row4 feha model
                                  ?>
                                  <td><?php echo $row4['model_name']; ?></td>
                                  <td><?php echo $row['value']; ?></td>
                                  <?php
                                 }
                                 }
                                 }
                            ?>
                        </tr>
                <?php
            }
            ?>
                    </tbody>
                </table>
            <?php
        }
        else
        {
            output_msg("f","There is no data");
            redirect("2","additem.php");
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
        redirect(2,"viewinv.php");
    }
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>