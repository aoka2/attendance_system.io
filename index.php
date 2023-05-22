<?php
  #※一部の変数、引数を書いていません

  $pdo = new PDO('mysql:dbname=データベース名;host=ホスト名;' , 'ユーザー名', 'パスワード'); #データベースに接続
  $pdo->query('SET NAMES utf8;'); #プログラム中の文字コードを指定
  $stmt = $pdo->prepare('SELECT 学科ID FROM TableData'); #変数名の前に:変数名 とするとSQLinjection対策
  #$stmt->bindValue(':mail_address', $mail_address, PDO::PARAM_STR); #プレースホルダ使用時
  $department_id = $stmt->execute(); #SQL実行
  unset($pdo); #SQL切断
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>出欠プログラム</title>
</head>
<body>
  <h1>出欠プログラム</h1>
  
  <form action="process.php" method = "post">
    <select name="department_id_pulldown">
      <label for="subjectID">学科IDを入力してください</label>
      <option value="">
      <?phpfor($num = 0; $num < count($department_id); $num++ ){$dapertment_id[num]}?>
      </option>
    </select>
    <input type="courseID" id="courseID" name="courseID" maxlength="4" required><br><br>
    
    </select><br>
    <label for="attendanceNumber">出席番号:</label>
    <input type="text" id="attendanceNumber" name="attendanceNumber" required><br><br>
    
   <label for="subjectID">授業IDを入力してください</label>
    <input type="subjectID" id="subjectID" name="subjectID" maxlength="4" required><br><br><br>
    
    <label for="pass">パス:</label>
    <input type="text" id="pass" name="pass" pattern="[a-z0-9]+" maxlength="4" required><br><br>
    
    <input type="submit" value="送信">
  </form>
</body>
</html>