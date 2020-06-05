<?php
session_start();
include("vendor/autoload.php");
include("lib/pdo-config.php");
use lib\Pdocon;
use lib\getRemoteIPAddress;

$get_ip = new getRemoteIPAddress;
$ip = $get_ip->getRemoteIPAddress();
//var_dump($ip);
$db_link = new Pdocon($servername, $username, $password, $dbname);

if (!isset($_SESSION["member"]) || ($_SESSION["member"] == "")) {
    //echo "hello";
    if (isset($_POST["username"]) && isset($_POST["passwd"])) {
        // echo "hello";
        $sql_query = "select admin,password,user_info from admin";
        $admin = $db_link->db_link->query($sql_query);

        foreach ($admin-> fetchAll(PDO::FETCH_ASSOC) as $value) {
            if ($_POST["username"] == $value['admin']) {
                if (password_verify($_POST["passwd"], $value['password'])) {
                    $_SESSION["member"] = $_POST["username"];
                    $sql_query = "update admin set user_info=? where admin=?";
                    $user_info = $db_link->db_link->prepare($sql_query);
                    $user_info->execute(array($ip,$_POST['username']));
                }
            }
        }
    }
}

if (isset($_GET["logout"]) && $_GET["logout"]==true) {
    unset($_SESSION["member"]);
    header("Location: todolist.php");
}
 // function getRemoteIPAddress()
 // {
 //     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
 //         return $_SERVER['HTTP_CLIENT_IP'];
 //     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
 //         return $_SERVER['HTTP_X_FORWARDED_FOR'];
 //     }
 //     return $_SERVER['REMOTE_ADDR'];
 // }
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
