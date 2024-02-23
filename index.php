<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login </title> 
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <?php
      if(isset($_SESSION["user"])){
      ?>

      <div class="wrapper" id="cont-loggedin">
        <div class="title"><span>Hello  <?php echo $_SESSION["user"];?></span></div>
          <div class="signup-link" style="text-align:center"> 
            <a href="includes/logout.inc.php" id="link-signup"> Logout</a></div>
            <br />
            <br />
      </div>
      <?php
      }
      else
      {
      ?>
      <div class="wrapper" id="cont-login" 
      <?php 
      if((!isset($_GET["sec"])) || (isset($_GET["sec"]) && $_GET["sec"] == "login"))
      { 
        echo ' style';
      }
      else
      { 
        echo ' style="display:none;"';
      } 
      ?> 
      >
        <div class="title"><span>Login</span></div>
        <form action="includes/login.inc.php" method="post">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email" required name="email" id="email">
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" required name="password" id="password">
          </div>
          <!--<div class="pass"><a href="#">Forgot password?</a></div>-->
          <div class="row button">
            <input type="submit" name="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a id="link-signup"> Signup now</a></div>
        </form>
      </div>
      <div class="wrapper" id="cont-signup" 
      <?php 
      if(isset($_GET["sec"]) && $_GET["sec"] == "signup")
      { 
        echo ' style';
      }
      else
      { 
        echo ' style="display:none;"';
      } 
      ?> 
      >
        <div class="title"><span>Signup</span></div>
        <form action="includes/signup.inc.php" method="post">
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="First Name" required name="fname" id="fname">
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Last Name" required name="lname" id="lname">
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email" required name="email" id="email">
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" required name="password" id="password">
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Retype Password" required name="retypepassword" id="retypepassword">
          </div>
          <!--<div class="pass"><a href="#">Forgot password?</a></div>-->
          <div class="row button">
            <input type="submit" id="submit" name="submit" value="Signup">
          </div>
          <div class="signup-link">Already a member? <a id="link-login">Login</a></div>
        </form>
      </div>
      <?php
      }
      ?>
    </div>
  </body>
</html>