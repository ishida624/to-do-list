<html>
<head>
	<title>TO DO LIST</title>
</head>
<body>
	<meta charset="utf-8">
	<?php
    session_start();
    include("vendor/autoload.php");
    include("lib/pdo-config.php");
    use lib\Pdocon;
    use lib\getRemoteIPAddress;

    $get_ip = new getRemoteIPAddress;
    $ip = $get_ip->getRemoteIPAddress();
    $db_link = new Pdocon($servername, $username, $password, $dbname);
    if (isset($_SESSION['member'])) {
        //echo $_SESSION['member'];
        $user = $_SESSION['member'];
        $sql_query = "select user_info from admin where admin='$user'";
        $admin = $db_link->db_link->query($sql_query);
        foreach ($admin-> fetchAll(PDO::FETCH_ASSOC) as $value) {
            if ($value["user_info"] != $ip) {
                echo "帳號已有其他裝置登入";
                unset($_SESSION["member"]);
                header("Location:todolist.php");
            }
        }
    }
        #$_SESSION['login_stauts'] = 0 沒有別的裝置登入	，1 為有其他裝置登入 ，2 訪客
        // if (!isset($_SESSION['login_stauts'])) {
        //     $_SESSION['login_stauts'] = 2;
        // }
        //echo $_SESSION['login_stauts'];
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
<!-- <?php
        // if ($_SESSION['login_stauts'] == 1) {
        //     echo "帳號已有其他裝置登入";
        //     $_SESSION["member"] = "";
        // }
        ?> -->

<form action=" " method="get" >
<table  width= "700" border="1" >

<?php
header("Connect-Type:text/html ; charset = utf8");

        // include("vendor/autoload.php");
        // include("lib/pdo-config.php");
        // use Pdocon\Pdocon;
//
         $db_link = new Pdocon($servername, $username, $password, $dbname);

        $sql_query = "select * from t1 order by no ASC";
        $result =$db_link->db_link->query($sql_query);

        $i = 1;
        while ($row_result = $result ->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".	"<input type='radio' name='radio' value=".$row_result['no'].">"."</td>";
            echo  "<td>$i</td>";
            echo  "<td>".$row_result['item']."</td>";
            echo  "<td>".$row_result['status']."</td>";
            echo  "<td>".$row_result['update_time']."</td>";
            echo  "<td>".$row_result['update_user']."</td>";
            echo  "</tr>";
            $i++;
        }
        // if (isset($_SESSION["member"])) {
            ?>
 <input type="submit" value="修改" name="update">
 <input type="submit" value="刪除"  name="delete">
 <input type="submit" value="已完成/未完成"  name="complete">
<!-- <?php
//}
?> -->
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
