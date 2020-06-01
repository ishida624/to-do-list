<?php
include("vendor/autoload.php");
include("lib/pdo-config.php");
use Pdocon\Pdocon;

$db_link = new Pdocon($servername, $username, $password, $dbname);

if (isset($_GET["action"])=="add") {
    // include("pdo-test.php");
    $sql_add_no = "select no from t1 order by no desc limit 1 ";

    $result = $db_link ->db_link-> query($sql_add_no);

    while ($row_result = $result ->fetch()) {
        $n = $row_result["no"]+1;
        //echo  "現在有".$n."筆資料";
//echo "<br>";
    }


    $sql_query = "insert into t1 (no,item,status) values(?,?,?)";
    $stmt = $db_link ->db_link->prepare($sql_query);

    $stmt -> execute(array($n,$_GET["item"],'未完成'));
    header("Location:todolist.php");
}
