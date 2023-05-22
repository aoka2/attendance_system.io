<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>認証画面</title>
</head>
<body>
  <h1>出欠プログラム</h1>
<?php
try {
    $link = new PDO('mysql:host=localhost;dbname=shukketu', 'root', '');
    echo("接続成功");
    $id = $_POST['subjectID'];
    $stmt = $link->prepare("SELECT * FROM teacher WHERE subjectID = :id AND timeStamp > DATE_SUB(NOW(), INTERVAL 15 MINUTE);");
    $stmt->bindParam(':id', $id);
    $res = $stmt->execute();
    if ($res) {
        $data = $stmt->fetch();
        $inputPass = $_POST['pass'];
        echo($data['oneTimepass']);
        if ($inputPass == $data['oneTimepass']) {
            echo("<h2>認証に成功しました</h2>");
            $subjectTime = $data['subjectTime'];
            $subjectID = $data['subjectID'];
            $attendanceNumber = $_POST['attendanceNumber'];
            $shukketu = "出席";
            $sql = "INSERT INTO absent (subjecttime, id, attendance, shukketus) VALUES (:subjectTime, :subjectID, :attendanceNumber, :shukketu)";
            $stmt = $link->prepare($sql);
            $params = array(':subjectTime' => $subjectTime, ':subjectID' => $subjectID, ':attendanceNumber' => $attendanceNumber, ':shukketu' => $shukketu);
            $stmt->execute($params);
        } else {
            echo("<h2>認証に失敗しました</h2>");
            echo("<form action = \"index.php\">");
            echo("<input type=\"submit\" value=\"戻る\">");
            echo("</form>");
        }
    }
} catch (PDOException $e) {
    die('接続失敗！' . $e->getMessage());
}

function getPass($data, $key)
{
    $getPass = $data[$key];
}
?>
</body>
</html>