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
  <link rel="stylesheet" href="css/bar.css"/>
  <script src="js/dash.js"></script>
  <title>Space Manager Profile</title>
</head>

<body>
    <div
      class="image"
      style="
        background: url(img/background.jpg) no-repeat center center fixed;
        background-size: cover;
      "
    ></div>
    <header>
        <span class="image-clickable">
          <a href="roomselection.html">
            <img src="img/round-table.png" alt="main-logo" class="logo" />
            <h2>Space Booking<br />Management System</h2>
          </a>
        </span>
        <nav>
          <ul class="nav-links">
            <li><a href="logout.php">Logout</a></li>
            <li><a href="SpaceAppList.php">Space Request List</a></li>
            <li><a href="SpaceRoomHistory.php">Space Room Booking History</a></li>
          </ul>
        </nav>
        <a href="SpaceDash.php"><button class="profile">Profile</button></a>
    </header>

    
    <div class="container">
        <div class="box">
            <h1>Space Manager Profile</h1>
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
                  <h4 class="name"><?php
                    echo $row['fullname'];
                    ?>
                  </h4>
                  <div class="lectid"><?php
                  echo $row['matricid'];
                  ?></div>
                  <div class="pnum"><?php
                  echo $row['fonnumber'];
                  ?></div>

                  <div class="email"><a href="mailto:<?php $row['email'];?>">
                  <?php
                  echo $row['email'];
                  ?></a></div>

                </div>
            </div>

            <form class="edit-container" action="update_profile.php" method="post">
                <table class="user-pass-edit">
                  <tr class="header-credentials">
                    <td>
                      Username
                    </td>
                    <td>
                      Password
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input name ="username" type="text" id="username" value="" placeholder=<?php echo ($row['username']); ?>>
                    </td>
                    <td>
                      <input name="pass" type="password" id="password" value="" placeholder="Update password here">
                    </td>
                  </tr>
                  <tr >
                    <td colspan="2" class="message">
                      <i>Note: password <b>MUST</b> consists at least 6 characters and 1 number.</i>
                    </td>
                  </tr>
                  <tr>
                  <?php echo '<input type="hidden" name="matric">' ?>
                    <td colspan="2" class="edit">
                      <input type="submit" value="Update Details" id="edit" onclick="validatePassword(document.getElementById('password'))">
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