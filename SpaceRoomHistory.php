<?php
include_once "connect_db.php";

//select what need to be display
$result = "SELECT p.fullname, r.username, t.roomType, r.roomID, r.roomTimeStart, r.roomTimeEnd, r.roomDate
FROM person p JOIN roomResult r JOIN room t
WHERE r.username = p.username AND r.roomID = t.roomID";

$query = mysqli_query($con,$result);

$count = 1;

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/SpaceRoomHistory.css" />
    <link rel="stylesheet" href="css/bar.css" />

    <title>Space Booking History</title>

    <body>
      <script src="js/SpaceRoomHistory.js"></script>
      <div
        class="blur-image"
        style="
          background: url(img/lecture\ hall.jpg) no-repeat center center fixed;
          background-size: cover;
        "
      ></div>
      <header>
        <span class="image-clickable">
          <a href="SpaceDash.php">
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
        <a href="SpaceDash.php"><button>Profile</button></a>
      </header>

      <div class="container">
        <div class="box">
          <div class="text">
            <br />
            <h1>Space Booking</h1>
            <br />
            *Click any header to sort
          </div>
          <table class="styled-table" id="room-sort">
            <thead>
              <tr class="header">
                <th>No.</th>
                <th onclick="sortTable(0)">Applicant's Name</th>
                <th onclick="sortTable(1)">Room Type</th>
                <th onclick="sortTable(2)">Time</th>
                <th onclick="sortTable(3)">Date of Booking</th>
              </tr>
            </thead>

            <tbody align="center">
              <?php
                  while($row = mysqli_fetch_assoc($query)){          
              ?>
              <tr>
                <td><?php echo $count++ ?></td>
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['roomType'];?> - <?php echo $row['roomID'];?></td>
                <td><?php echo $row['roomTimeStart'];?> - <?php echo $row['roomTimeEnd'];?></td>
                <td><?php echo $row['roomDate'];?></td>
              </tr>
              <?php
                  }
              ?>
            </tbody>
          </table>

          <div class="button">
            <input type="button" value="Print" onclick="window.print()" />
          </div>
        </div>
      </div>
    </body>
  </head>
</html>
