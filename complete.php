<?php
// include("vendor/autoload.php");
// include("lib/pdo-config.php");
// use lib\Pdocon;
include __DIR__ . '/app/Pdo_start.php';
include __DIR__ . '/app/models/todolist_model.php';

session_start();
if (isset($_SESSION['member'])) {
    $complete = T1::find($_GET["radio"]);
    if ($complete->status == '未完成') {
        $complete->status = '已完成';
    } else {
        $complete->status = '未完成';
    }
    $complete->save();
    header("Location:todolist.php");
} else {
    echo "請先登<br>";
    echo "<a href=session.test.php>登入</a><br>";
}
