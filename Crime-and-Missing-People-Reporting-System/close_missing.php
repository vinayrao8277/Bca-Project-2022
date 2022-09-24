<?php
    session_start();
    require 'dbcon.php';

    if(isset($_POST['close']))
{
    $m_id = mysqli_real_escape_string($con, $_POST['close']);

    $query ="UPDATE `missing` SET `close`= '1' WHERE `m_id`='$m_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header("Location: police_views_missing.php");
    }
}
?>