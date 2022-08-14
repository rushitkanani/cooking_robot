<?php
require_once('connection.php');
if (isset($_POST["emailPhp"])){
    $email_id = $_POST["emailPhp"];
    $pass_word = $_POST["passwordPhp"];
    $sql = "select * from users_table where `email` = '$email_id' and `pass_word` = '$pass_word'limit 1";
    $result = mysqli_query($conn, $sql);
    
    if( mysqli_num_rows($result) > 0){
        $_SESSION['login'] = 'true';
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['first_name'];
        $_SESSION['userId'] = $row['user_id'];
        $response['result']='success';
    }
    else{
        $response['result']='error';
    }
}else{
    $response['result']='connection error';
}
echo json_encode($response);
?>
