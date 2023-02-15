<?php
include_once "connect_db.php";  

// username and password sent from form login.php
$myusername=$_GET['username'];
$mypassword=$_GET['password'];

$sql="SELECT * FROM person WHERE username='$myusername' and pass='$mypassword'";

$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result); //fetch record row
// mysql_num_row is counting table row
$count=mysqli_num_rows($result);

echo ($count);


?>