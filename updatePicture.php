<?php
session_start();
include_once "connect_db.php";

if(getimagesize($_FILES['picture']['tmp_name']) == true){
    $image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
    $update = "UPDATE person SET profile_img = '$image' WHERE username='".$_SESSION['USER']."'";
    mysqli_query($con, $update);
}


//close database
mysqli_close($con);

if($_SESSION['LEVEL'] == "Lecturer")
    header("location:LectDash.php");
  else if ($_SESSION['LEVEL'] == "Admin")
      header("location:AdminDash.html");
  else
      header("location:SpaceDash.php");
?>