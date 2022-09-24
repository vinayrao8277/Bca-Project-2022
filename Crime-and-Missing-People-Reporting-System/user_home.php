<?php
 session_start();
    
 $conn=mysqli_connect("localhost","root","","missing_portal");
 if(!$conn)
 {
     die("could not connect".mysqli_error());
 }
 mysqli_select_db($conn,"missing_portal");
 
 if(!isset($_SESSION['x']))
 header("location:user_login.php");
 
     $email=$_SESSION['email'];
     $result1=mysqli_query($conn,"SELECT mobile FROM user where email='$email'");
   
     $q2=mysqli_fetch_assoc($result1);
     $mobile=$q2['mobile'];

     $query="select c_id,city,crime_type,d_o_c,p_name,description,image from complaint where mobile='$mobile' order by c_id desc";
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

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" /> -->

    <link rel="stylesheet" href="style.css">

    <title>View Complaint</title>
</head>

<body>
    <div class="dropdwn">
        <nav>
            <label class="logo">Crime Portal</label>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="user_views_missing.php">View Missing</a></li>
                <li><a href="#">Add Complaint</a>
                    <ul>
                        <li><a href="user_add_crime.php">Crime</a></li>
                        <li><a href="user_add_missing.php">Missing</a></li>
                    </ul>
                </li>
                <li><a href="#">Feedback</a>
                    <ul>
                        <li><a href="user_gives_feedback.php">Give Feedback</a></li>
                        <li><a href="user_views_feedback.php">view Feedback</a></li>
                    </ul>
                </li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>

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
                                    <th scope="col">Complaint Id</th>
                                    <th scope="col">Type of Crime</th>
                                    <th scope="col">Date of Crime</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Station Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Updates</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                //   $query = "SELECT * FROM complaint";
                                //   $query_run = mysqli_query($conn, $query);

                                //   if(mysqli_num_rows($query_run) > 0)
                                //   {
                                //       foreach($query_run as $result)
                                //       { 
                                     while($rows=mysqli_fetch_assoc($result)){
                                            ?>
                                <tr>
                                    <td><?php echo $rows['c_id']; ?></td>
                                    <td><?php echo $rows['crime_type']; ?></td>
                                    <td><?php echo $rows['d_o_c']; ?></td>
                                    <td><?php echo $rows['city']; ?></td>
                                    <td><?php echo $rows['p_name']; ?></td>
                                    <td style="max-width: 25vw;"><?php echo $rows['description']; ?></td>
                                    <td><img src=" <?php echo $rows['image']; ?>" height="100px" width="100px"></td>
                                    <td>
                                        <a href="user_views_cupdates.php?c_id=<?= $rows['c_id']; ?>"
                                            class="btn btn-success btn-sm my-2">View Update</a>
                                    </td>
                                </tr>=
                                <?php
                                        }
                                    // }
                                    // else
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