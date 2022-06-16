<?php include('includes/web.php')?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/loginstyles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="img/VROOM!.png">
    <title>VROOM! | Sign in</title>
  </head>
  
  <body>
    <section></section>
    <div class="container">
      <a href="index.php"><img class="logo" src="/img/VROOM!_heading.png" alt="LOGO"></a>
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form" method="post">
            <h2 class="title syst">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" placeholder="Password" name="password" required/>
              <i class="far fa-eye" id="togglePassword"></i>
            </div>
            <?php include("includes/errors.php");?>
            <button class="btn solid" type="submit" name="login" id="login">Login</button>
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here?</h3>
            <p>
              Are you a new student or instructor? Sign up now and start driving!
            </p>
            <form action="signup.php">
              <button type="submit"  class="btn transparent" id="sign-up-btn">Sign up</button>
            </form>
          </div>
          <img src="img/signup.png" class="image" alt="" />
        </div>
      </div>
    </div>
  <script src="web.js"></script>
 </body>
</html>
