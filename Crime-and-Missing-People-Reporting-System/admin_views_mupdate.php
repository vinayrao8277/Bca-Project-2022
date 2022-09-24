<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <title>view update</title>
</head>

<body>
    <nav>
        <label class="logo">Crime Portal</label>
        <ul>
            <li><a href="admin_views_missing.php">Back</a></li>

        </ul>
    </nav>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Updated Details
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Missing Id</th>
                                    <th>Police Station Name</th>
                                    <th>Police Station Number</th>
                                    <th>Complaint Status</th>
                                    <th>Date of Update</th>
                                    <th>Case Update Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($_GET['m_id']))
                        {
                         $m_id = mysqli_real_escape_string($con, $_GET['m_id']);
                           $query = "SELECT * FROM update_case WHERE m_id='$m_id'";
                           $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $result)
                                        {
                                            ?>
                                <tr>
                                    <td><?php echo $result['m_id']; ?></td>
                                    <td><?php echo $result['p_name']; ?></td>
                                    <td><?php echo $result['p_mobile']; ?></td>
                                    <td><?php echo $result['status']; ?></td>
                                    <td><?php echo $result['u_date']; ?></td>
                                    <td><?php echo $result['case_update']; ?></td>
                                </tr>
                                <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>