<?php

require_once('connection.php');

if ($_POST['method_name'] == 'getCalories') {
    $ing_id = $_POST['ing_id'];
    $q = "SELECT `ingredient_calories` FROM `ingredient_table` WHERE `ing_id`= '$ing_id'";
    $r = mysqli_query($conn, $q);
    if ($r) {
        $response['status'] = "success";
        $row = mysqli_fetch_array($r);
        $response['data'] = $row['ingredient_calories'];
    } else {
        $response['status'] = "error";
    }
} else if ($_POST['method_name'] == 'add_ingredient') {
    $ing_id = $_POST['ing_id'];
    $calories = $_POST['calories'];
    $portion = $_POST['portion'];
    $user_id = $_POST['user_id'];
    $q1 = "SELECT * FROM `tmp_receipe_ingrident` WHERE ing_id = '$ing_id' AND user_id='$user_id'";
    $r1 = mysqli_query($conn, $q1);
    if (mysqli_num_rows($r1) > 0) {
        $response['status'] = "Failed";
    } else {
        $q = "INSERT INTO `tmp_receipe_ingrident`(`ing_id`, `calories`, `portion`, `user_id`) VALUES ('$ing_id','$calories','$portion','$user_id')";
        $r = mysqli_query($conn, $q);
        if ($r) {
            $response['status'] = "success";
        } else {
            $response['status'] = "error";
        }
    }
} else if ($_POST['method_name'] == 'remove_item') {
    $id = $_POST['id'];
    $q = "DELETE FROM `tmp_receipe_ingrident` WHERE id='$id'";
    $r = mysqli_query($conn, $q);
    if ($r) {
        $response['status'] = "success";
    } else {
        $response['status'] = "error";
    }
} else if($_POST['method_name'] == 'add_utensil'){
    $ute_id = $_POST['utensil_id'];
    $user_id = $_POST['user_id'];

    $sql1 = "SELECT * FROM `tmp_receipe_utensil` WHERE `utensil_id` = '$ute_id' AND `user_id`= '$user_id'";
    $q1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($q1) > 0){
        $response['status'] = 'Failed';
    }else{
        $q = mysqli_query($conn, "INSERT INTO `tmp_receipe_utensil`(`utensil_id`, `user_id`) VALUES ('$ute_id','$user_id')");
        if($q){
            $response['status'] = "success";
        }else{
            $response['status'] = "error";
        }
    }
    
} else if ($_POST['method_name'] == 'remove_utensil') {
    $id = $_POST['id'];
    $q = "DELETE FROM `tmp_receipe_utensil` WHERE id='$id'";
    $r = mysqli_query($conn, $q);
    if ($r) {
        $response['status'] = "success";
    } else {
        $response['status'] = "error";
    }

} else if($_POST['method_name'] == 'add_steps'){
    $step = $_POST['rec_step'];
    $id = $_POST['user_id'];
    $q = mysqli_query($conn, "INSERT INTO `tmp_receipe_steps`( `user_id`, `Description`) VALUES ('$id','$step')");
    if($q){
        $response['status'] = "success";
    }else{
        $response['status'] = "error";
    }
} else if ($_POST['method_name'] == 'remove_step') {
    $id = $_POST['id'];
    $q = "DELETE FROM `tmp_receipe_steps` WHERE id='$id'";
    $r = mysqli_query($conn, $q);
    if ($r) {
        $response['status'] = "success";
    } else {
        $response['status'] = "error";
    }
}

echo json_encode($response);
