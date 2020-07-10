<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    $result=mysqli_query($con,"SELECT * FROM category");
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                             <th>Category desc</th>
                              <th>Category Image</th>
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
                            <td><?php echo $row['c_id']; ?></td>
                            <td><?php echo $row['c_name']; ?></td>
                             <td><?php echo $row['c_desc']; ?></td>                                     
                           <td><img src="../imgs/<?php echo $row['c_img']; ?>" style="width: 250px; height: 250px;"></td>
                            <td><a href="editcategory.php?cid=<?php echo $row['c_id']; ?>">edit</a></td>
                            <td><a href="deletecategory.php?cid=<?php echo $row['c_id']; ?>">delete</a></td>
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
            redirect("2","addcategory.php");
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
        redirect(2,"viewcategory.php");
    }
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>