<?php
    require_once('connection.php');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_id = $_SESSION['userId'];

    $sql = "UPDATE `users_table` SET `first_name`='".$first_name."',`last_name`='".$last_name."' WHERE `user_id` = ".$user_id;
    $q = mysqli_query($conn, $sql) or die("Error in Query");

    if($q==1){
        $_SESSION['name'] = $first_name;
        $response['response'] = "success";
    }else{
        $response['response'] = "error";
    }

    echo json_encode($response);

?>