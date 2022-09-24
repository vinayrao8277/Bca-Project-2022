 <?php
    session_start();
    require 'dbcon.php';

    if(isset($_POST['delete_police']))
{
    $p_id = mysqli_real_escape_string($con, $_POST['delete_police']);

    $query = "DELETE FROM police_station WHERE p_id='$p_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        ?>
        <script>
        alert("Station Deleted Successfully");
        window.location.replace('admin_home.php');
        </script>
        <?php
    }
    else
    {
        $_SESSION['message'] = "Police Station Not Deleted";
        header("Location: admin_home.php");
        exit(0);
    }
}
?>
 <!doctype html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">


     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <link rel="stylesheet" href="style.css">

     <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.6.3/css/all.css">

     <title>Admin Home</title>
 </head>
 <style>
body {
    width: 100%;
    height: 100vh;
    background-image: url(https://origin-staticv2.sonyliv.com/landscape_thumb/CP_rev_14april_landscape_thumb.jpg);
    /* background-repeat: no-repeat;
    background-size: cover; */
    /* width: 600px;
    height: 200px; */
    overflow-x: scroll;
}
 </style>

 <body>


     <div class="dropdwn">
         <nav>
             <label class="logo">Crime Portal</label>
             <ul>
                 <li><a href="home.php">Home</a></li>
                 <li><a href="admin_add_police_station.php">Add Police Station</a></li>
                 <li><a href="#">View Complaint</a>
                     <ul>
                         <li><a href="admin_views_complaint.php">Crime</a></li>
                         <li><a href="admin_views_missing.php">Missing</a></li>
                     </ul>
                 </li>
                 <li><a href="#">Admin View</a>
                     <ul>
                         <li><a href="admin_views_user.php">User</a></li>
                         <li><a href="admin_views_feedback.php">Feedback</a></li>
                     </ul>
                 </li>
                 <li><a href="#">Report</a>
                     <ul>
                         <li><a href="admin_report_crime.php">Crime</a></li>
                         <li><a href="admin_report_missing.php">Missing</a></li>
                     </ul>
                 </li>
                 <li><a href="logout.php">Logout</a></li>
             </ul>

         </nav>

     </div>
     <?php
include('admin_stats.php')
?>

     <div class="container mt-4">


         <?php include('message.php'); ?>

         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h4>Police Station Details
                         </h4>
                     </div>
                     <div class="card-body">

                         <table class="table table-bordered table-striped">
                             <thead>
                                 <tr>
                                     <th scope="col">Police Station Id</th>
                                     <th scope="col">Police Station Name</th>
                                     <th scope="col">Email</th>
                                     <th scope="col">Password</th>
                                     <th scope="col">Mobile Number</th>
                                     <th scope="col">Address</th>
                                     <th scope="col">Location</th>
                                     <th scope="col">Pincode</th>
                                     <th scope="col">Manage</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php 
                                    $query = "SELECT * FROM police_station";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $result)
                                        {
                                            ?>
                                 <tr>
                                     <td><?php echo $result['p_id']; ?></td>
                                     <td><?php echo $result['p_name']; ?></td>
                                     <td><?php echo $result['email']; ?></td>
                                     <td><?php echo $result['p_pass']; ?></td>
                                     <td><?php echo $result['p_mobile']; ?></td>
                                     <td><?php echo $result['p_addr']; ?></td>
                                     <td><?php echo $result['location']; ?></td>
                                     <td><?php echo $result['pincode']; ?></td>
                                     <td>
                                         <a href="admin_update_police_station.php?p_id=<?= $result['p_id']; ?>"
                                             class="btn btn-success btn-sm my-2">Update</a>
                                         <form action="#" method="POST" class="d-inline">
                                             <button type="submit" name="delete_police" value="<?=$result['p_id'];?>"
                                                 class="btn btn-danger btn-sm my-2">Delete</button>
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