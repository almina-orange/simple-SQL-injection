<?php
/*
Program:
    authentify with database.
*/

/*** Connect by PHP Data Object (PDO) ***/
$url = parse_url(getenv('DATABASE_URL'));  // using heroku env

// try {
//     $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
//     foreach($dbh->query('SELECT * from FOO') as $row) {
//         print_r($row);
//     }
//     $dbh = null;
// } catch (PDOException $e) {
//     print "エラー!: " . $e->getMessage() . "<br/>";
//     die();
// }

$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
$dbh = new PDO($dsn, $url['user'], $url['pass']);  // connect using PDO
var_dump($pdo->getAttribute(PDO::ATTR_SERVER_VERSION));

// /*** Process on database ***/
// $id = $_POST['user_id'];
// $passwd = $_POST['user_password'];

// // $sql = "SELECT * FROM sample WHERE id = '$id' AND password = '$passwd'";  // make query
// $sql = "SELECT * FROM sample";
// var_dump($sql);

// // $stmt = $dbh->query($sql);
// // var_dump($stmt);

// // $result = $stmt->fetch(PDO::FETCH_ASSOC);
// // print($result['id']);
// // print($result['name']);

// /*** Disconnect ***/
// $dbh = null;
?>