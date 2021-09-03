<?php

//print_r($_POST);
    $id = $_POST['id'];
    $category = $_POST['cname'];
    $itemname = $_POST['iname'];
    $mount = $_POST['aname'];
    $unit = $_POST['uname'];

    $servername="localhost";
    $username="root";
    $password="";
    $database="add_category";

    $conn = mysqli_connect($servername,$username,$password,$database);

    $sql = "UPDATE `register` SET `category`='$category',`itemname`='$itemname',`mount`='$mount',`unit`='$unit' WHERE  id=$id";

    $update = mysqli_query($conn,$sql);
    if($update){
        header("Location: display.php");
    }

?>