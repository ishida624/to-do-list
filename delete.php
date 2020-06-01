<?php
include("vendor/autoload.php");
include("lib/pdo-config.php");
use Pdocon\Pdocon;

$db_link = new Pdocon($servername, $username, $password, $dbname);

if (isset($_GET["action"])=="add") {
    $sql_query = "delete from t1  where no=?";
    $stmt = $db_link ->db_link-> prepare($sql_query);

    //$stmt -> bind_param("is",$_GET["no"],$_GET["item"]);
    $stmt -> execute(array($_GET["no"]));
    //$stmt ->close();
    //$db_link -> close();
    header("Location:todolist.php");
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
