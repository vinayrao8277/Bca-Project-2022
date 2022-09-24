<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(!isset($_SESSION['x']))
header("location:user_login.php");

$conn=mysqli_connect("localhost","root","","missing_portal");
if(!$conn)
{
  die("could not connect".mysqli_error());
}
mysqli_select_db($conn,"missing_portal");
  
$email=$_SESSION['email'];
    
$result=mysqli_query($conn,"SELECT mobile FROM user where email='$email' ");
$q2=mysqli_fetch_assoc($result);
$mobile=$q2['mobile'];

$result1=mysqli_query($conn,"SELECT u_name FROM user where email='$email' ");
$q2=mysqli_fetch_assoc($result1);
$u_name=$q2['u_name'];

if(isset($_POST['s']))
{
  $con=mysqli_connect('localhost','root','');
  if(!$con)
  {
    die('could not connect: '.mysqli_error());
  }
  
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $crime_type=$_POST['crime_type'];
    $date=$_POST['date'];
    $p_name=$_POST['p_name'];
    $description=$_POST['description'];
    $files = $_FILES['file'];
    
    $var=strtotime(date("Ymd"))-strtotime($date);
    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];

  

    $fileext = explode('.',$filename);
    $filecheck = strtolower(end($fileext));

    $fileextstored = array('png', 'jpg', 'jpeg');
    
    if(in_array($filecheck,$fileextstored))
    {
      $destinationfile ='upload/' .$filename;
      move_uploaded_file($filetmp,$destinationfile);
      if($var>=0)
      {
      
      $comp="INSERT INTO `missing`(`u_name`, `mobile`,`p_name`,`crime_type`, `date`, `description`, `image`) VALUES('$u_name','$mobile','$p_name','$crime_type','$date','$description','$destinationfile')";
      mysqli_select_db($conn,"missing_portal"); 
      $res=mysqli_query($conn,$comp);
      
        if(!$res)
        {
          $message1 = "Complaint already filed";
          echo "<script type='text/javascript'>alert('$message1');</script>";
        }
        else
        {
          ?>
          <script>
          alert("Complaint Registered Successfully");
          window.location.replace('user_home.php');
          </script>
          <?php
        }
      }
    else
      {
      $message = "Enter Valid Date";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
  }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crime And Missing People</title>


    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.6.3/css/all.css">

</head>

<body>
<script>
    var submit = document.querySelector("input[type=submit]");

    submit.setAttribute("onclick", "return test()");

    function test(){
      if(confirm('Are you sure want to submit this form?')){
        rteurn true;
      }else{
        return false;
      }
    }
    </script>
<div class="dropdwn">
<nav>
        <label class="logo">Crime Portal</label>
        <ul>
          
            <li><a href="user_home.php">Back</a></li>
        </ul>
    </nav>
</div>

     <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return myfun();">
        <div class="box">
            <p>
            <h1 style="text-align: center;">WELCOME <br>
                <?php echo "$u_name" ?></h1>
            </p><br>
            <p>
            <h2 style="text-align: center;">Log New Missing Complaint</h2>
            </p><br>
            <hr>

            <input type="hidden" name="name" required="" disabled value=<?php echo "$u_name"; ?>>

            <input type="hidden" name="mobile" required="" disabled value=<?php echo "$mobile"; ?>>

            <label><b>Type of Missing</b></label>
            <input type="text" name="crime_type" id="crime" placeholder="Enter the Missing Type..." style="text-transform: capitalize;" required>
            <span id="message" style="color:red"></span><br>

            <label><b>Date of Missing</b></label>
            <input type="date" placeholder=" " name="date" required />

            <label><b>City</b></label>
            <input type="text" name="city" disabled value="Udupi">

            <label><b>Station Name</b></label>
            <select required class="option"  name="p_name">
                <option></option>
                <option>Udupi Town PS</option>
                <option>Women PS Udupi</option>
                <option>Malpe PS</option>
                <option>Manipal PS</option>
                <option>Hiriyadka PS</option>
            </select>

            <label><b>Complaint Details</b></label>
            <textarea type="txt" placeholder="Enter All Details About The Complaint......" name="description" style="text-transform: capitalize;" required></textarea>

            <label><b>Upload a Photos</b></label>
            <input type="file" name="file" id="file" required/>

            <button type="submit" class="submitbtn" name="s" id="submit" onclick="return test()">Submit</button>
        </div>
    </form>
    <style>
    body {
        background-image:
            url(https://as1.ftcdn.net/v2/jpg/01/79/44/24/1000_F_179442456_LPeINJTWEwEzVOpzjYWlwgHraTjeXfcj.jpg);
        background-size: cover;
    }

    .box {
        padding: 20px;
        background-color: whitesmoke;
        margin-left: 470px;
        margin-right: 470px;
        margin-top: 50px;
    }

    input[type="text"],
    input[type="date"],
    input[type="file"],
    input[type="number"],
    input[type="option"],
    .option {
        width: 100%;
        padding: 10px;
        padding-right: 0px;
        padding-left: 0px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: darkgrey;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="file"]:focus {
        background-color: #ddd;
        outline: none;
    }

    textarea {
        display: block;
        width: 90%;
        margin: 1em auto 1em auto;
        outline: none;
        color: aqua;
        padding: 1.2em 0 1em 1.2em;
        background-color: darkgrey;
        border: 0.5px;
        height: 8em;
        resize: none;
    }

    .submitbtn {
        background-color: #04aa6d;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .submitbtn:hover {
        opacity: 1;
    }
    </style> 
      <script type="text/javascript">
        function myfun(){
            var crime = document.getElementById("crime").value;
            

            if(!isNaN(crime)){
                document.getElementById("message").innerHTML="only character allowd";
                return false;
            }
          }

      </script>

</body>

</html>