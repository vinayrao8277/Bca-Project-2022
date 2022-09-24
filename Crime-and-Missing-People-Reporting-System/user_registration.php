<?php session_start(); ?>
<?php
    include('connect/connection.php');

    if(isset($_POST["s"])){
        $u_name=$_POST['name'];
        $email = $_POST["email"];
        $u_pass=$_POST['password'];
        $u_addr=$_POST['address'];
        $a_no=$_POST['aadhar'];
        $gender=$_POST['gender'];
        $mobile=$_POST['mobile'];

        $check_query = mysqli_query($connect, "SELECT * FROM user where email ='$email'");
        $rowCount = mysqli_num_rows($check_query);

        if(!empty($email) && !empty($u_pass)){
            if($rowCount > 0){
                ?>
                <script>
                alert("User with email already exist!...");
                </script>
                <?php
            }else{
                    $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['name'] = $u_name;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $u_pass;
                    $_SESSION['address'] = $u_addr;
                    $_SESSION['aadhar'] = $a_no;
                    $_SESSION['gender'] = $gender;
                    $_SESSION['mobile'] = $mobile;

                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='vm6366004376@gmail.com';
                    $mail->Password='qatbuwqatvnxemmj';
    
                    $mail->setFrom('vm6366004376@gmail.com', 'OTP Verification');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your Account Verification Code";
                    $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <b>BCA LEGENDS </b>";
    
                            if(!$mail->send()){
                                ?>
                                <script>
                                alert("<?php echo "Register Failed, Invalid Email "?>");
                                </script>
                                <?php
                             }else{
                                ?>
                                <script>
                                alert("<?php echo "Register Successfully... OTP sent to " . $email ?>");
                                window.location.replace('user_emailverification.php');
                                </script>
                                <?php
                            }
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
    <title>Registration</title>
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
        background: url("pictures/crime.jpg");
        background-size: cover;
    }
    section{
        position: relative;
        height: 100vh;
        width: 100%;
      

    }
    .form-container{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3));
        width: 480px;
        padding: 50px 30px;
        border-radius: 10px;
        box-shadow: 20px 20px 160px #000;
        margin-top: 100px;
    }
    h1{
        text-transform: uppercase;
        font-size: 2em;
        text-align: center;
        margin-bottom: 1em;
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
    select{
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
    .navbar {
    overflow: hidden;
    background-color: transparent;
    /* margin-right: 1275px; */
    font-size: 20px;
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
  .a1{
    margin-left: 1190px;
  }
</style>
<body>
    
    <div class="navbar">
        <a class="nav" href="home.php" style="font-size: 20px;"><b>Home</b></a>
        <a class="a1" href="home.php" style="font-size: 20px;"><b>Back</b></a>
    </div>
    <section>
        <div class="form-container">
            <h1>Registration Form</h1>
            <form action="#" method="POST" onsubmit="return myfun();">
                <div class="control">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" placeholder="Enter Full Name" id="user" style="text-transform: capitalize;" onkeydown="return /[a-z\s]/i.test(event.key)" required>
                    <span id="message1" style="color:red"></span><br>
                </div>
                <div class="control">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter Valid Email Id" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter correct email address" required>
                </div>
                <div class="control">
                    <label for="name">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" id="pass" required>
                    <span id="message2" style="color:red"></span><br>
                </div>
                <div class="control">
                    <label for="name">Aadhar No</label>
                    <input type="number" name="aadhar" placeholder="Enter Aadhar Number" id="aadhaar" required>
                    <span id="message3" style="color:red"></span><br>
                </div>
                <div class="control">
                    <label for="name">Address</label>
                    <input type="text" name="address" placeholder="Enter Full Address" id="name" required>
                </div>
                <div class="control">
                    <label for="name">Gender</label>
                    <select class="option" name="gender" required>
                        <option></option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>
                <div class="control">
                    <label for="name">Mobile</label>
                    <input type="number" name="mobile" placeholder="Enter Mobile Number" id="mobile" required>
                    <span id="message" style="color:red"></span><br>
                </div>
                <div class="control">
                    <input type="submit" value="submit" name="s" id="submit">
                </div>

            </form>
        </div>
    </section>
    <script type="text/javascript">
        function myfun(){
            var user = document.getElementById("user").value;
            var password = document.getElementById("pass").value;
            var aadhaar = document.getElementById("aadhaar").value;
            var a = document.getElementById("mobile").value;
            var regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])";


            if(user.length <3){
                document.getElementById("message1").innerHTML="please enter full name";
                return false;
            }
            if(user.length >30){
                document.getElementById("message1").innerHTML="Charecter should less than be 30";
                return false;
            }

            if(isNaN(a)){
                document.getElementById("message").innerHTML="only number are allowed";
                return false;
            }
            if(a.length<10){
                document.getElementById("message").innerHTML="mobile number must be 10 digit";
                return false;
            }
            if(a.length>10){
                document.getElementById("message").innerHTML="mobile number must be 10 digit";
                return false;
            }
            if((a.charAt(0)!=9) && (a.charAt(0)!=8) && (a.charAt(0)!=7) && (a.charAt(0)!=6)){
                document.getElementById("message").innerHTML="mobile number must start with 9,8,7 and 6";
                return false;
            }  
            if(isNaN(aadhaar)){
                document.getElementById("message3").innerHTML="only number are allowed";
                return false;
            }
            if(aadhaar.length<12){
                document.getElementById("message3").innerHTML="must be 12 digit";
                return false;
            }
            if(aadhaar.length>12){
                document.getElementById("message3").innerHTML="must be 12 digit";
                return false;
            }

            if(password.length<6){
                document.getElementById("message2").innerHTML="password length must be 6 character ";
                return false;
            }
            if(password.length>20){
                document.getElementById("message2").innerHTML="password length must be 20 character ";
                return false;
            }
            if(!password.match(regex))
           {
                document.getElementById("message2").innerHTML="password must have one uppercase, one lowercase,number,one special symbol and character ";
                return false;
            }

        }
        </script>
</body>

</html>