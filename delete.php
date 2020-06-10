<?php
include __DIR__ . '/app/Pdo_start.php';
include __DIR__ . '/app/models/todolist_model.php';

session_start();
if (isset($_SESSION['member'])) {
    if (isset($_GET["action"])=="add") {
        $delete = T1::find($_GET["no"]);
        $delete->delete();
        header("Location:todolist.php");
    }
} else {
    echo "請先登<br>";
    echo "<a href=session.test.php>登入</a><br>";
}
?>
<html>
<head>
  <meta http-http-equiv="Connect-type" content="text/html" ; charset="utf-8" />
<title>刪除資料</title>
</head>
<body>
  <a href="todolist.php">回主畫面</a>
  <form action="" method="get" >
    <br>
    <input type = "hidden" name="no" value="<?php echo $_GET['radio'];?>" >
    <input type="hidden" name="action" value="add">
    <input type="submit" value="確定刪除">
    </form>
</body>
</html>
