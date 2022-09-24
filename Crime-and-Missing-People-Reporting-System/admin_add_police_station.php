<?php
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','','missing_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $p_name=$_POST['pname'];
      $email=$_POST['email'];
      $p_pass=$_POST['pass'];
      $p_mobile=$_POST['mobile'];
      $p_addr=$_POST['address'];
      $location=$_POST['location'];
      $pincode=$_POST['pincode'];

      $check_query = mysqli_query($con, "SELECT * FROM police_station where email ='$email'");
      $rowCount = mysqli_num_rows($check_query);

      if(!empty($email) && !empty($p_pass)){
          if($rowCount > 0){
              ?>
                <script>
                alert("Police Station Already Exist...");
                </script>
                <?php
          }else{
           $reg="INSERT INTO `police_station`(`p_name`, `email`, `p_pass`, `p_mobile`, `p_addr`, `location`, `pincode`)VALUES('$p_name','$email','$p_pass','$p_mobile','$p_addr','$location','$pincode')";
           mysqli_select_db($con,"missing_portal");
           $res=mysqli_query($con,$reg);

           if($res)
             {
                 ?>
                <script>
                alert("Police Station Added Successfully...");
                window.location.replace('admin_home.php');
                </script>
                <?php
               }
            }
        }
    }
}
?>
<html>

<head>
    <title>Add police station</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
body {

    background-image: url(https://origin-staticv2.sonyliv.com/landscape_thumb/CP_rev_14april_landscape_thumb.jpg);
    background-repeat: no-repeat;
    background-size: cover;

}

.main {
    width: 30%;
    height: 720px;
    background-color: lightslategray;
    margin: 50px 35%;
    border-radius: 10px;
}

.head {
    width: 100%;
    background-color: #f88800;
    height: 40px;
    border-radius: 10px 10px 0 0;
}

.head p {
    line-height: 40px;
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    color: #fff;
}

.form {
    width: 100%;
    height: 500px;
}

.name {
    font-size: 16px;
    font-weight: bold;
    color: solid black;
    margin: 15px 0 0 5%;
}

.name-inp {
    width: 90%;
    height: 40px;
    margin: 5px 0 0 5%;
    font-size: 16px;
    padding: 2px;
    color: rgb(114, 111, 111);
    border: 1px solid rgb(17, 67, 107);
    background-color: rgb(231, 232, 250);
}

.name-inp:hover {
    background-color: rgb(0, 23, 41);
    color: rgb(173, 167, 167);
    border: 1px solid rgb(139, 139, 139);
}

.sub {
    width: 90%;
    margin: 15px 0 0 5%;
    font-size: 16px;
    height: 40px;
    background-color: #031c03;
    border: blue;
    color: #fff;
}

.sub:hover {
    background-color: orangered;
    color: #fff;
}
</style>

<body>
    <div class="dropdwn">
        <nav>
            <label class="logo">Crime Portal</label>
            <ul>
                <li><a href="admin_home.php">Back</a></li>
            </ul>
        </nav>
    </div>


    <div class="warpper f1">
        <div class="main">
            <div class="head">
                <p>Police Station Registration</p>
            </div>
            <div class="form f1">
                <form action="#" method="POST" onsubmit="return myfun();">
                    <p class="name">Police Station Name</p>
                    <p><input onkeydown="return /[a-z\s]/i.test(event.key)" name="pname" id="pname" placeholder="Full name" class="name-inp" required></p>
                   

                    <p class="name">Email</p>
                    <p><input type="email" name="email" placeholder="Enter Email" class="name-inp" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter correct email address" required></p>

                    <p class="name">Phone number</p>
                    <p><input type="text" name="mobile" id="moblie" placeholder="Enter Phone Number" class="name-inp" pattern="[6-9]{1}[0-9]{9}" 
                    title="Phone number with 6-9 and remaing 9 digit with 0-9" required></p>
                    

                    <p class="name">Password</p>
                    <p><input type="password" name="pass" id="pass" placeholder="Enter Password" class="name-inp" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{6,20}" 
                    title="Password should have one uppercase, one lowercase,digit,character,and special symbol" required>
                    </p>
                   

                    <p class="name">Police Station Address</p>
                    <p><input type="text" name="address" placeholder="enter police station address" class="name-inp" required />
                    </p>

                    <p class="name">Police Station Area</p>
                    <p><input type="text" name="location" placeholder="Enter Station Area" class="name-inp" required>
                    </p>

                    <p class="name">Police Station pincode</p>
                    <p><input type="text" name="pincode" id="pincode" placeholder="Enter Valid Pincode" class="name-inp" pattern="[5]{1}[0-9]{5}"
                    title="Pin code should be 6 digit and starting from 5 " required>
                    </p>

                    <p><input type="submit" value="submit" name="s" id="submit" class="sub"></p>
                </form>
            </div>
        </div>
    </div>

</body>

</html>