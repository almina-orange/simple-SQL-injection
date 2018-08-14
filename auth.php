<?php
/* authentify program */

$url = parse_url('postgres://mhlygpzzpamohg:e82927c4b3980cb3f000dd85ce8339dcb228a04840d7e70dbdcd37460a4692ba@ec2-54-235-94-36.compute-1.amazonaws.com:5432/d2vsbffa5cjkio');

echo "> url parameters :\n";
echo $url['host'], "\n";
echo substr($url['path'], 1), "\n";
echo $url['user'], "\n";
echo $url['pass'], "\n";

echo "> connection parameters :\n";
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
echo $dsn, "\n";

echo "> connecting :\n";
$pdo = new PDO($dsn, $url['user'], $url['pass']);
var_dump($pdo->getAttribute(PDO::ATTR_SERVER_VERSION));

// // connect
// $link = pg_connect("host=localhost dbname=db user=usr password=pass");
// if (!$link) {
//     die('Connection failed.'.pg_last_error());
// }

// $id = $_POST['user_id'];
// $passwd = $_POST['user_password'];

// // make query
// // $sql = "SELECT COUNT(*) FROM Users WHERE id = '$id' AND password = '$passwd'";
// $sql = "SELECT * FROM Users WHERE id = '$id' AND password = '$passwd'";
// echo $sql;

// // disconnect
// pg_close($link);
// if ($close_flag){
//     print('Disconnection succeeded.<br>');
// }
?>