<?php
    session_start();
    
 $conn=mysqli_connect("localhost","root","","missing_portal");
 if(!$conn)
 {
     die("could not connect".mysqli_error());
 }
 mysqli_select_db($conn,"missing_portal");
 
 if(!isset($_SESSION['x']))
 header("location:police_login.php");
 
     $email=$_SESSION['email'];
     $result1=mysqli_query($conn,"SELECT p_name FROM police_station where email='$email'");
   
     $q2=mysqli_fetch_assoc($result1);
     $p_name=$q2['p_name'];

    //  $query="select m_id,u_name,mobile,crime_type,p_name,date,description,image from missing where p_name='$p_name' order by m_id desc";
    //  $result=mysqli_query($conn,$query);  
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

    <title>Update Complaint</title>
</head>

<body>

    <div class="dropdwn">
        <nav>
            <label class="logo">Crime Portal</label>
            <ul>
                <li><a href="police_home.php">Back</a></li>
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
                                    <th scope="col">Complainer Name</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Type of Crime</th>
                                    <th scope="col">Date of Crime</th>
                                    <th scope="col">Station Name</th>
                                    <th scope="col">Complaint Details</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                //    while($rows=mysqli_fetch_assoc($result)){
                                    $query = "SELECT * FROM missing WHERE p_name='$p_name'";
                                    $query_run = mysqli_query($conn, $query);

                                 if(mysqli_num_rows($query_run) > 0)
                                 {
                                     foreach($query_run as $rows)
                                     {
                                   ?>
                                <tr>
                                    <td><?php echo $rows['m_id']; ?></td>
                                    <td><?php echo $rows['u_name']; ?></td>
                                    <td><?php echo $rows['mobile']; ?></td>
                                    <td><?php echo $rows['crime_type']; ?></td>
                                    <td><?php echo $rows['date']; ?></td>
                                    <td><?php echo $rows['p_name']; ?></td>
                                    <td style="max-width: 25vw;"><?php echo $rows['description']; ?></td>
                                    <td><img src=" <?php echo $rows['image']; ?>" height="100px" width="100px"></td>
                                    <td>
                                        <?php 
                                                if(!$rows['close'])
                                                {
                                                    ?>
                                        <a href="police_mupdate.php?m_id=<?= $rows['m_id']; ?>"
                                            class="btn btn-success btn-sm my-2">Update</a>
                                        <a href="police_views_mupdate.php?m_id=<?= $rows['m_id']; ?>"
                                            class="btn btn-success btn-sm my-2">View Update</a>
                                        <form action="close_missing.php" method="POST" class="d-inline">
                                            <button type="submit" name="close" value="<?=$rows['m_id'];?>"
                                                class="btn btn-danger btn-sm my-2">Close</button>
                                        </form>
                                        <?php    
                                                 }else{
                                                    ?><h6>Case Closed</h6> <?php }?>
                                    </td>
                                </tr>
                                <?php
                                        }
                                 }
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