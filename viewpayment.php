<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    $result=mysqli_query($con,"SELECT * FROM paytype");
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Payment Type ID</th>
                            <th>Payment Name</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    
            <?php
            while($row=mysqli_fetch_array($result))
            {
                ?>
                        <tr>
                            <td><?php echo $row['pt_id']; ?></td>
                            <td><?php echo $row['pt_name']; ?></td>
                            <td><a href="deletepayment.php?pid=<?php echo $row['pt_id']; ?>"><span style="color: red" >delete</span></a></td>
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
            redirect("2","addpayment.php");
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
        redirect(2,"viewpayment.php");
    }
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>