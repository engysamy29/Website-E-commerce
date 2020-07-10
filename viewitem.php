<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    $result=mysqli_query($con,"SELECT * FROM item");
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table table-hover" style="margin-left: -35px;">
                    <thead>
                        <tr>
                            
                            <th> Item ID</th>
                            <th> Item Description</th>
                            <th>Model Name</th>
                            <th>Product name</th>
                            <th>Category name</th>
                            <th> Item Price</th>
                              <th>Item Image</th>
                             
                             <th>Edit</th>
                             <th>ADD to inv</th>
                             <th>ADD Feature to item</th>
                            <th>ADD Color to item</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    
            <?php
            while($row=mysqli_fetch_array($result)) //row feha array item
            {
                ?>
                        <tr>
                            
                            <td><?php echo $row['i_id']; ?></td>
                            <td><?php echo $row['i_des']; ?></td>
                            
                            <?php
                            $imid=$row['imodel_id'];
                            $result1= mysqli_query($con,"SELECT * FROM model WHERE model_id='$imid'");
                            if($result1)
                            {
                                $row1=mysqli_fetch_array($result1); //row1 feha array model
                                $mname=$row1['model_name'];
                                $mpid=$row1['mp_id'];
                                ?>
                                <td><?php echo $row1['model_name']; ?></td>
                                <?php
                               
                                
                                $result2= mysqli_query($con,"SELECT * FROM product WHERE p_id='$mpid'");
                                if($result2)
                                 {
                                 $row3=mysqli_fetch_array($result2); //row3 feha product
                                 $pname=$row3['p_name'];
                                 $pcid=$row3['pc_id'];
                                 ?>
                                  <td><?php echo $row3['p_name']; ?></td>
                                 <?php
                                 $result3= mysqli_query($con,"SELECT c_name FROM category WHERE c_id='$pcid'");
                                 if($result3)
                                 {
                                    $row4=mysqli_fetch_array($result3); //row4 feha category
                                  ?>
                                  <td><?php echo $row4['c_name']; ?></td>
                                  <td><?php echo $row['i_price']; ?></td>
                                  <?php
                                 }
                                 }
                            }
                            ?>
                            
                            
                           <td><img src="../imgs/<?php echo $row['i_imag']; ?>" style="width: 200px; height: 200px;"></td>
                           
                            <td><a href="edititem.php?itemid=<?php echo $row['i_id']; ?>">edit</a></td>
                             <td><a href="Addtoinv.php?itemid=<?php echo $row['i_id']; ?>">add</td>
                             <td><a href="Addfeatureiteam.php?itemid=<?php echo $row['i_id']; ?>">add</a></td>
                             <td><a href="addcoloritem.php?itemid=<?php echo $row['i_id']; ?>">add</a></td>
                            <td><a href="deleteitem.php?itemid=<?php echo $row['i_id']; ?>">delete</a></td>
                           
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
        redirect(2,"viewitem.php");
    }
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>