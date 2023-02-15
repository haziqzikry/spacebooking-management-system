<?php
  session_start();
  include_once "connect_db.php";
  $change = 0;

  //update pass
  if(strlen($_POST['pass']) > 0 && strlen($_POST['username']) > 0){
    $update = "UPDATE person SET username = '".$_POST['username']."', pass = '".$_POST['pass']."' WHERE username='".$_SESSION['USER']."'";
    $change = 1;
  }
  else if(strlen($_POST['pass']) == 0 && strlen($_POST['username']) > 0){
    $update = "UPDATE person SET username = '".$_POST['username']."' WHERE username='".$_SESSION['USER']."'";
    $change = 1;
  }
  else if(strlen($_POST['pass']) > 0 && $_POST['username'] == ""){
    $update = "UPDATE person SET pass = '".$_POST['pass']."' WHERE username='".$_SESSION['USER']."'";  
  }
  else{
    //close
    mysqli_close($con);

    if($_SESSION['LEVEL'] == "Lecturer")
      header("location:LectDash.php");
    else if ($_SESSION['LEVEL'] == "Admin")
        header("location:AdminDash.php");
    else
        header("location:SpaceDash.php");
  }

  if($_POST['username'] != ""){
    $check = "SELECT * FROM person WHERE username='".$_POST['username']."'";
    $result=mysqli_query($con,$check);
    
    if(!mysqli_num_rows($result)){
      mysqli_query($con, $update);
      if($change == 1)
        $_SESSION['USER'] = $_POST['username'];
    }
  }
  else{
    mysqli_query($con, $update);
  }
  
  

  //close
  mysqli_close($con);

  if($_SESSION['LEVEL'] == "Lecturer")
    header("location:LectDash.php");
  else if ($_SESSION['LEVEL'] == "Admin")
      header("location:AdminDash.php");
  else
      header("location:SpaceDash.php");
?>