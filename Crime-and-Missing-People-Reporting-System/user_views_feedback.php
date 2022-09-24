<?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:admin_login.php");
    $conn=mysqli_connect("localhost","root","","missing_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"missing_portal");
    
    $query="select u_name,u_id,description from feedback";
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

    <title>Feedback View</title>
</head>
<style>
body {
    width: 100%;
    height: 100vh;
    background-image: url(https://origin-staticv2.sonyliv.com/landscape_thumb/CP_rev_14april_landscape_thumb.jpg);
    background-repeat: no-repeat;
    background-size: cover;

}
</style>

<body>

    <div class="dropdwn">
        <nav>
            <label class="logo">Crime Portal</label>
            <ul>
                <li><a href="user_home.php">back</a></li>
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
                            <h4>Feedback Details
                            </h4>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Id</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                      
                                      while($rows=mysqli_fetch_assoc($result)){
                                    
                                            ?>
                                    <tr>
                                        <td><?php echo $rows['u_name']; ?></td>
                                        <td><?php echo $rows['u_id']; ?></td>
                                        <td style="max-width: 25vw;"><?php echo $rows['description']; ?></td>
                                    </tr>
                                    <?php
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