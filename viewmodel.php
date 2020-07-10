<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    $result=mysqli_query($con,"SELECT * FROM model");
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th> Model ID</th>
                            <th>Model Name</th>
                            <th>Product name</th>
                            <th>Category name</th>
                              <th>Model Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    
            <?php
            while($row=mysqli_fetch_array($result))
            {
                ?>
                        <tr>
                            
                            <td><?php echo $row['model_id']; ?></td>
                            <td><?php echo $row['model_name']; ?></td>
                            <?php
                            $mpid=$row['mp_id'];
                            $result1= mysqli_query($con,"SELECT * FROM product WHERE p_id='$mpid'");
                            if($result1)
                            {
                                $row1=mysqli_fetch_array($result1);
                                $pname=$row1['p_name'];
                                $pcid=$row1['pc_id'];
                                ?>
                                <td><?php echo $row1['p_name']; ?></td>
                                <?php
                               
                                
                                $result2= mysqli_query($con,"SELECT c_name FROM category WHERE c_id='$pcid'");
                                if($result2)
                                 {
                                 $row3=mysqli_fetch_array($result2);
                                 $cname=$row3['c_name'];
                                 ?>
                                  <td><?php echo $row3['c_name']; ?></td>
                                 <?php
                                 }
                            }
                            ?>
                            
                            
                           <td><img src="../imgs/<?php echo $row['model_img']; ?>" style="width: 200px; height: 200px;"></td>
                           
                            <td><a href="editmodell.php?modid=<?php echo $row['model_id']; ?>"><span>edit</span></a></td>
                            <td><a href="deletemodel.php?modid=<?php echo $row['model_id']; ?>"><span style="color: red" >delete</span></a></td>
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
            redirect("2","addmodel.php");
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
        redirect(2,"viewmodel.php");
    }
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>