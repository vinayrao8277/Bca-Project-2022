<?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location: admin_login.php");
    $conn=mysqli_connect("localhost","root","","missing_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"missing_portal");
    
    $query="select c_id,u_name,mobile,city,p_name,crime_type,d_o_c,description,image from complaint";
    $result=mysqli_query($conn,$query);  
    ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <link rel="stylesheet" href="style.css">

    <title>Admin Views Complaint</title>
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
    <div class="dropdwn">
        <nav>
            <label class="logo">Crime Portal</label>
            <ul>
                <li><a href="admin_home.php">back</a></li>
            </ul>
        </nav>
    </div>
    <div class="menu-bar">
        <div class="container mt-4">
            <?php include('message.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Complaint Details
                            </h4>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Complaint ID</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Mobile Number</th>
                                        <th scope="col">Type of Missing</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">city</th>
                                        <th scope="col">Station Name</th>
                                        <th scope="col">Complaint Details</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Updates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    //    $query = "SELECT * FROM missing";
                                    //    $query_run = mysqli_query($conn, $query);
   
                                    //    if(mysqli_num_rows($query_run) > 0)
                                    //    {
                                    //        foreach($query_run as $result)
                                    //        {
                                      while($rows=mysqli_fetch_assoc($result)){
                                    
                                            ?>
                                    <tr>
                                        <td><?php echo $rows['c_id']; ?></td>
                                        <td><?php echo $rows['u_name']; ?></td>
                                        <td><?php echo $rows['mobile']; ?></td>
                                        <td><?php echo $rows['crime_type']; ?></td>
                                        <td><?php echo $rows['d_o_c']; ?></td>
                                        <td><?php echo $rows['city']; ?></td>
                                        <td><?php echo $rows['p_name']; ?></td>
                                        <td style="max-width: 20vw;"><?php echo $rows['description']; ?></td>
                                        <td><img src=" <?php echo $rows['image']; ?>" height="100px" width="100px">
                                        </td>
                                        <td>
                                            <a href="admin_views_cupdates.php?c_id=<?= $rows['c_id']; ?>"
                                                class="btn btn-success btn-sm">View Update</a>
                                        </td>
                                    </tr>
                                    <?php
                                      }
                                    // }
                                    //   else
                                    // {
                                    //     echo "<h5> No Record Found </h5>";
                                    // }
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