<html>
<head>
	<title>TO DO LIST</title>
</head>
<body>
	<meta charset="utf-8">

	<form action="add.php" method="get" >
		<input type = "text" name="item" placeholder="輸入項目">
		<br>
		<input type="hidden" name="action" value="add">
		<input type="submit" value="新增" >
		<input type="reset">
		<br>
		</form>


<form action=" " method="get" >
<table  width= "300" border="1" >

<?php
header("Connect-Type:text/html ; charset = utf8");
//include("pdo-test.php");
//include("lib/Pdocon.php");
include("vendor/autoload.php");
include("lib/pdo-config.php");
use Pdocon\Pdocon;

$db_link = new Pdocon($servername, $username, $password, $dbname);

$sql_query = "select * from t1 order by no ASC";
$result =$db_link->db_link->query($sql_query);

$i = 1;
while ($row_result = $result ->fetch(PDO::FETCH_ASSOC)) {
    //$row_result = $result->fetch(PDO::FETCH_ASSOC);
    //	foreach ($row_result as  $key=>$value) {
    echo "<tr>";
    echo "<td>".	"<input type='radio' name='radio' value=".$row_result['no'].">"."</td>";
    //echo  "<td>".$row_result['no']."</td>";
    echo  "<td>$i</td>";
    echo  "<td>".$row_result['item']."</td>";
    echo  "<td>".$row_result['status']."</td>";
    //echo  "<td>"."<a href = 'update.php?no=".$row_result['no']."'> 修改</a>"."</td>";
    //echo  "<td>"."<a href = 'delete.php?no=".$row_result['no']."'> 刪除</a>"."</td>";
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
 ?>
