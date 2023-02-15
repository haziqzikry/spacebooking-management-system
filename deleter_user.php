<?php
include_once "connect_db.php";

//delete user data from table person

$uID = $_GET['del'];
$deleter = "DELETE FROM roomresult WHERE username ='".$uID."'";
$deletep = "DELETE FROM person WHERE username ='".$uID."'"; 

mysqli_query($con,$deleter);

if(mysqli_query($con,$deletep)){
    header('location:AdminViewUser.php');
}
else{
    die("Error deleting student".mysqli_error($con));
}

//close database
mysqli_close($con);
?>