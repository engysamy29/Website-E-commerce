<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    $result=mysqli_query($con,"SELECT * FROM color");
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Color ID</th>
                            <th>color</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    
            <?php
            while($row=mysqli_fetch_array($result))
            {
                ?>
                        <tr>
                            <td><?php echo $row['cl_id']; ?></td>
                            <td><div style="width: 40px;height: 40px; background: <?php echo $row['cl_name']?>"></div></td>
                            <td><a href="deletecolor.php?cid=<?php echo $row['cl_id']; ?>"><span style="color: red">Delete</span></a></td>
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
            redirect("2","addcolor.php");
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
        redirect(2,"viewcolor.php");
    }
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>