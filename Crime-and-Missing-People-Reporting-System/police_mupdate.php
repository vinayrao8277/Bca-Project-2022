<?php
session_start();
require "dbcon.php";
?>
<?php
  if(!isset($_SESSION['x']))
  header("location:police_home.php");

$con=mysqli_connect("localhost","root","","missing_portal");
if(!$con)
{
  die("could not connect".mysqli_error());
}
mysqli_select_db($con,"missing_portal");
  
$email=$_SESSION['email'];
    
$result=mysqli_query($con,"SELECT p_mobile FROM police_station where email='$email' ");
$q2=mysqli_fetch_assoc($result);
$p_mobile=$q2['p_mobile'];

$result1=mysqli_query($con,"SELECT p_name FROM police_station where email='$email' ");
$q2=mysqli_fetch_assoc($result1);
$p_name=$q2['p_name'];
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

    <title>Case Update</title>
</head>

<body>

    <div class="dropdwn">
        <nav>
            <label class="logo">Crime Portal</label>
            <ul>
                <li><a href="police_views_missing.php">Back</a></li>
            </ul>

        </nav>

    </div>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Missing update </h4>
                    </div>
                    <div class="card-body">
                        <?php
                     if(isset($_GET['m_id']))
                        {
                         $m_id = mysqli_real_escape_string($con, $_GET['m_id']);
                           $query = "SELECT * FROM missing WHERE m_id='$m_id'";
                           $query_run = mysqli_query($con, $query);

                           if(mysqli_num_rows($query_run) > 0)
                           {
                             $missing = mysqli_fetch_array($query_run);
                             ?>


                        <form action="#" method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="p_name" required="" disabled value=<?php echo "$p_name"; ?>
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <input type="hidden" name="number" required="" disabled value=<?php echo "$p_mobile"; ?>
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Missing ID</label>
                                <input type="text" name="m_id" disabled value="<?=$missing['m_id'];?>"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile" disabled value="<?=$missing['mobile'];?>"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>City</label>
                                <input type="text" name="age" disabled value="<?=$missing['city'];?>"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Crime Type</label>
                                <input type="text" name="gender" disabled value="<?=$missing['crime_type'];?>"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Date</label>
                                <input type="date" name="date" disabled value="<?=$missing['date'];?>"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Complaint Status</label>
                                <select class="form-control" name="status">
                                    <option></option>
                                    <option>Complaint Accepted...Complaint is under progress... </option>
                                    <option>Complaint Rejected...</option>
                                </select>

                            </div>

                            <div class="mb-3">
                                <label>Case Updates</label>
                                <select class="form-control" name="case_update">
                                    <option></option>
                                    <option>Complaint Withdrawn</option>
                                    <option>Missing Document/ Things/ Person's Location Detected</option>
                                    <option>Missing Document/Things/Person are found</option>
                                    <option>Case Closed</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_result" class="btn btn-primary">
                                    Update Complaint
                                </button>
                            </div>

                        </form>
                        <?php
                           }
                           else
                           {
                            echo "<h4>no such id found</h4>";
                           }
                        }

                            
                               ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
if(isset($_POST['update_result'])){
    $con=mysqli_connect('localhost','root','','missing_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        
        $case_update=$_POST['case_update'];
        $status=$_POST['status'];
        
    $reg="INSERT INTO `update_case`(`m_id`,`status`, `case_update`,`p_name`,`p_mobile`) VALUES ('$m_id','$status','$case_update','$p_name','$p_mobile')";
        mysqli_select_db($con,"missing_portal");
        $res=mysqli_query($con,$reg);
        if(!$res)
        {
        $message1 = "complaint not updated";
        echo "<script type='text/javascript'>alert('$message1');</script>";
        header("location: police_mupdate.php");
    }
    else
    {
        ?>
        <script>
        alert("Complaint Update Successfully");
        window.location.replace('police_views_missing.php');
        </script>
        <?php
    }
    }
}
?>