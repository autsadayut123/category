
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <script src="main.js" defer></script>
</head>
<body>
<!-- <div class="container">
   <form action="https://www.google.com/search" method="get" target="_blank" id="search-form">
    <input name="q" type="text" placeholder="Search Google..." autocomplete="off" autofocus>
    <button type="button"><i class="fas fa-microphone"></i></button> -->
  <!--</form> -->
  <p class="info"></p>
</div>
<div class="container">
  <h2>เพิ่มข้อมูลวัตถุดิบ</h2>
  <div class="fab">
    <button type="button" class="main" name="btnGiveCommand" id="btnGiveCommand"
    style="border:none;
    background-color: #025677;
    color: internal-light-dark(white-white);">
    <img src="image/1.png"  alt="" style=
    " width:30px;
    margin-left: -2px;
    height:30px;
    border: none;
    background-color: #025677;
    margin-top: 0px;"
    onclick="init();
    startbutton(event);">
    </button>


    
  </div>
  <form action="insert.php" method="POST">
  <div class="form-group">
          <input id='chkcategory' type="checkbox"> หมวดหมู่
            <select class="form-control"  name="category" >
              <option value=""></option>
                <option value="เนื้อสัตว์">เนื้อสัตว์</option>
                <option value="ผัก">ผัก</option>
                <option value="ผลไม้">ผลไม้</option>
                <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                <option value="นม">นม</option>
            </select>
        </div> 
    <div class="form-group">
      <label for="itemname"><input id='chkitemname' type="checkbox"> ชื่อวัตถุดิบ</label>
      <input type="text" class="form-control" id="itemname" placeholder="ใส่ชื่อวัตถุดิบ" name="itemname">
    </div>
    <div class="form-group">
      <label for="mount"><input id='chkmount' type="checkbox"> ปริมาณ</label>
      <input type="text" class="form-control" id="mount" placeholder="ใส่ปริมาณวัตถุดิบ" name="mount">
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
    
    <button href="display.php"  id="chksubmit" type="submit" class="btn btn-primary">บันทึก</button>
    <a href="display.php" typ class="btn btn-danger">ยกเลิก</a>
  </form>
</div>


<div class="container">
<h2>วัตถุดิบที่มีอยู่</h2>
  <table class="table table-bordered ">
    <thead>
      <tr>
        <th>ID</th>
        <th>หมวดหมู่</th>
        <th>รายชื่อวัตถุดิบ</th>
        <th>ปริมาณ</th>
        <th>หน่วย</th>
        <th>ดูข้อมูล</th>
        <th>แก้ไขข้อมูล</th>
        <th>ลบข้อมูล</th>
        
      </tr>
    </thead>
    <tbody>
    </div>
<?php 

    $servername="localhost";
    $username="root";
    $password="";
    $database="add_category";

    $conn=mysqli_connect($servername,$username,$password,$database);

    $sql = "SELECT * FROM register";

    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){

        $id = $row['id'];
       echo '<tr>';
       echo '<td>'.$row['id'].'</td>';
       echo '<td>'.$row['category'].'</td>';
       echo '<td>'.$row['itemname'].'</td>';
       echo '<td>'.$row['mount'].'</td>';
       echo '<td>'.$row['unit'].'</td>';
       echo "<td><a href='view.php?id=$id'<button type='button' class='btn btn-info'>ดูข้อมูล</button></td>";
       echo "<td><a href='edit.php?id=$id'<button type='button' class='btn btn-warning'>แก้ไข</button></a></td>";
       echo "<td><a href='delete.php?id=$id'<button type='button' class='btn btn btn-danger'>ลบ</button></a></td>";

       echo '</tr>';
       
       
       
    }

    
?>

</tbody>
  </table>
</div>
<script>
        var message = document.querySelector('#message');

        var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
        var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;

        var grammar = '#JSGF V1.0;'

        var recognition = new SpeechRecognition();
        var speechRecognitionList = new SpeechGrammarList();
        speechRecognitionList.addFromString(grammar, 1);
        recognition.grammars = speechRecognitionList;
        recognition.lang = 'th-TH';
        recognition.interimResults = false;

        recognition.onspeechend = function() {
            recognition.stop();
        };

        recognition.onerror = function(event) {
            message.textContent = 'Error occurred in recognition: ' + event.error;
        }        

        document.querySelector('#startButton').addEventListener('click', function(){
            recognition.start();

        });


    </script>
</script>
    <span id='message'></span>
    <script>
        var message = document.querySelector('#message');

        var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
        var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;

        var grammar = '#JSGF V1.0;'

        var recognition = new SpeechRecognition();
        var speechRecognitionList = new SpeechGrammarList();
        speechRecognitionList.addFromString(grammar, 1);
        recognition.grammars = speechRecognitionList;
        recognition.lang = 'th-TH';
        recognition.interimResults = false;

        recognition.onresult = function(event) {
            var last = event.results.length - 1;
            var command = event.results[last][0].transcript;
            message.textContent = 'Voice Input: ' + command + '.';

            if(command.toLowerCase() === 'หมวดหมู่'){
                document.querySelector('#chkcategory').checked = true;
            }
            else if (command.toLowerCase() === 'ชื่อวัตถุดิบ'){
                document.querySelector('#chkitemname').checked = true;
            }
            else if (command.toLowerCase() === 'ปริมาณ'){
                document.querySelector('#chkmount').checked = true;
            }
            else if (command.toLowerCase() === 'ปริมาตร'){
                document.querySelector('#chkunit').checked = true;
            }
            else if (command.toLowerCase() === 'บันทึก'){
                document.querySelector('#chksubmit').checked = true;
            }      
        };

        recognition.onspeechend = function() {
            recognition.stop();
        };

        recognition.onerror = function(event) {
            message.textContent = 'Error occurred in recognition: ' + event.error;
        }        

        document.querySelector('#btnGiveCommand').addEventListener('click', function(){
            recognition.start();

        });


    </script>

</body>
</html>