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

    <title>Police Station Update</title>
</head>

<body>
    <div class="dropdwn">
        <nav>
            <label class="logo">Crime Portal</label>
            <ul>
                <li><a href="admin_home.php">back</a></li>
            </ul>

        </nav>

    </div>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Police Station Update

                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['p_id']))
                        {
                            $p_id = mysqli_real_escape_string($con, $_GET['p_id']);
                            $query = "SELECT * FROM police_station WHERE p_id='$p_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $result = mysqli_fetch_array($query_run);
                                ?>
                        <form action="#" method="POST">


                            <div class="mb-3">
                                <label>Police Station Name</label>
                                <input type="text" name="pname" value="<?=$result['p_name'];?>" class="form-control" onkeydown="return /[a-z\s]/i.test(event.key)" style="text-transform: capitalize;">
                            </div>
                            <div class="mb-3">
                                <label>Police Station Email</label>
                                <input type="email" name="p_id" value="<?=$result['email'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Police Station Password</label>
                                <input type="text" name="password" value="<?=$result['p_pass'];?>" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{6,20}" 
                    title="Password should have one uppercase, one lowercase,digit,character,and special symbol">
                            </div>
                            <div class="mb-3">
                                <label>Mobile Number</label>
                                <input type="text" pattern="[6-9]{1}[0-9]{9}" 
                    title="Phone number with 6-9 and remaing 9 digit with 0-9" name="mobile"
                                    value="<?=$result['p_mobile'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" value="<?=$result['p_addr'];?>" class="form-control" style="text-transform: capitalize;">
                            </div>
                            <div class="mb-3">
                                <label>Loction</label>
                                <input type="text" name="location" value="<?=$result['location'];?>"
                                    class="form-control" style="text-transform: capitalize;">
                            </div>
                            <div class="mb-3">
                                <label>Pincode</label>
                                <input type="text" pattern="[5]{1}[0-9]{5}"
                    title="Pin code should be 6 digit and starting from 5 " name="pincode"
                                    value="<?=$result['pincode'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_police" class="btn btn-primary">
                                    Update Police Station
                                </button>
                            </div>

                        </form>
                        <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
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

if(isset($_POST['update_police']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $p_name = mysqli_real_escape_string($con, $_POST['pname']);
    $p_pass = mysqli_real_escape_string($con, $_POST['password']);
    $p_mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $p_addr = mysqli_real_escape_string($con, $_POST['address']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);

    $query = "UPDATE police_station SET p_name='$p_name', p_id='$p_id', p_pass='$p_pass', p_mobile='$p_mobile', p_addr='$p_addr', location='$location', pincode='$pincode' WHERE p_id='$p_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        ?>
        <script>
        alert("Station Update Successfully");
        window.location.replace('admin_home.php');
        </script>
        <?php
    }
    else
    {
        $_SESSION['message'] = "Police Station Not Updated";
        header("Location: admin_update_police_station.php");
        exit(0);
    }

}
?>