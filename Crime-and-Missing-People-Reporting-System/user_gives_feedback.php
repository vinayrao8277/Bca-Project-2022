<!DOCTYPE html>
<html>

<?php
session_start();
if(!isset($_SESSION['x']))
    header("location:user_login.php");
$con=mysqli_connect("localhost","root","","missing_portal");
if(!$con)
{
    die("could not connect".mysqli_error());
}
mysqli_select_db($con,"missing_portal");

$email=$_SESSION['email'];
    
    $result=mysqli_query($con,"SELECT u_name FROM user where email='$email' ");
    $q2=mysqli_fetch_assoc($result);
    $u_name=$q2['u_name'];

    $result1=mysqli_query($con,"SELECT email FROM user where email='$email' ");
    $q2=mysqli_fetch_assoc($result1);
    $email=$q2['email'];

if(isset($_POST['s']))
{
    $conn=mysqli_connect('localhost','root','','missing_portal');
    if(!$conn)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $description=$_POST['feedback'];

        $comp="INSERT INTO `feedback` (`u_name`, `u_id`,  `description`) VALUES ('$u_name','$email','$description')";
        mysqli_select_db($conn,"missing_portal"); 
        $res=mysqli_query($conn,$comp);

        if(!$res)
        {
        $message1 = "already give you feedback";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            else
    {
        $message = "";
        ?>
          <script>
          alert("User feedback Successfully");
          window.location.replace('user_home.php');
          </script>
          <?php
    }
    }
}
?>

<head>
    <title>Feedback </title>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <link rel="stylesheet" href="style.css">
    <style>
    body {
        margin: 0 auto;
        background-image: url("https://infra-cloudfront-talkdeskcom.svc.talkdeskapp.com/talkdesk_com/2013/03/15144901/how-effective-feedback-impacts-job-performance.jpg");
        background-size: cover;
    }

    div.formContainer {
        margin: 4em auto 4em auto;
        width: 80%;
        color: solid black;
        border: 1px solid black;
        border-radius: 2px;
    }

    div.heading {
        margin: 0 auto 0 auto;
        width: 100%;
        padding: 1em 0 1em 0;
        letter-spacing: 0.1em;
        font-size: 1.2em;
        font-weight: bold;
        border-bottom: 2px solid black;
        text-align: center;
        background-color: rgba(0, 0, 0, .03);
        color: solid black;
    }

    div.description {
        padding: 1em 0 1em 0;
        width: 80%;
        margin: 0 auto 0 auto;
        text-align: center;
    }

    div.form {
        margin: 0 auto 0 auto;
        width: 100%;
    }

    div.form form {
        margin: 0 auto 0 auto;
        width: 80%;
    }

    div.form label {
        display: block;
        width: 80%;
        margin: 1em auto 1em auto;
        outline: none;
        color: solid black;
        font-weight: bolder;
        letter-spacing: 0.1;
    }

    div.form input {
        display: block;
        width: 80%;
        margin: 1em auto 1em auto;
        outline: none;
        color: solid black;
        padding: 1.2em 0 1em 1.2em;
        background-color: white;
        border: 0.5px solid black;
    }

    div.form textarea {
        display: block;
        width: 80%;
        margin: 1em auto 1em auto;
        outline: none;
        color: solid black;
        padding: 1.2em 0 1em 1.2em;
        background-color: white;
        border: 0.5px solid black;
        height: 8em;
        resize: none;
    }

    div.form button {
        outline: none;
        margin: 2em auto 2em auto;
        padding: 2em;
        cursor: pointer;
        border: none;
        display: block;
        width: 60%;
        text-align: center;
        border: 1px solid black;
    }

    div.form input:active,
    div.form input:focus,
    div.form select:active,
    div.form select:focus,
    div.form textarea:active,
    div.form textarea:focus,
    div.form button:active,
    div.form button:hover {
        box-shadow: 0 0 2px 2px white;
    }

    div.form button {
        background-color: white;
        color: solid black;
        font-weight: bolder;
        transition: all 0.2s linear;
    }

    @keyframes status {
        from {
            transform: scale(0);
        }

        to {
            transform: scale(1);
        }
    }

    div.statusActive {
        display: block;
        width: 80%;
        margin: 1em auto 1em auto;
        padding: 1.2em 0 1em 1.2em;
        background-color: rgba(0, 0, 0, .03);

        color: solid black;
        text-align: center;
        animation-name: status;
        animation-duration: 0.3s;
        transition: all 0.2s linear;
    }

    div.loadingActive {
        width: 90%;
        margin: 4em auto 4em auto;
        grid-template-columns: 33.3% 33.3% 33.3%;
        display: grid;
        transition: all linear 0.2s;
    }

    div.loadingActive div {
        padding: 0.5em;
        background-color: rgba(0, 0, 0, .03);

        animation-name: rotatingDiv;
        animation-duration: 1s;
        animation-iteration-count: infinite;
    }

    @keyframes rotatingDiv {
        from {
            transform: rotate(-180deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @media only screen and (min-width: 1224px) {
        div.formContainer {
            width: 500px;
        }
    }

    @media only screen and (min-width: 1824px) {
        div.formContainer {
            width: 500px;
        }
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
        div.formContainer {
            width: 80%;
        }
    }
    </style>


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
    <div class="formContainer">
        <div class="heading">
            FEEDBACK FORM
        </div>

        <div class="form">
            <form ation="#" method="POST" id="form">
                <label for="name">Name</label>
                <input name="name" type="text" id="name" disabled value=<?php echo "$u_name"; ?>>

                <label for="email">Email</label>
                <input name="email" type="email" id="email" disabled value=<?php echo "$email"; ?>>

                <label for="feedback">Feedback</label>
                <textarea name="feedback" id="feedback" style="text-transform: capitalize;"  required></textarea>
                <button type="submit" name="s">SUBMIT</button>
            </form>
        </div>



    </div>


</body>

</html>