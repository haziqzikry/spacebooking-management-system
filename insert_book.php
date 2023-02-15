<?php
session_start();
include_once "connect_db.php";

//insert data into table roomResult
$result = "INSERT INTO roomResult (username, blockID, roomID, roomTimeStart, roomTimeEnd, roomDate) 
VALUES ('$_SESSION[USER]','$_POST[sblock]', '$_POST[room]', '$_POST[meet_time_start]', '$_POST[meet_time_end]', '$_POST[meet_date]')";

$find = false;
$check = "SELECT * FROM roomResult where blockID = '$_POST[sblock]' AND roomID = '$_POST[room]'";
$resultcheck = mysqli_query($con, $check);
while($rows=mysqli_fetch_array($resultcheck)){
    if($rows['roomID'] == $_POST['room']){
        if($_POST['meet_time_start'] >= $rows['roomTimeStart'] && $_POST['meet_time_start'] < $rows['roomTimeEnd']){
            $find = true;
            break;
        }
        else if($_POST['meet_time_end'] > $rows['roomTimeStart'] && $_POST['meet_time_end'] <= $rows['roomTimeEnd']){
            $find = true;
            break;
        }
    }
}

if(!$find){
    mysqli_query($con, $result);
    header("location:room_result.php");
}
else{
    $_SESSION['message'] = "This time slot has been booked";
    header("location:".$_SERVER['HTTP_REFERER']);
}

//close connection
mysqli_close($con);

?>