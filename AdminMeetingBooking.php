<?php
  include_once "connect_db.php";

  $selectblock = "SELECT * FROM blocks";
  $queryblock = mysqli_query($con, $selectblock);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/booking.css" />
    <link rel="stylesheet" href="css/bar.css" />
    <title>Meeting Room Booking</title>
  </head>

  <body>
    <div
      class="blur-image"
      style="
        background: url(img/meeting\ room.jpg) no-repeat center center fixed;
        background-size: cover;
      "
    ></div>
    <header>
      <span class="image-clickable">
        <a href="AdminDash.html">
          <img src="img/round-table.png" alt="main-logo" class="logo" />
          <h2>Space Booking<br />Management System</h2>
        </a>
      </span>
      <nav>
        <ul class="nav-links">
          <li><a href="logout.php">Logout</a></li>
          <li><a href="AdminRegUser.php">Register New User</a></li>
          <li><a href="AdminViewUser.php">View Users</a></li>
          <li><a href="AdminRoomSelection.html">Book a Space</a></li>
          <li><a href="AdminRoomBookHistory.php">Room Booking History</a></li>
        </ul>
      </nav>
      <a href="AdminDash.html"><button>Return to admin dashboard</button></a>
    </header>
    <div class="container">
      <div class="box">
        <form class="labform">
          [ADMIN MODE] <br />
          <h1>MEETING ROOM</h1>
          <br />

          <input type="hidden" id="page" value="Meeting Room"/>
          <div class="block">
            <h4>Select Block:</h4>
            <br />
            <select name="sblock" id="selectblock" onchange="getRoom()">
              <option value="" disabled selected>Search Block</option>
              <?php 
                while($row = mysqli_fetch_assoc($queryblock)){
                  echo '<option value='.$row['blockID'].'>'.$row['blockID'].'</option>';
                }
              ?>
            </select>
          </div>

          <div class="room" style="width: 300px">
            <h4>Select Room:</h4>
            <br />
            <div id="fetchroom">
              <select id="selectroom" name="room">
                    <option value="" disabled selected>Search Room</option>
              </select>
            </div>
          </div>

          <div class="date">
            <label for="Sdate"> <h4>Select Date:</h4> </label><br />
            <input type="date" id="Sdate" name="meet_date" value="" />
          </div>

          <div class="time">
            <label for="Stime"> <h4>Select Time:</h4> </label><br />
            <input type="time" id="Stime" name="meet_time_start" />
            <h5>until</h5>
            <input type="time" id="Etime" name="meet_time_end" />
          </div>

          <br />
          <br />
          <br />
          <div class="submit">
            <input type="submit" />
            <a href="AdminRoomSelection.html">
              <h3>cancel</h3>
            </a>
          </div>
        </form>
        <script src="js/booking.js"></script>
      </div>
    </div>
  </body>
</html>
