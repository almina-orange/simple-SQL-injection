<!-- auth.php -->
<?php
$id = $_POST['user_id'];
$passwd = $_POST['user_password'];

// make query
// $sql = "SELECT COUNT(*) FROM Users WHERE id = '$id' AND password = '$passwd'";
$sql = "SELECT * FROM Users WHERE id = '$id' AND password = '$passwd'";
echo $sql;
?>