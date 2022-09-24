<?php
 session_start();
    
 $conn=mysqli_connect("localhost","root","","missing_portal");
 if(!$conn)
 {
     die("could not connect".mysqli_error());
 }
 mysqli_select_db($conn,"missing_portal");
 
 if(!isset($_SESSION['x']))
 header("location:police_station.php");
 
     $email=$_SESSION['email'];
     $result1=mysqli_query($conn,"SELECT p_name FROM police_station where email='$email'");
   
     $q2=mysqli_fetch_assoc($result1);
     $p_name=$q2['p_name'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>
<nav>
        <label class="logo">Crime Portal</label>
        <ul>
            <li><a href="police_home.php">Back</a></li>

        </ul>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 style="text-align: center;">GENERATE REPORT</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date"
                                            value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date"
                                            value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Generate Report</label> <br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>Missing ID</th>
                                    <th>User Name</th>
                                    <th>Mobile</th>
                                    <th>Missing Type</th>
                                    <th>Date</th>
                                    <th>City</th>
                                    <th>Police Station</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $con = mysqli_connect("localhost","root","","missing_portal");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];
                                   


                                    $query = "SELECT * FROM missing WHERE p_name='$p_name' AND m_date BETWEEN '$from_date' AND '$to_date'";
                                
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                <tr>
                                    <td><?= $row['m_id']; ?></td>
                                    <td><?= $row['u_name']; ?></td>
                                    <td><?= $row['mobile']; ?></td>
                                    <td><?= $row['crime_type']; ?></td>
                                    <td><?= $row['d_o_c']; ?></td>
                                    <td><?= $row['city']; ?></td>
                                    <td><?= $row['p_name']; ?></td>
                                </tr>
                                <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>