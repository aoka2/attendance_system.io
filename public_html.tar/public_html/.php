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
        $link = new PDO('mysql:host=localhost;dbname=shukketu', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo("<h2>接続成功</h2>");
        $unique = uniqid();
        $pass = substr($unique,mt_rand(0,9),4);
        $time = date("y/m/d/D/ H:i:s");
        $subjectTime = $_POST['hour'];
        $name = "藤井克俊";
        $sql = "insert into teacher (subjectTime,teacherName,timeStamp,oneTimepass) values (:subjectTime,:name,:time,:pass)";
        $stmt = $link->prepare($sql);
        $params = array(':subjectTime'=>$subjectTime,':name'=>$name,':time'=>$time,':pass'=>$pass);
        $stmt->execute($params);
    } catch(PDOException $e) {
        die("<h2>接続失敗</h2>" . $e->getMessage());
    }
    
    
?>
</body>
</html>