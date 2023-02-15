<?php
session_start();
include_once "connect_db.php";

//insert new user data into table person
$admin = "INSERT INTO person (fullname, email, fonnumber, matricid, gender, levelspace, username, pass) 
values ('$_POST[fullname]','$_POST[email]','$_POST[fonnumber]', '$_POST[matricid]','$_POST[gender]','$_POST[levelspace]', '$_POST[username]','$_POST[pass]') ";

$check = "SELECT * FROM person WHERE username='".$_POST['username']."'";
$result=mysqli_query($con,$check);
  
if(!mysqli_num_rows($result)){
    mysqli_query($con, $admin);
    $_SESSION['message'] = "registered";
}
else{
    $_SESSION['message'] = "Username already exists";
}


header('location:AdminRegUser.php');


//close database
mysqli_close($con);
?>