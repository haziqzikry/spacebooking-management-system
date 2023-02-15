<?php

  include_once "connect_sql.php";

  if (mysqli_query($con,"CREATE DATABASE id19145797_spacedb")){
      echo "Database created<br>";
  }else{
      echo "Error creating database: " . mysqli_error($con) . "<br>";
  }

  if(mysqli_select_db($con, "id19145797_spacedb")){
      echo "Connection to mydatabase successfully established <br>";
  }
  else{
      echo('ERROR: Could not connect.<br>');
  }

  //create table person
  $sql = "CREATE TABLE person
  (
      fullname varchar(255),
      email varchar(255),
      fonnumber varchar(255),
      matricid varchar(255),
      gender varchar(10),
      levelspace varchar(10),

      username varchar(20),
      pass varchar(20),
      profile_img longblob null,

      primary key (username)
  );";

  //create table block
  $block ="CREATE TABLE blocks(
    blockID varchar (5),
    
    primary key(blockID),
    unique(blockID)
  );";

  //create table room
  $room = "CREATE TABLE room(
    roomID varchar(15),
    roomType varchar (50),
    blockID varchar(5),

    primary key (roomID),
    foreign key (blockID) references blocks(blockID),
    unique(roomID)
  );";

  //create room time and date booking
  $rtd = "CREATE TABLE roomResult(
    blockID varchar(5),
    roomID varchar (15),
    username varchar(20),
    roomTimeStart time(2),
    roomTimeEnd time(2),
    roomDate Date,
    result varchar(20) DEFAULT '',

    foreign key (username) references person(username),
    foreign key (blockID) references blocks(blockID),
    foreign key (roomID) references room(roomID)
  );";



  //query table person
  if (mysqli_query($con,$sql)){
    echo "Table person created<br>";
  }
  else{
    die('Error creating table: ' . mysqli_error($con) . '<br>');
  }

  //query table block
  if (mysqli_query($con,$block)){
    echo "Table block created<br>";
  }
  else{
    die('Error creating table: ' . mysqli_error($con) . '<br>');
  }

  //query table room
  if (mysqli_query($con,$room)){
    echo "Table room created<br>";
  }
  else{
    die('Error creating table: ' . mysqli_error($con) . '<br>');
  }


  //query table roomResult
  if (mysqli_query($con,$rtd)){
    echo "Table roomResult created<br>";
  }
  else{
    die('Error creating table: ' . mysqli_error($con) . '<br>');
  }

  

  //close connection
  mysqli_close($con);
?>

