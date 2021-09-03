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
  <h2>แก้ไขข้อมูลวัตถุดิบ</h2>
  <form action="update.php" method="POST">
      <input type="hidden" name='id' value="<?php echo $id;?>">
    <div class="form-group">
      <label for="cname">หมวดหมู่:</label>
      <input type="text" class="form-control" id="cname"  value=<?php echo $category;?> placeholder="Enter Category" name="cname">
    </div> 
    <div class="form-group">
      <label for="iname">ชื่อวัตถุดิบ:</label>
      <input type="text" class="form-control" id="iname"  value=<?php echo $itemname;?> placeholder="Enter itemname" name="iname">
    </div>
    <div class="form-group">
      <label for="mname">ปริมาณ:</label>
      <input type="text" class="form-control" id="mname"  value=<?php echo $mount;?> placeholder="Enter amount" name="aname">
    </div>
    <div class="form-group">
            <label><input id='chkunit' type="checkbox">ปริมาตร</label>
            <select class="form-control"  name="unit" >
                <option value="">...</option>
                <option value="กรัม">กรัม</option>
                <option value="กิโลกรัม">กิโลกรัม</option>
                <option value="ลิตร">ลิตร</option>
                <option value="มิลลิลิตร">มิลลิลิตร</option>
            </select>
        </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
  </form>
</div>


</body>
</html>
