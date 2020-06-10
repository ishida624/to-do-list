<?php
session_start();
include __DIR__ . '/app/Pdo_start.php';
include __DIR__ . '/app/models/admin_model.php';

use lib\getRemoteIPAddress;

$get_ip = new getRemoteIPAddress;
$ip = $get_ip->getRemoteIPAddress();

if (!isset($_SESSION["member"]) || ($_SESSION["member"] == "")) {
    if (isset($_POST["username"]) && isset($_POST["passwd"])) {
        $admin = Admin::whereRaw('admin' and  'password')->get();
        foreach ($admin as $value) {
            if ($_POST["username"] == $value['admin']) {
                if (password_verify($_POST["passwd"], $value['password'])) {
                    $_SESSION["member"] = $_POST["username"];
                    $user_info = Admin::where('admin', $_SESSION["member"])->update(['user_info'=>$ip]);
                }
            }
        }
    }
}

if (isset($_GET["logout"]) && $_GET["logout"]==true) {
    unset($_SESSION["member"]);
    header("Location: todolist.php");
}
 ?>

 <html>
 <head>
   <meta http-http-equiv="Connect-type" content="text/html" ; charset="utf-8" />
 <title>會員登入系統</title>
 </head>
 <body>
   <?php
   if (!isset($_SESSION["member"]) || $_SESSION["member"] == "") {
       ?>
       會員登入     <a href=todolist.php>回主頁  </a>
      <a href=join.php>註冊</a><br>
  <form  action="" method="post">
    <input type="text" name="username" placeholder="輸入帳號"><br>
    <input type="password" name="passwd" placeholder="輸入密碼"><br>
    <input type="submit" value="登入" >
  </form>

  <?php
   } else {
       //echo "登入成功<br>";
       header("Location: todolist.php");
   }
   ?>
 </body>
 </html>
