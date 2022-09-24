<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crime And Missing People</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
</head>
<body>
  <style>
    body{
    background-size: cover;
    background-image: url(https://media.gettyimages.com/photos/criminal-law-picture-id171574845?k=20&m=171574845&s=612x612&w=0&h=mJAe-hkphlrPFX94fRgnm3Dr4-sS7d_NvTi20bfXlJ4=);
    
}

.head {
      background-color: whitesmoke;
      text-align: center;
      border: 2px solid black;
      margin-left: 470px;
      margin-right: 470px;
      color: blue;
    }
  .animate-charcter{
      margin-left: 500px;
      margin-top: 300px;
      text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #FF00FF 0%,
    #1E90FF 29%,
    #ff1361 67%,
    #FFFFFF 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 40px;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}

    

.submit{
  font-family: "Roboto",sans-serif;
  font-size: 18px;
  font-weight: bold;
  background: #1E90FF;
  width: 160px;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);     
  margin-left: 600px;
  margin-top: 10px;
  -webkit-transition-property: box-shadow, transform;
  transition-property: box-shadow, transform;
}
.submit:hover{
  box-shadow: 0 0 20px rgba(0,0,0,0.5);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

 
.navbar {
      overflow: hidden;
      background-color: white;
      border-radius: 5px;
      margin-top: 5%;
    }

    .navbar a {
      float: left;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 20px;
      
      
    }

    .navbar a:hover {
      background-color: black;
      color: white;
      border-radius: 5px;
    }

    .active {
      margin-left: 840px;
    }
    @font-face {
  font-family: Clip;
  src: url("https://acupoftee.github.io/fonts/Clip.ttf");
}

.sign {
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50%;
  height: 50%;
 
  transform: translate(-50%, -50%);
  letter-spacing: 2;
  left: 50%;
  top: 5%;
  font-family: "Clip";
  text-transform: uppercase;
  font-size: 3em;
  color: #ffe6ff;
  text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
    -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
    0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;

} 
 </style>
  <div class="sign">
          crime reporting system
        </div>
  <div class="navbar">
    <a class="nav" href="home.php"><i class="fa fa-home"></i> Home</a> 
    <a class="active" href="user_login.php"><b>User Login</b></a>
    <a href="official_login.php"><b>Official Login</b></a>
    <a href="about_us.php"><b>About us</b></a>
  </div>
  <h2 class="animate-charcter">Register Here</h2><br>
  <i class="fa fa-hand-o-down" style="font-size:48px;color:blue;  margin-left: 650px;"></i><br>


  <a href="user_registration.php"><button class="submit">Sign Up</button></a>
</body>

</html>


