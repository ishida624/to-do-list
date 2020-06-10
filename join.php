<?php
session_start();
include __DIR__ . '/app/Pdo_start.php';
include __DIR__ . '/app/models/admin_model.php';
if (isset($_POST['click'])) {
    $admin = Admin::select('admin')->get();
    $same_admin = boolval(1);                                                       #$same_admin=1 是帳號相同 , 0 為不同
    foreach ($admin as $value) {
        if ($_POST['username'] == $value['admin']) {
            $same_admin = 1;
            break;
        } else {
            $same_admin = 0;
        }
    }
    if ($same_admin == 0) {
        if (preg_match("/[0-9a-zA-Z]{8}/", $_POST['passwd'])) {                         #輸入的密碼要為八位元數字英文
            if ($_POST['passwd'] == $_POST['checkpasswd']) {                               #密碼輸入兩次是一樣的
                $hash = password_hash($_POST['passwd'], PASSWORD_DEFAULT);      #密碼加密
                $admin = Admin::create(['admin'=>$_POST['username'],'password'=>$hash]);
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
