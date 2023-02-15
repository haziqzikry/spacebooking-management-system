<?php
include_once "connect_db.php";

//update user data into table person
$id = $_GET['id'];
//query for default value in text input
$orignal_user = mysqli_query($con, "SELECT * FROM person WHERE username = '".$id."'");
$row = mysqli_fetch_array($orignal_user);

//function to update
if(isset($_POST['update'])){
    $update_person = "UPDATE person SET fullname='".$_POST['fullname']."',
    email='".$_POST['email']."', fonnumber='".$_POST['fonnumber']."',
    matricid='".$_POST['matricid']."', gender='".$_POST['gender']."',
    levelspace='".$_POST['levelspace']."', username='".$_POST['username']."',
    pass='".$_POST['pass']."' WHERE username = '".$id."'";
    mysqli_query($con, $update_person);
    header('location: AdminViewUser.php');
}


//close database
mysqli_close($con);
?>


<html>
  <head>
    <link rel="stylesheet" href="css/booking.css" />
    <link rel="stylesheet" href="css/AdminViewUser.css" />
    <link rel="stylesheet" href="css/bar.css" />
    <title>Update User</title>
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
    <div class="center">
    <div class="box">
        <form action='AdminUpdateUser.php?id=<?php echo $id ?>' method='post'>
        <h1>Update User Details</h1>
            <table class="styled-table"  id="tableUpdate" border="1">
                <thead>
                <tr class="header">
                <th>Full Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Matric ID</th>
                <th>Gender</th>
                <th>User Level</th>
                <th>Username</th>
                <th>Password</th>
                
              </tr>
            </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="fullname" value="<?php echo $row['fullname']?>"/>
                        </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $row['email']?>"/>
                        </td>
                        <td width=150px>
                            <input type="text" name="fonnumber" value="<?php echo $row['fonnumber']?>"/>
                        </td>
                        <td>
                            <input type="text" name="matricid" value="<?php echo $row['matricid']?>"/>
                        </td>
                        <td>
                            <?php
                            if($row['gender'] == "Male")
                              echo '<Select name="gender" id="selectblock">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              </Select>';
                            else
                              echo '<Select name="gender" id="selectblock">
                              <option value="Female">Female</option>
                              <option value="Male">Male</option>
                              </Select>';
                            ?>
                            
                        </td>
                        <td>
                            <?php
                            if($row['levelspace'] == "Lecturer")
                            echo '<Select name="levelspace" id="selectblock">
                            <option value="Lecturer">Lecturer</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            </Select>';
                            else if($row['levelspace'] == "Manager")
                            echo '<Select name="levelspace" id="selectblock">
                            <option value="Manager">Manager</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Admin">Admin</option>
                            </Select>';
                            else
                            echo '<Select name="levelspace" id="selectblock">
                            <option value="Admin">Admin</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Manager">Manager</option>
                            </Select>';
                            ?>
                        </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $row['username']?>"/>
                        </td>
                        <td>
                            <input type="text" name="pass" value="<?php echo $row['pass']?>"/>
                        </td>
                        </tr>
                  </tbody>
              </table>
              <div class="button ">
                  <input onclick=" updateUser()" type="submit" name="update" value="Update" />
              </div>
          </form>
        </div>
</div>
      </div>
  </body>
</html>
