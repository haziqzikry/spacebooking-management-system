<?php 
// Start up your PHP Session
session_start();

include_once "connect_db.php"; 

// username and password sent from form login.php
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

$sql="SELECT * FROM person WHERE username='$myusername' and pass='$mypassword'";

$result=mysqli_query($con,$sql);
//fetch record row
if($rows=mysqli_fetch_array($result)){
    $user_name=$rows['username'];
    $user_id=$rows['pass'];
    $user_level=$rows['levelspace'];
}

	
// mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
		
$_SESSION["Login"] = "YES";
 
// Add user information to the session (global session variables)
$_SESSION['USER'] = $user_name;
$_SESSION['LEVEL'] = $user_level;

if(isset($_POST['remember'])){
    setcookie('remember', $_POST['username'],time()+30);
}

if($user_level == "Lecturer")
    header("location:LectDash.php");
else if ($user_level == "Admin")
    header("location:AdminDash.html");
else
    header("location:SpaceDash.php");
}

//if wrong username and password
else {

$_SESSION["Login"] = "NO";
 
}



?>
		 
	  

 
