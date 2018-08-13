<!-- auth.php -->
<?php
$id = $_POST['user_id'];
$passwd = $_POST['user_password'];
$sql = "SELECT COUNT(*) FROM Users WHERE UserID = '$id' AND Password = '$passwd'";  // SQL process
echo $sql;
?>