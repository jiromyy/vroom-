<?php include('includes/web.php')?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signupstyles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="img/VROOM!.png">
    <title>VROOM! | Sign up </title>
 </head>
 
  <body>
  <section></section>
    <div class="container">
      <a href="index.php"><img class="logo" src="/img/VROOM!_heading.png" alt="LOGO"></a>
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2><br>
            <div>
              <label for="typeS">Register as: </label>
              <input type="radio" name="type" id="type" value="Student" required>
              <label for="type">STUDENT</label>
              <input type="radio" name="type" id="type" value="Instructor">
              <label for="type">INSTRUCTOR</label>
              
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username"required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password"/>
              <i class="far fa-eye eye" id="togglePassword"></i>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"/>
              <i class="far fa-eye eye" id="ctogglePassword"></i>
            </div>
            <?php include("includes/errors.php");?>
            <button type="submit" class="btn narrow" id="continue" name="continue"><i class="fas fa-chevron-circle-right fa-2x"></i></button>
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel right-panel">
          <div class="content">
            <h3>Already Registered?</h3>
            <p>
              Sign in now to access your account!
            </p>
            <form action="login.php">
              <button class="btn transparent" id="sign-in-btn">Sign in</button> 
            </form>
          </div>
          <img src="img/signin.png" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="web.js"></script>
  </body>
  </html>
