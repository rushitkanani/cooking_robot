<?php
require_once('connection.php');
$user_id = $_SESSION['userId'];

//$sq="SELECT * FROM `users_table` WHERE user_id=1";
$sql = "SELECT * FROM users_table WHERE user_id = ".$user_id;

$q = mysqli_query($conn, $sql) or die("error in sql");

$row = mysqli_fetch_assoc($q);
$response['first_name'] = $row['first_name'];
$response['last_name'] = $row['last_name'];
$response['email'] = $row['email'];
$response['response'] = 'success';

echo json_encode($response);
?>
