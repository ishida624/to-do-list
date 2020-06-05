<?php
session_start();
include("vendor/autoload.php");
include("lib/pdo-config.php");
use lib\Pdocon;

$db_link = new Pdocon($servername, $username, $password, $dbname);
if (isset($_POST['click'])) {
    $sql_query = "select admin from admin";
    $admin = $db_link->db_link->query($sql_query);
    $same_admin = boolval(1);
    foreach ($admin->fetchAll(PDO::FETCH_ASSOC) as $value) {
        //var_dump($value);
        if ($_POST['username'] == $value['admin']) {
            $same_admin = 1;
            break;
        } else {
            $same_admin = 0;
        }
    }
    if ($same_admin == 0) {
        if (preg_match("/[0-9a-zA-Z]{8}/", $_POST['passwd'])) {
            if ($_POST['passwd'] == $_POST['checkpasswd']) {
                $hash = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
                $sql_query = "insert into admin (admin,password) value(?,?)";
                $stmt = $db_link->db_link->prepare($sql_query);
                $stmt-> execute(array($_POST['username'],$hash));
                echo "註冊成功!<br>";
            }
        } else {
            echo "密碼至少8位元<br>";
        }
    } else {
        echo "此帳號已存在!<br>";
    }
}
?>
<html>
<head>
  <meta http-http-equiv="Connect-type" content="text/html" ; charset="utf-8" />
<title>會員註冊系統</title>
</head>
<body>
      會員註冊     <a href=todolist.php>回主頁</a><br>
 <form  action="" method="post">
   <input type="text" name="username" placeholder="輸入帳號"><br>
   <input type="password" name="passwd" placeholder="輸入密碼"><br>
   <input type="password" name="checkpasswd" placeholder="確認密碼"><br>
   <input type="hidden" value="click" name="click" >
   <input type="submit" value="註冊" >
 </form>
</body>
</html>
