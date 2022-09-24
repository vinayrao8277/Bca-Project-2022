<?php
    // session_start();
    include 'dbcon.php';
?>

<div class="containor mt-4 ">
    <?php
    include 'message.php';
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><b>Stats</b>
                        <!-- <a href="add_admin.php" class="btn btn-primary float-end">Add Admin</a> -->
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th>Number of Users</th>
                            <th> Total Number of Complaint</th>
                            <th> Total Number of Missing Complaint</th>

                            <th>Today's Complaint</th>
                            <th>Weekly Complaint</th>
                            <th>Monthly Complaint</th>

                        </tr>


                        <?php
                                $sql1="SELECT * FROM user";
                                $result1 =mysqli_query($con,$sql1);
                                $row1 = mysqli_num_rows($result1);

                                $sql2="SELECT * FROM complaint";
                                $result2 =mysqli_query($con,$sql2);
                                $row2 = mysqli_num_rows($result2);
                                $sql3="SELECT * FROM missing";
                                $result3 =mysqli_query($con,$sql3);
                                $row3 = mysqli_num_rows($result3);
                                $total= $row2+$row3;

                                $sql4="SELECT * FROM missing";
                                $result4 =mysqli_query($con,$sql4);
                                $row4 = mysqli_num_rows($result4);



                                $sql5="SELECT * FROM complaint WHERE `date`>curdate()";
                                $result5 =mysqli_query($con,$sql5);
                                $row5 = mysqli_num_rows($result5);
                                $sql6="SELECT * FROM missing WHERE `m_date`>curdate()";
                                $result6 =mysqli_query($con,$sql6);
                                $row6 = mysqli_num_rows($result6);
                                $total1= $row5+$row6;

                                $sql7="SELECT * FROM complaint WHERE `date`>now() - interval 7 day";
                                $result7 =mysqli_query($con,$sql7);
                                $row7 = mysqli_num_rows($result7);
                                $sql8="SELECT * FROM missing WHERE `m_date`>curdate()";
                                $result8 =mysqli_query($con,$sql8);
                                $row8 = mysqli_num_rows($result8);
                                $total2= $row7+$row8;

                                $sql9="SELECT * FROM complaint WHERE `date`>now() - interval 30 day";
                                $result9 =mysqli_query($con,$sql9);
                                $row9 = mysqli_num_rows($result9);
                                $sql10="SELECT * FROM missing WHERE `m_date`>curdate()";
                                $result10 =mysqli_query($con,$sql10);
                                $row10 = mysqli_num_rows($result10);
                                $total3= $row9+$row10;

                            ?>
                        <tr>
                            <td><?= $row1; ?> </td>
                            <td><?= $total; ?> </td>
                            <td><?= $row4; ?> </td>
                            <td><?= $total1; ?> </td>
                            <td><?= $total2; ?> </td>
                            <td><?= $total3; ?> </td>

                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>