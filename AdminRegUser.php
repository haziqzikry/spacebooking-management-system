<?php
session_start();
?>

<html>
  <head>
    <link rel="stylesheet" href="css/booking.css" />
    <link rel="stylesheet" href="css/bar.css" />
    <title>Register User</title>
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

    <div class="container">
      <div class="box">
        <div class="staffReg">
          <table>
            <form method="post" action="insert_user.php">
              <tr>
                <th>Full Name:</th>
                <td><input type="text" name="fullname" size="" /></td>
              </tr>
              <tr>
                <th>Email:</th>
                <td><input type="text" name="email" size="" /></td>
              </tr>
              <tr>
                <th>Contact Number:</th>
                <td><input type="text" name="fonnumber" size="" /></td>
              </tr>
              <tr>
                <th>Matric ID:</th>
                <td><input type="text" name="matricid" size="" /></td>
              </tr>
    
              <tr>
                <th>Gender:</th>
                
                <td><Select name="gender" id="selectblock">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </Select></td>
              </tr>
              <tr>
                <th>User Level:</th>
                <td><Select name="levelspace" id="selectblock">
                  <option value="Lecturer">Lecturer</option>
                  <option value="Admin">Admin</option>
                  <option value="Manager">Manager</option>
                </Select></td>
              </tr>
    
              <tr>
                <th>Username:</th>
                <td><input type="text" name="username" /></td>
              </tr>
              <tr>
                <th>Password:</th>
                <td><input type="text" name="pass" /></td>
              </tr>
    
              <th align="right" colspan="2">
                <input onclick="successFunction()" name="Submit" type="submit" value="Submit" />
                <input  onclick="resetFunction()"  name="Reset" type="reset" value="Reset" />
              </th>
            </form>
          </table>
        </div>
      </div>
    </div>

    
  </body>

  <?php
  if($_SESSION['message'] == "Username already exists"){
    echo "<script>alert('".$_SESSION['message']."')</script>";
    $_SESSION['message'] = "";
  }
  else if($_SESSION['message'] == "registered"){
    echo "<script>alert('New user has been successfully registered!')</script>";
    $_SESSION['message'] = "";
  }
  ?>
</html>
