<?php
    session_start();
    require 'dbcon.php';

    if(isset($_POST['close']))
{
    $c_id = mysqli_real_escape_string($con, $_POST['close']);

    $query ="UPDATE `complaint` SET `close`= '1' WHERE `c_id`='$c_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header("Location: police_home.php");
    }
}
?>