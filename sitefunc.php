<?php
function redirect($sec,$url)
{
    header("refresh:$sec;url=$url");
}

function validate($data)
{
    $data=trim($data);
    $data=htmlspecialchars($data);
    
    return $data;
}
######################################


function enc_pass($data)
{
    $data=md5($data);
    $data=substr($data,10,5);
    $data=sha1($data);
    $data=substr($data,15,5);
    
    return $data;
}

########################################

function output_msg($status,$msg)
{
    ?>
        <div class="alert
                        <?php
                            if($status=="s")
                                echo "alert-success";
                            else
                                echo "alert-danger"; ?>
                    ">
            <?php echo $msg; ?>
        </div>
    
    <?php
}

##############################################################




?>