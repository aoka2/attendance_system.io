<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>出欠プログラム</title>
</head>
<body>
  <h1>出欠プログラム</h1>
  
  <form action="process.php" method = "post">
      
    <label for="subjectID">学科IDを入力してください</label>
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