<?php
include("vendor/autoload.php");
include("lib/pdo-config.php");
use lib\Pdocon;

session_start();
if (isset($_SESSION['member'])) {
    $db_link = new Pdocon($servername, $username, $password, $dbname);
    $sql_complete_no = "select * from t1 where no=? ";
    $result = $db_link ->db_link-> prepare($sql_complete_no);
    $result -> execute(array($_GET["radio"]));

    while ($status = $result->fetch()) {
        $sql_query = "update t1 set status=?,update_user=? where no=?";
        $stmt = $db_link ->db_link-> prepare($sql_query);
        if ($status['status'] == '未完成') {
            $stmt -> execute(array('已完成',$_SESSION['member'],$_GET["radio"]));
        } else {
            $stmt -> execute(array('未完成',$_SESSION['member'],$_GET["radio"]));
        }
    }
    header("Location:todolist.php");
} else {
    echo "請先登<br>";
    echo "<a href=session.test.php>登入</a><br>";
}
