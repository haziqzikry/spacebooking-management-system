<?php
include_once "connect_db.php";

$select = "SELECT * FROM person";
  $query = mysqli_query($con, $select);

  while($row=mysqli_fetch_assoc($query)){
    $user = $row['username'];
}

//select what need to be display
$result = "SELECT * FROM person";

$query = mysqli_query($con,$result);

$count = 1;

?>


<html>
  <head>
    <link rel="stylesheet" href="css/AdminViewUser.css" />
    <link rel="stylesheet" href="css/bar.css" />
    <title>View List of Users</title>
  </head>

  <body>
  <script src="js/ConfirmationUsers.js"></script>
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
   
      <!--display list of user
    select
    system prompt all details
    -->
    <div class="container">
        <div class="box">
          <div class="text">
            <br />
            <h1>List of Users</h1>
            <br />
          </div>
          <table class="styled-table" id="room-sort">
            <thead>
              <tr class="header">
                <th>No.</th>
                <th >Full Name</th>
                <th >Email</th>
                <th >Contact Number</th>
                <th >Matric ID</th>
                <th >Gender</th>
                <th >User Level</th>
                <th >Username</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody align="center">
              <?php
                  while($row = mysqli_fetch_assoc($query)){          
              ?>
              <tr>
                <?php $id = $row['username'];?>
                <td><?php echo $count++ ?></td>
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['fonnumber'];?></td>
                <td><?php echo $row['matricid'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['levelspace'];?> </td>
                <td><?php echo $row['username'];?> </td>
                <td>
                  <a href="AdminUpdateUser.php?id=<?php echo $id ?>">Update</a>
                  <a onclick="deleteUser()" href= "deleter_user.php?del=<?php echo $id ?>">Delete</a>
                
                </td>
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

      
    </div>
  </body>
</html>
