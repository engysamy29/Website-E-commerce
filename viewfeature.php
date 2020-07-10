<?php
ob_start();
session_start();
include_once("../framework/sitefunc.php");
include_once("../framework/config.php");



if(isset($_SESSION['log']))
{
    // logged in
    include_once("header.php");
    $result=mysqli_query($con,"SELECT * FROM feature");
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Feature ID</th>
                            <th>Feature Name</th>
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
                            <td><?php echo $row['f_id']; ?></td>
                            <td><?php echo $row['f_name']; ?></td>
                            <td><a href="editfeature.php?fid=<?php echo $row['f_id']; ?>">edit</a></td>
                            <td><a href="deletefeature.php?fid=<?php echo $row['f_id']; ?>"><span style="color: red">delete</span></a></td>
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
            redirect("2","addfeature.php");
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
        redirect(2,"viewfeature.php");
    }
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>