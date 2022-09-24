<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crime and missing people</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
    <div class="navbar">
        <a class="nav" href="home.php"><b>Home</b></a>
        <a class="a1" href="home.php"><b>Back</b></a>
    </div>
    <div class="fcontainer">
        <div class="container">
            <div class="fitem">police station login<br>
                <a href="police_login.php" class="btn btn-primary">Police station Login</a>
            </div>
        </div>

        <div class="container">
            <div class="fitem">admin login<br>
                <a href="admin_login.php" class="btn btn-primary">admin Login</a>
            </div>
        </div>
    </div>
    <style>
    body {
        background-image: url("pictures/official.jpg");
        background-size: cover;
    }
    .a1{
        margin-left: 1170px;
        font-size:20px;
    }

    .fitem {
        background-color: skyblue;
        border: 2px solid black;
        margin: 12px;
        width: 350px;
        height: 120px;
    }

    .fcontainer {
        display: flex;
        justify-content: space-around;
        margin-top: 250px;
        margin-left: 150PX;
    }

    .container {
        text-align: center;
        font-size: 34px;
    }

    .navbar {
        overflow: hidden;
        background-color: transparent;

    }

    .navbar a {
        float: left;
        color: aliceblue;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 20px;
    }

    .nav:hover {
        background-color: aqua;
        color: black;
    }
    </style>

</body>

</html>