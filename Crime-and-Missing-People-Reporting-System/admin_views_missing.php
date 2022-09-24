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

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" /> -->

    <link rel="stylesheet" href="style.css">

    <title>Admin Views Missing</title>
</head>
<style>
body {
    width: 100%;
    height: 100vh;
    background-image: url(https://origin-staticv2.sonyliv.com/landscape_thumb/CP_rev_14april_landscape_thumb.jpg);
    /* background-repeat: no-repeat;
    background-size: cover; */
    overflow-x: scroll;
}
</style>

<body>
    <nav>
        <label class="logo">Crime Portal</label>
        <ul>
            <li><a href="admin_home.php">Back</a></li>

        </ul>
    </nav>

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Missing Complaint Details

                        </h4>

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Missing Id</th>
                                    <th>User Name</th>
                                    <th>Mobile Number</th>
                                    <th>Type of Missing</th>
                                    <th>Date</th>
                                    <th>City</th>
                                    <th>Station Name</th>
                                    <th>Complaint Details</th>
                                    <th>Image</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM missing";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $result)
                                        {
                                            ?>
                                <tr>
                                    <td><?php echo $result['m_id']; ?></td>
                                    <td><?php echo $result['u_name']; ?></td>
                                    <td><?php echo $result['mobile']; ?></td>
                                    <td><?php echo $result['crime_type']; ?></td>
                                    <td><?php echo $result['date']; ?></td>
                                    <td><?php echo $result['city']; ?></td>
                                    <td><?php echo $result['p_name']; ?></td>
                                    <td style="max-width: 25vw;"><?php echo $result['description']; ?></td>
                                    <td><img src=" <?php echo $result['image']; ?>" height="100px" width="100px"></td>
                                    <td>
                                        <a href="admin_views_mupdate.php?m_id=<?= $result['m_id']; ?>"
                                            class="btn btn-success btn-sm">View Update</a>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
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