<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Loading Page</title>
</head>
<body>
  <h1>Loading Page</h1>
<?php
    try{
        $link = new PDO('mysql:host=localhost;dbname=shukketu', 'root', '');
        echo("<h2>接続成功</h2>");
        $unique = uniqid();
        $pass = substr($unique,mt_rand(0,9),4);
        $time = date("Y-m-d-D H:i:s");
        $subjectTime = $_POST['hour'];
        $name = $_POST['subjectID'];
        $teacherID = $_POST['teacherID'];
        $sql = "insert into teacher (subjectTime,oneTimepass,subjectID,teacherID) values (:subjectTime,:pass,:subjectID,:teacherID)";
        $stmt = $link->prepare($sql);
        $params = array(':subjectTime'=>$subjectTime,':pass'=>$pass,':subjectID'=>$name,':teacherID'=>$teacherID);
        $stmt->execute($params);
        echo("<h2>送信に成功しました</h2>");
        echo($pass);
    } catch(PDOException $e) {
        die("<h2>接続失敗</h2>" . $e->getMessage());
    }
    
    
?>
</body>
</html>