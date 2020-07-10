<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    $result=mysqli_query($con,"SELECT * FROM branch");
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Branch ID</th>
                            <th>Branch Name</th>
                             <th>Branch City</th>
                             <th>Add new Branch phone Number</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    
            <?php
            while($row=mysqli_fetch_array($result))
            {
                ?>
                        <tr>
                            <td><?php echo $row['b_id']; ?></td>
                            <td><?php echo $row['b_name']; ?></td>
                             <td><?php echo $row['b_city']; ?></td>
                             <td><a href="addbranchnumber.php?branchid=<?php echo $row['b_id']; ?>">add</a></td>
                            <td><a href="deletebranch.php?branchid=<?php echo $row['b_id']; ?>">delete</span></a></td>
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
            redirect("2","addbranch.php");
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
        redirect(2,"viewbranch.php");
    }
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>