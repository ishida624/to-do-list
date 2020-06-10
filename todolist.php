<html>
<head>
	<title>TO DO LIST</title>
</head>
<body>
	<meta charset="utf-8">
	<?php
    include __DIR__ . '/app/Pdo_start.php';
    include __DIR__ . '/app/models/todolist_model.php';
    include __DIR__ . '/app/models/admin_model.php';
    session_start();
    use lib\getRemoteIPAddress;

    $get_ip = new getRemoteIPAddress;
    $ip = $get_ip->getRemoteIPAddress();
    if (isset($_SESSION['member'])) {
        $user = $_SESSION['member'];
        $admin = Admin::where('admin', $user)->get();
        foreach ($admin as $value) {
            if ($value['user_info'] != $ip) {
                unset($_SESSION["member"]);
                header("Location:todolist.php");
            }
        }
    }

        if (isset($_SESSION["member"])) {
            echo "使用者：".$_SESSION["member"]."<br>";
            echo "<a href=session.test.php?logout=ture>登出</a>";
        } else {
            echo "<a href=session.test.php>登入</a><br>";
            echo "<a href=join.php>註冊</a><br>";
        }?>
	<form action="add.php" method="get" >
		<input type = "text" name="item" placeholder="輸入項目">
		<br>
		<input type="hidden" name="action" value="add">
		<input type="submit" value="新增" >
		<input type="reset">
		<br>
		</form>


<form action=" " method="get" >
<table  width= "700" border="1" >

<?php
header("Connect-Type:text/html ; charset = utf8");

        $i = 1;
        $read = T1::all();
        foreach ($read as $key => $value) {
            echo "<tr>";
            echo "<td>".	"<input type='radio' name='radio' value=".$value->no.">"."</td>";
            echo  "<td>$i</td>";
            echo  "<td>".$value->item."</td>";
            echo  "<td>".$value->status."</td>";
            echo  "<td>".$value->update_time."</td>";
            echo  "<td>".$value->update_user."</td>";
            echo  "</tr>";
            $i++;
        }
            ?>
 <input type="submit" value="修改" name="update">
 <input type="submit" value="刪除"  name="delete">
 <input type="submit" value="已完成/未完成"  name="complete">

</form>
</table>
</body>
</html>


<?php
if (isset($_GET['update']) == true || isset($_GET['delete']) == true || isset($_GET['complete']) == true) {
                if ($_GET['update'] == '修改') {
                    header("Location:update.php?radio=".$_GET['radio']."");
                }
                if ($_GET['delete'] == '刪除') {
                    header("Location:delete.php?radio=".$_GET['radio']."");
                }
                if ($_GET['complete'] == '已完成/未完成') {
                    header("Location:complete.php?radio=".$_GET['radio']."");
                }
            }
         function getRemoteIPAddress()
         {
             if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                 return $_SERVER['HTTP_CLIENT_IP'];
             } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                 return $_SERVER['HTTP_X_FORWARDED_FOR'];
             }
             return $_SERVER['REMOTE_ADDR'];
         }

 ?>
