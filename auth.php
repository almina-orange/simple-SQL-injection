<?php
/*
Program:
    authentify with database.
*/

/*** Connect by PHP Data Object (PDO) ***/
$url = parse_url(getenv('DATABASE_URL'));  // using heroku env

try {
    $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
    $dbh = new PDO($dsn, $url['user'], $url['pass']);  // connect using PDO
    foreach($dbh->query('SELECT * from sample') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error: " . $e->getMessage() . "<br/>";
    die();
}

// $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
// $dbh = new PDO($dsn, $url['user'], $url['pass']);  // connect using PDO

// /*** Process on database ***/
// $id = $_POST['user_id'];
// $passwd = $_POST['user_password'];

// // $sql = "SELECT * FROM sample WHERE id = '$id' AND password = '$passwd'";  // make query
// $sql = "SELECT * FROM sample";

// $stmt = $dbh->query($sql);
// while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     print($result['id']);
//     print($result['name']);
//     print($result['age']);
//     print($result['password']);
// }

// /*** Disconnect ***/
// $dbh = null;
?>