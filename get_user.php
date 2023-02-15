<?php
$sql="SELECT * FROM person WHERE username='".$_SESSION['USER']."'";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>