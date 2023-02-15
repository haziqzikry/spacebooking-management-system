<?php
include_once "connect_db.php";

//verify connection
if(!$con){
    die('Server ERROR <br>');
}

//select database
mysqli_select_db($con, "id19145797_spacedb");

//insert person
$p1 = "INSERT INTO person (fullname, email, fonnumber, matricid, gender, levelspace, username, pass)
    VALUES ('Admin','admin@gmail.com', '0000000000', 'ADMIN0001', 'Male', 'Admin', 'admin' , 'admin')";
//insert block
$a1 = "INSERT into blocks (blockID) VALUES ('N28')";
$a2 = "INSERT into blocks (blockID) VALUES ('N28a')";

//insert lecture room
$l1 = "INSERT into room (roomID, roomType, blockID) VALUES ('HALL 1', 'Hall Room', 'N28')";
$l2 = "INSERT into room (roomID, roomType, blockID) VALUES ('HALL 2', 'Hall Room', 'N28')";
$l3 = "INSERT into room (roomID, roomType, blockID) VALUES ('HALL 3', 'Hall Room', 'N28a')";
$l4 = "INSERT into room (roomID, roomType, blockID) VALUES ('HALL 4', 'Hall Room', 'N28a')";

//insert meeting room
$m1 = "INSERT into room (roomID, roomType, blockID) VALUES ('MEET 1', 'Meeting Room', 'N28')";
$m2 = "INSERT into room (roomID, roomType, blockID) VALUES ('MEET 2', 'Meeting Room', 'N28')";
$m3 = "INSERT into room (roomID, roomType, blockID) VALUES ('MEET 3', 'Meeting Room', 'N28a')";
$m4 = "INSERT into room (roomID, roomType, blockID) VALUES ('MEET 4', 'Meeting Room', 'N28a')";

//insert computer lab
$c1 = "INSERT into room (roomID, roomType, blockID) VALUES ('LAB 1', 'Computer Lab', 'N28')";
$c2 = "INSERT into room (roomID, roomType, blockID) VALUES ('LAB 2', 'Computer Lab', 'N28')";
$c3 = "INSERT into room (roomID, roomType, blockID) VALUES ('LAB 3', 'Computer Lab', 'N28a')";
$c4 = "INSERT into room (roomID, roomType, blockID) VALUES ('LAB 4', 'Computer Lab', 'N28a')";

//query all insert
mysqli_query($con,$p1);

mysqli_query($con,$a1);
mysqli_query($con,$a2);

mysqli_query($con,$l1);
mysqli_query($con,$l2);
mysqli_query($con,$l3);
mysqli_query($con,$l4);

mysqli_query($con,$m1);
mysqli_query($con,$m2);
mysqli_query($con,$m3);
mysqli_query($con,$m4);

mysqli_query($con,$c1);
mysqli_query($con,$c2);
mysqli_query($con,$c3);
mysqli_query($con,$c4);

//close database
mysqli_close($con);
?>