
<?php

if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
    $conn=mysqli_connect("localhost","root","","missing_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"missing_portal");
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        $result=mysqli_query($conn,"SELECT a_email,a_pass FROM admin where a_email='$name' and a_pass='$pass' ");
        
        if(mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:admin_home.php");
        }
    }                
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        font-family: "Open Sans";
        color: #fff;
        background: url(https://images.unsplash.com/photo-1470329508532-be27fda94658?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80);
        background-size: cover;
    }
    .navbar {
    overflow: hidden;
    background-color: transparent;
    /* margin-right: 1275px; */
  }
  
  .navbar a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 20px;
  }
  
  .navbar a:hover {
    background-color: white;
    color: black;
    border-radius: 10px;
  }
    section{
        position: relative;
        height: 100vh;
        width: 100%;
        background-position: center center;
    }
    .form-container{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3));
        width: 380px;
        padding: 50px 30px;
        border-radius: 10px;
        box-shadow: 7px 7px 60px #000;
    }
    h1{
        text-transform: uppercase;
        font-size: 2em;
        text-align: center;
        margin-bottom: 2em;
    }
    .control input{
        width: 100%;
        display: block;
        padding: 10px;
        color: #222;
        border: none;
        outline: none;
        margin: 1em 0;
        border-radius: 10px;
    }
    .control input[type="submit"]{
        background: green;
        color: #fff;
        text-transform: uppercase;
        font-size: 1.2em;
        opacity: .7;
        transition: opacity .3s ease;
    }
    .control input[type="submit"]:hover{
        opacity: 1;

    }
    .link a{
        text-decoration: none;
        color: #fff;
        opacity: .7;
        transition: opacity .3s ease;
    }
    .link a:hover{
        opacity: 1;
    }
    .a1{
        margin-left:1180px;
        font-size: 20px;
    }

</style>
<body>
<div class="navbar">
        <a href="home.php"><b>Home</b></a>
        <a class="a1" href="official_login.php"><b>Back</b></a>
    </div>
    <section>
        <div class="form-container">
            <h1>login form</h1>
            <form action="" method="post">
                <div class="control">
                    <label for="name">Name</label>
                    <input type="email" name="email" id="name">
                </div>
                <div class="control">
                    <label for="psw">Password</label>
                    <input type="password" name="password" id="psw">
                </div>
                <div class="control">
                    <input type="submit" value="login" name="s">
                </div>
                <div class="link">
                    <a href="forgot">Forget Password</a>
                </div>
            </form>
        </div>
    </section>
</body>
</html>