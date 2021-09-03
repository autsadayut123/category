<?php

$id = $_GET['id'];

    $servername="localhost";
    $username="root";
    $password="";
    $database="add_category";

    $conn = mysqli_connect($servername,$username,$password,$database);
    $sql = "DELETE FROM `register` WHERE id=$id";

    $delete = mysqli_query($conn,$sql);
    if($delete){
        header("Location: display.php");
    }

?>