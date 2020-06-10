<?php
include __DIR__ . '/app/Pdo_start.php';
include __DIR__ . '/app/models/todolist_model.php';

session_start();
if (isset($_SESSION['member'])) {
    if (isset($_GET["action"])=="add") {
        T1::where('no', $_GET["no"])->update(['item'=>$_GET["item"],'update_user'=>$_SESSION['member']]);

        header("Location:todolist.php");
    }
} else {
    echo "請先登入<br>";
    echo "<a href=session.test.php>登入</a><br>";
}
?>
<html>
<head>
  <meta http-http-equiv="Connect-type" content="text/html" ; charset="utf-8" />
<title>修改資料</title>
</head>
<body>
  <a href="todolist.php">回主畫面</a>
  <form action="" method="get" >
    <input type="hidden" name="no" value="<?php echo $_GET['radio'];?>">

    <input type = "text" name="item" placeholder="輸入項目">
    <br>
    <input type="hidden" name="action" value="add">
    <input type="submit" value="修改">
    <input type="reset" ></form>
</body>
</html>
