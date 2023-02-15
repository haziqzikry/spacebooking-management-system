<?php
session_start();
include_once "connect_db.php"; 

//select what need to be display
$result = "SELECT r.roomType, t.roomID, t.roomTimeStart, t.roomTimeEnd, t.roomDate
FROM room r JOIN roomResult t
WHERE r.roomID = t.roomID AND t.username = '".$_SESSION['USER']."'";

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

    <title>Lecturer Room Booking History</title>

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
          <div class="text">
            <br />
            <h1>Room History Booking</h1>
            <br />
            *Click any header to sort
          </div>
          <table class="styled-table" id="room-sort">
            <thead>
              <tr class="header">
                <th>No.</th>
                <th onclick="sortTable(0)">Room type</th>
                <th onclick="sortTable(1)">Room code</th>
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
                <td><?php echo $row['roomType'];?></td>
                <td><?php echo $row['roomID'];?></td>
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

<?php
    //close connection
    mysqli_close($con);
?>
