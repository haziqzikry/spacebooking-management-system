<?php

include_once "connect_db.php";

//insert data into table roomAcceptReject
if(isset($_GET['action'])){
    switch($_GET['action']){
        case "accept":
            $update = "UPDATE roomresult 
            set result = '$_GET[action]' where roomDate = '$_GET[date]' 
            AND blockID = '$_GET[block]' AND roomID = '$_GET[room]'
            AND roomTimeStart = '$_GET[timestart]' AND roomTimeEnd = '$_GET[timeend]' 
            AND username = '$_GET[user]'";
            mysqli_query($con, $update);
            break;
        case "reject":
            $update = "UPDATE roomresult 
            set result = '$_GET[action]' where roomDate = '$_GET[date]' 
            AND blockID = '$_GET[block]' AND roomID = '$_GET[room]'
            AND roomTimeStart = '$_GET[timestart]' AND roomTimeEnd = '$_GET[timeend]' 
            AND username = '$_GET[user]'";
            mysqli_query($con, $update);
            break;
        default:
            die('Error: Invalid action.');
        break;
    }
}

//close
mysqli_close($con);
header("location:SpaceAppList.php");

?>