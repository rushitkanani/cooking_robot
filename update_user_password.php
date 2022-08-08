<?php
require_once('connection.php');
echo "connection";
    $user_id = $_SESSION['userId'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if($old_password == "" || $new_password == "" || $confirm_password == ""){
    echo '<script type="text/JavaScript"> 
     confirm("Password field cannot be empty");
     window.location.href = "user_profile.php";
     </script>';
     
    }
    
    else{
$query = "SELECT * FROM users_table where user_id =".$user_id;
$query = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($query);

if($result['pass_word']== $old_password && $new_password == $confirm_password ) {
    $sql = "UPDATE users_table SET pass_word=\"".$new_password. "\"WHERE user_id =" .$user_id;
    $q = mysqli_query($conn, $sql) or die("Error in Query"); 
    echo '<script type="text/JavaScript"> 
    confirm("Password Updated");
    window.location.href = "user_profile.php";
    </script>';
}
else if($result['pass_word']!=$old_password ||$new_password != $confirm_password ) {
    echo '<script type="text/JavaScript"> 
    confirm("Password Error");
    window.location.href = "user_profile.php";
    </script>';
   
}

}


?>