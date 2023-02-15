<?php
  session_start();
  include_once "connect_db.php";

  $selectblock = "SELECT * FROM blocks";
  $queryblock = mysqli_query($con, $selectblock);
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/booking.css" />
  <link rel="stylesheet" href="css/bar.css" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lecture Hall Booking</title>
</head>

<body>
  <div class="blur-image" style="
        background: url(img/lecture\ hall.jpg) no-repeat center center fixed;
        background-size: cover;
      "></div>
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
    <a href="LectDash.php"><button>Profile</button></a>
  </header>
  <div class="container">
    <div class="box">
      <form class="labform" method="post" action="insert_book.php">
        <h1>LECTURE HALL</h1>
        <br />
        <input type="hidden" id="page" value="Hall Room"/>
        <div class="block">
          <h4>Select Block:</h4>
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
          <label for="Sdate">
            <h4>Select Date:</h4>
          </label><br />
          <input type="date" id="Sdate" name="meet_date" value="" />
        </div>

        <div class="time">
          <label for="Stime">
            <h4>Select Time:</h4>
          </label><br />
          <input type="time" id="Stime" name="meet_time_start" />
          <h5>until</h5>
          <input type="time" id="Etime" name="meet_time_end" />
        </div>

        <br>
        <br>
        <div class="submit">
        <input type="submit"/>
          <a href="roomselection.html">
            <h3>cancel</h3>
          </a>
        </div>
      </form>
    </div>
  </div>
  <script src="js/booking.js"></script>
</body>

</html>

<?php
  if($_SESSION['message'] == "This time slot has been booked"){
    echo "<script>alert('".$_SESSION['message']."')</script>";
    $_SESSION['message'] = "";
  }
  mysqli_close($con);
?>