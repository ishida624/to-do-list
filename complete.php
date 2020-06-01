<?php
include("vendor/autoload.php");
include("lib/pdo-config.php");
use Pdocon\Pdocon;

$db_link = new Pdocon($servername, $username, $password, $dbname);
$sql_complete_no = "select * from t1 where no=? ";
$result = $db_link ->db_link-> prepare($sql_complete_no);
$result -> execute(array($_GET["radio"]));

while ($status = $result->fetch()) {
    $sql_query = "update t1 set status=? where no=?";
    $stmt = $db_link ->db_link-> prepare($sql_query);
    if ($status['status'] == '未完成') {
        $stmt -> execute(array('已完成',$_GET["radio"]));
    } else {
        $stmt -> execute(array('未完成',$_GET["radio"]));
    }
}
 header("Location:todolist.php");
