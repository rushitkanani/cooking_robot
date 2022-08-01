<?php
session_start();
$firstName= $_POST["first_name"];
$lastName  = $_POST["last_name"];
$email = $_POST["email"];
$pass_wordd = $_POST["pass_word"];

$host = "localhost";
$username = "root";
$password = "";
$dbname = "cooking_robot_db";


$conn = mysqli_connect($host,$username,$password,$dbname) or die("Couldn't connect to");
$check="SELECT * FROM users_table WHERE email = '$email'";
echo $check;
$result = mysqli_query($conn,$check);
if(mysqli_num_rows($result)>0)
{
  $_SESSION['error'] = "Error";
  header("Location:register.php");

}

else{
$sql = "INSERT INTO users_table VALUES ('$email','$firstName', '$lastName', '$pass_wordd')";
$res = mysqli_query($conn,$sql);
echo $res;
if($res)
  header("Location:login.php");
}
?>
