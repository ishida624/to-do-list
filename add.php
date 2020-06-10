<?php
include __DIR__ . '/app/Pdo_start.php';
include __DIR__ . '/app/models/todolist_model.php';

session_start();
if (isset($_SESSION['member'])) {
    $add = new T1(['item'=>$_GET["item"],'status'=>'未完成','update_user'=>$_SESSION['member']]);
    $add->save();
    header("Location:todolist.php");
} else {
    echo "請先登<br>";
    echo "<a href=session.test.php>登入</a><br>";
}
