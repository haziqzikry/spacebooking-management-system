<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Space Booking Management System</title>
  <link rel="stylesheet" href="css/Login.css" />
</head>

<body>
  <div class="container">
    <div class="center">
      <div class="box">
        <div class = "logo-box">
          <img class="icon" src="img/round-table.png" />
        </div>
        <div>
          <h2>Space Booking<br/>Management System</h2>
        </div>
        <form class="form_login" name="login" method="post" action = "check_login.php">
          
          <div class="login">
            <label for="username"><b>Username</b></label>
            <input id="user" type="text" placeholder="Enter Username" name="username" 
            value="<?php 
              if(isset($_COOKIE["remember"]))
              echo $_COOKIE["remember"];
            ?>"
            
            required />

            <label for="password"><b>Password</b></label>
            <input id="pwd" type="password" placeholder="Enter Password" name="password" required />

            <label>
              <input type="checkbox" checked="checked" name="remember" />
              Remember me
            </label>
          </div>

          <div id = "alert">
            <p id = alert-text>CAPS LOCK IS ON</p>
          </div>

          <div class = "login">
            <button class="submit" type="submit" onclick="return loginTest();">Login</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
  <script src="js/Login.js"></script>
</body>

</html>