<?php

include_once "connect_db.php";

//select what need to be display
$space = "SELECT p.fullname, r.roomType, s.blockID, s.username, s.roomID, s.roomTimeStart, s.roomTimeEnd, s.roomDate, s.result
FROM person p JOIN room r JOIN roomResult s
WHERE r.roomID = s.roomID AND p.username = s.username";

$query = mysqli_query($con, $space);


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/SpaceAppList.css" />

    <title>Space Admin Reject and Approve Application</title>

    <body>
      <script src="js/SpaceRoomHistory.js"></script>

      <div class="blur-image"></div>
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
            <h1>Room Booking Request List</h1>
            <br />
            *Click any header to sort
          </div>
           <table class="styled-table" id="room-sort">
            <thead>
              <tr class="header">
                <th onclick="sortTable(0)">Applicant's Name</th>
                <th onclick="sortTable(1)">Room Type</th>
                <th onclick="sortTable(2)">Time & Date</th>
                <th>Reject/Approve Book</th>
              </tr>
            </thead>
            <form action="insert_ceptject.php" method="get">
            <tbody align="center">
              <?php
                  while($row = mysqli_fetch_assoc($query)){
                    if($row['result'] == ""){          
              ?>
              <tr>
                <td><?php echo $row['fullname'];?></td> <!-- fetch fullname -->
                <td><?php echo $row['roomType'];?> - <?php echo $row['roomID'];?></td> <!--fetch room type and roomID-->
                <td><?php echo $row['roomTimeStart'];?> - <?php echo $row['roomTimeEnd'];?>
                <br /><?php echo $row['roomDate'];?></td> <!--fetch date and time-->
                <?php
                  echo '<td><a href="insert_ceptject.php?user='.$row['username'].'&date='.$row['roomDate'].'
                  &block='.$row['blockID'].' &room='.$row['roomID'].'&timestart='.$row['roomTimeStart'].'
                  &timeend='.$row['roomTimeEnd'].'&action=accept">
                  <input type="button" value="Accept" id="accept" name=accept /></a>';
                  
                  echo '<a href="insert_ceptject.php?user='.$row['username'].'&date='.$row['roomDate'].'
                  &block='.$row['blockID'].' &room='.$row['roomID'].'&timestart='.$row['roomTimeStart'].'
                  &timeend='.$row['roomTimeEnd'].'&action=reject"><input type="button" value="Reject" id="reject" name=reject /></a></td>';

                ?>
              </tr>
              <?php
                    }
                  }
              ?>
            </tbody>
            </form>
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