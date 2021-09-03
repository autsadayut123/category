<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">

</head>
<body>

<?php
    $id = $_GET['id'];

    $servername="localhost";
    $username="root";
    $password="";
    $database="add_category";

    $conn = mysqli_connect($servername,$username,$password,$database);

    $sql = "SELECT * FROM `register` WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    
    $category = $row['category'];
    $itemname = $row['itemname'];
    $mount = $row['mount'];
    $unit = $row['unit'];

?>

<div class="container">
  <h2>ดูข้อมูลวัตถุดิบ</h2>
  <form action="display.php" method="POST">
    <div class="form-group">
      <label for="cname">category:</label>
      <input type="text" class="form-control" id="cname" disabled value=<?php echo $category;?> placeholder="Enter Category" name="cname">
    </div> 
    <div class="form-group">
      <label for="iname">itemname:</label>
      <input type="text" class="form-control" id="iname" disabled value=<?php echo $itemname;?> placeholder="Enter itemname" name="iname">
    </div>
    <div class="form-group">
      <label for="mname">mount:</label>
      <input type="text" class="form-control" id="mname" disabled value=<?php echo $mount;?> placeholder="Enter amount" name="aname">
    </div>
    <div class="form-group">
      <label for="uname">unit:</label>
      <input type="text" class="form-control" id="unit" disabled value=<?php echo $unit;?> placeholder="Enter unit" name="uname">
    </div>
    <button type="submit" class="btn btn-primary">หน้าหลัก</button>

  </form>
</div>


</body>
</html>
