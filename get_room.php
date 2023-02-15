<?php
include_once "connect_db.php";  

// username and password sent from form login.php
$block=$_GET['block'];
$type=$_GET['page'];

$sql="SELECT * FROM room r JOIN blocks b WHERE r.blockID = b.blockID AND '".$block."' = b.blockID AND '".$type."' = r.roomType";

$result=mysqli_query($con,$sql);

echo '<select id="selectroom" name="room">';
echo '<option value="" disabled selected>Search Room</option>';              

while($row=mysqli_fetch_array($result)){
    echo '<option value="'.$row['roomID'].'">'.$row['roomID'].'</option>';
}
echo '</select>';
?>