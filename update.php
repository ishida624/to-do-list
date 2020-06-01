<?php
include("vendor/autoload.php");
include("lib/pdo-config.php");
use Pdocon\Pdocon;

$db_link = new Pdocon($servername, $username, $password, $dbname);
if (isset($_GET["action"])=="add") {
    $sql_query = "update t1 set no=?,item=? where no=?";
    $stmt = $db_link ->db_link-> prepare($sql_query);

    $stmt -> execute(array($_GET["no"],$_GET["item"],$_GET["no"]));

    header("Location:todolist.php");
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
