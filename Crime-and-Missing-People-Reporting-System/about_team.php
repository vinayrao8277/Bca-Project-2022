<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>our team section Using HTML and CSS</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="navbar">
        <a href="home.php"><b>Home</b></a>
        <a class="a1" href="about_us.php"><b>Back</b></a>
		</div>
<div class="wrapper">
    <h1>Our Team</h1>
    <div class="our_team">
        <div class="team_member">
          <div class="member_img">
             <img src="pictures/vinay.png" alt="our_team">
            <div class="social_media">
               <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
               <div class="twitter item"><i class="fab fa-twitter"></i></div>
               <div class="instagram item"><i class="fab fa-instagram"></i></div>
             </div>
          </div>
          <h3>Vinay Rao</h3>
          <span> Web Designer</span>
          <br><br>
          <h5>Contact</h5>
          <p><b>MOBILE NUMBER</b><br>+91 6362922307 <br> <br> <b>EMAIL-ID</b><br> vinayrao6362@gmail.com</p>
        </div>
        <div class="team_member">
           <div class="member_img">
             <img src="pictures/vijay.png" alt="our_team">
             <div class="social_media">
               <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
               <div class="twitter item"><i class="fab fa-twitter"></i></div>
               <div class="instagram item"><i class="fab fa-instagram"></i></div>
             </div>
          </div>
          <h3>Vijay</h3>
          <span>Web Developer</span>
          <br><br>
          <h5>Contact</h5>
          <p><b>MOBILE NUMBER</b><br>+91 7349196994 <br> <br> <b>EMAIL-ID</b><br> vijaymarati2002@gmail.com</p>  
        </div> 
<style>
    @import url('https://fonts.googleapis.com/css?family=Exo+2|Yatra+One');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Exo 2', sans-serif;
}

body{
  background: #8c7ae6;
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
  .a1{
        margin-left:1170px;
        font-size: 20px;
    }

.wrapper{
  margin-top: 60px;
  text-align: center;
}

.wrapper h1{
  font-family: 'Yatra One', cursive;
  font-size: 48px;
  color: #fff;
  margin-bottom: 25px;
}

.our_team{
  width: auto;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}

.our_team .team_member{
  width: 250px;
  margin: 5px;
  background: #fff;
  padding: 20px 10px;
}

.our_team .team_member .member_img{
  background: #e9e5fa;  
  max-width: 190px;
  width: 100%;
  height: 190px;
  margin: 0 auto;
  border-radius: 50%;
  padding: 5px;
  position: relative;
  cursor: pointer;
}

.our_team .team_member .member_img img{
  width: 100%;
  height: 100%;
}

.our_team .team_member h3{
  text-transform: uppercase;
  font-size: 18px;
  line-height: 18px;
  letter-spacing: 2px;
  margin: 15px 0 0px;
}

.our_team .team_member span{
  font-size: 10px;
}

.our_team .team_member p{
  margin-top: 20px;
  font-size: 14px;
  line-height: 20px;
}

.our_team .team_member .member_img .social_media{
  position: absolute;
  top: 5px;
  left: 5px;
  background: rgba(0,0,0,0.65);
  width: 95%;
  height: 95%;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  transform: scale(0);
   transition: all 0.5s ease;
}

.our_team .team_member .member_img .social_media .item{
  margin: 0 10px;
}

.our_team .team_member .member_img .social_media .fab{
  color: #8c7ae6;
  font-size: 20px;
}

.our_team .team_member .member_img:hover .social_media{
  transform: scale(1);
} 
</style>
</body>
</html> 
