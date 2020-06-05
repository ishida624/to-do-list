<?php
include("vendor/autoload.php");
include("lib/pdo-config.php");
use lib\Pdocon;

// $db_link = new Pdocon($servername, $username, $password, $dbname);
// $ip = getRemoteIPAddress();
// //$s = rand(0, 100);
// $sql_query = "update admin set user_info=? where admin= 'admin'";
// $user_info = $db_link->db_link->prepare($sql_query);
// $user_info->execute(array("$ip"));
//
// function getRemoteIPAddress()
// {
//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         return $_SERVER['HTTP_CLIENT_IP'];
//     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         return $_SERVER['HTTP_X_FORWARDED_FOR'];
//     }
//     return $_SERVER['REMOTE_ADD'];
// if (preg_match("/[0-9a-zA-Z]{8}/", $password)) {
//     echo "hello";
// } else {
//     echo "false";
// }
echo date("Y-m-d H:i:s");
//}
