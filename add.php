<?php
include("lib/pdo-config.php");
include("vendor/autoload.php");
use lib\Pdocon;

session_start();
if (isset($_SESSION['member'])) {
    $db_link = new Pdocon($servername, $username, $password, $dbname);

    if (isset($_GET["action"])=="add") {
        $sql_add_no = "select no from t1 order by no desc limit 1 ";

        $result = $db_link ->db_link-> query($sql_add_no);

        while ($row_result = $result ->fetch()) {
            $n = $row_result["no"]+1;
        }


        $sql_query = "insert into t1 (no,item,status,update_user) values(?,?,?,?)";
        $stmt = $db_link ->db_link->prepare($sql_query);

        $stmt -> execute(array($n,$_GET["item"],'未完成',$_SESSION['member']));
        header("Location:todolist.php");
    }
} else {
    echo "請先登<br>";
    echo "<a href=session.test.php>登入</a><br>";
}
