<?php

// print_r($_POST);

$category = $_POST['category'];
$itemname = $_POST['itemname'];
$mount = $_POST['mount'];
$unit = $_POST['unit'];


$servername = "localhost";
$username = "root";
$password = "";
$database = "add_category";

$conn = mysqli_connect($servername,$username,$password,$database);

$sql = "INSERT INTO `register`( `category`, `itemname`, `mount`, `unit`) VALUES ('$category','$itemname','$mount','$unit')";

$insert = mysqli_query($conn,$sql);

 if($insert){
     header("location: display.php");
 }
 else{
     echo "Error";
 }

// ?>