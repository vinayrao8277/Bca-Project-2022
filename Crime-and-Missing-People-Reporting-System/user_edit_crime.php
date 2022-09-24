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
                <li><a href="user_home.php">back</a></li>
            </ul>
        </nav>
    </div>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Complaint

                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['c_id']))
                        {
                            $c_id = mysqli_real_escape_string($con, $_GET['c_id']);
                            $query = "SELECT * FROM complaint WHERE c_id='$c_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $result = mysqli_fetch_array($query_run);
                                ?>
                        <form action="#" method="POST">


                            <div class="mb-3">
                                <label>Complaint Id</label>
                                <input type="text" name="c_id" disabled value="<?=$result['c_id'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>User Name</label>
                                <input type="text" name="u_name" disabled value="<?=$result['u_name'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Crime Type</label>
                                <input type="text" name="crime_type" value="<?=$result['crime_type'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Date</label>
                                <input type="date" name="d_o_c" value="<?=$result['d_o_c'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>City</label>
                                <input type="text" name="city" disabled value="<?=$result['city'];?>" class="form-control">
                            </div>
                            <div>
                                <label>Station Name</label>
                                <select class="option" name="p_name">
                                    <option></option>
                                    <option>Udupi Town PS</option>
                                    <option>Women PS Udupi</option>
                                    <option>Malpe PS</option>
                                    <option>Manipal PS</option>
                                    <option>Hiriyadka PS</option>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label>Complaint Details</label>
                                <input type="text" name="description" value="<?=$result['description'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_complaint" class="btn btn-primary">
                                    Update Complaint
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
    <style>
    .option {
        width: 100%;
        padding: 10px;
        padding-right: 0px;
        padding-left: 0px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border-radius: 5px;
        background: whitesmoke;
    }
</style>
</body>

</html>
<?php

if(isset($_POST['update_complaint']))
{
    $crime_type = mysqli_real_escape_string($con, $_POST['crime_type']);
    $d_o_c = mysqli_real_escape_string($con, $_POST['d_o_c']);
    $p_name = mysqli_real_escape_string($con, $_POST['p_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $query = "UPDATE complaint SET crime_type='$crime_type', d_o_c='$d_o_c', p_name='$p_name', description='$description' WHERE c_id='$c_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Complaint Updated Successfully";
        header("Location: user_home.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Complaint Not Updated";
        
        exit(0);
    }

}
?>