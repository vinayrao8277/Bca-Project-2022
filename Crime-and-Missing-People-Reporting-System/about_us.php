<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">


  </head>
  <body>
  <div class="navbar">
        <a href="home.php"><b>Home</b></a>
        <a class="a1" href="home.php"><b>Back</b></a>
		</div>
      <div class="about-section">
        <div class="inner-width">
          <h1>About Us</h1>
          <div class="border"></div>
          <div class="about-section-row">
            <div class="about-section-col">
              <div class="about">
                <p>
                The project titled as “Crime and Missing People Reporting System” is a  web based application. This software provides facility for reporting online crimes, complaints, missing persons, robbery, missing complaint etc. It provides the facility of uploading images of crime scenes so that police can take action immediately.
                </p>
                <a href="about_team.php">Our Team</a>
              </div>
            </div>
            <div class="about-section-col">
              <div class="skills">
                <div class="skill">
                  <div class="title">Web Developer</div>
                  <div class="progress">
                    <div class="progress-bar p1"><span>90%</span></div>
                  </div>
                </div>

                <div class="skill">
                  <div class="title">UI Design</div>
                  <div class="progress">
                    <div class="progress-bar p2"><span>80%</span></div>
                  </div>
                </div>

                <div class="skill">
                  <div class="title">UX Design</div>
                  <div class="progress">
                    <div class="progress-bar p3"><span>60%</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <style>
        body{
  margin: 0;
   padding: 0;
   font-family: "open sans",sans-serif;
 background-image: url(https://png.pngtree.com/thumb_back/fh260/background/20210122/pngtree-colorful-abstract-neon-background-with-motion-blur-effect-and-light-sparkle-image_538342.jpg);
  background-size: cover;
  height: 100%;

}
.navbar {
    overflow: hidden;
    background-color: transparent;
  }
  
  .navbar a {
    float: left;
    color: white;
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
.about-section{
  width: 70%;
background:whitesmoke;
  padding: 40px 0;
  margin-left: auto;
  margin-right:auto;
  margin-top: 170px;
box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
border-radius: 30px;
border-left: 50px solid #3CEDA7;
border-right: 50px solid #3CEDA7;


}
.inner-width{
  max-width: 1000px;
  overflow: hidden;
  padding: 0 20px;
  margin: auto;
}
.about-section h1{
  text-align: center;
}
.border{
  width: 100px;
  height: 3px;
  background: #3CEDA7;
  margin: 40px auto;
}
.about-section-row{
  display: flex;
  flex-wrap: wrap;
}
.about-section-col{
  flex: 50%;
}
.about{
  padding-right: 30px;
}
.about p{
  text-align: justify;
  margin-bottom: 20px;
  color: #7E7C7A;
  font-size: 17px;
}
.about a{
  display: inline-block;
  color: #7E7C7A;
  text-decoration: none;
  border: 2px solid #3CEDA7;
  border-radius: 24px;
  padding: 8px 40px;
  transition: 0.4s linear;
}
.about a:hover{
  color: #fff;
  background: #3CEDA7;
}
.skills{
  padding-left: 30px;
}
.skill{
  margin-bottom: 10px;
}
.title{
  color: #7E7C7A
}
.progress{
  width: 100%;
  height: 12px;
  background: #ddd;
  border-radius: 12px;
}
.progress-bar{
  height: 12px;
  background: #3CEDA7;
  border-radius: 12px;
}
.p1{
  width: 90%;
}
.p2{
  width: 70%;
}
.p3{
  width: 50%;
}
.progress-bar span{
  float: right;
  margin-right: 6px;
  line-height: 13px;
  color: #fff;
  font-size: 12px;
}
@media screen and (max-width:700px) {
  .about-section-col{
    flex: 100%;
    margin: 10px 0;
  }
  .about,.skills{
    padding: 0;
  }
  .about{
    text-align: center;
  }
}
      </style>
  </body>
</html>