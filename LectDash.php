<?php
  session_start();
  include_once "connect_db.php";
  include_once "get_user.php";

?>
    
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/dashboardProfile.css" />
    <link rel="stylesheet" href="css/bar.css" />
    <script src="js/dash.js"></script>
    <title>Lecturer Dashboard</title>
  </head>

  <body>
    <div
      class="image"
      style="
        background-image: url(img/background.jpg);
        background-size: cover;
      "
    ></div>

    <header>
      <span class="image-clickable">
        <a href="LectDash.php">
          <img src="img/round-table.png" alt="main-logo" class="logo" />
          <h2>Space Booking<br />Management System</h2>
        </a>
      </span>
      <nav>
        <ul class="nav-links">
          <li><a href="logout.php">Logout</a></li>
          <li><?php echo '<a href="roomselection.html">Book a Space</a>'?></li>
          <li><?php echo '<a href="room_history.php">Room Booking History</a></li>' ?></li>
          <li><?php echo '<a href="room_result.php">Room Booking Result</a></li>' ?></li>
        </ul>
      </nav>
     
      <a href="LectDash.php"><button class="profile">Profile</button></a>
    </header>

    <div class="container">
      <div class="box">
        <h1>Lecturer Profile</h1>
        <div id="propic">
          <?php 
          if($row['profile_img'] != NULL)
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profile_img'] ).'"/>';
          else
            echo '<img src="img/defaultprofile.jpg" />';
            
          ?>
          <form action="updatePicture.php" method="post" enctype="multipart/form-data">
            <h4>Change picture</h4><br>
            <label id="custom-file-upload">
            <input type="file" id="picture" name="picture" onchange="changeColor()">
            <div id="selected">Select</div>
            </label>
            <input type="submit" id="submitpic">
          </form>
          
        </div>

        <div class="pro-container">
          <div class="profile-container">
            <h4 class="name">
              <?php
              echo $row['fullname'];
              ?>
            </h4>
            <div class="lectid">
            <?php
              echo $row['matricid'];
              ?>
            </div>
            <div class="pnum">
            <?php
              echo $row['fonnumber'];
              ?>
            </div>
            <div class="email">
              <a href="mailto:<?php $row['email'] ?>">
                <?php
                echo $row['email'];
                ?>
              </a>
            </div>
          </div>
        </div>

        <form class="edit-container" action="update_profile.php" method="post">
          <table class="user-pass-edit">
            <tr class="header-credentials">
              <td>Username</td>
              <td>Password</td>
            </tr>
            <tr>
              <td>
                <input
                  type="text"
                  id="username"
                  value=""
                  name="username"
                  placeholder=<?php echo ($row['username']); ?>
                />
              </td>
              <td>
                <input
                  type="password"
                  id="password"
                  value=""
                  name="pass"
                  placeholder="Update password here"
                />
              </td>
            </tr>
            <tr>
              <td colspan="2" class="message">
                <i>Note: password <b>MUST</b> consists at least 6 characters and
                  1 number.</i>
              </td>
            </tr>
            <tr>
              <?php echo '<input type="hidden" name="matric">' ?>
              <td colspan="2" class="edit">
                <input
                  type="submit"
                  value="Update Details"
                  id="edit"
                  onclick="return validatePassword(document.getElementById('password'))"
                />
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </body>
</html>
 
<?php

mysqli_close($con);

?>
