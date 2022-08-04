<?php
 require_once('connection.php');
 
$firstName= $_POST['first_name'];
$lastName  = $_POST["last_name"];
$email = $_POST["email"];
$pass_wordd = $_POST["pass_word"];

$check="SELECT * FROM users_table WHERE email = '$email'";
$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result)>0)
{
  $_SESSION['error'] = "Error";
  header("Location:register.php");
echo "error";
}

else{
$sql = "INSERT INTO users_table (email, first_name, last_name,pass_word) VALUES ('$email','$firstName', '$lastName', '$pass_wordd')";
$res = mysqli_query($conn,$sql);  
if($res){
echo "<script>confirm('Account Created Successfully');
window.location.assign('login.php');
</script>";
}

}

?>
