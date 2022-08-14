<?php

require_once('connection.php');

$name = $_POST['receipe_name'];
$cooking_time = $_POST['cooking_time'];
$cooking_temp = $_POST['cooking_temp'];

$rec_photo = addslashes(file_get_contents($_FILES["rec_photo"]["tmp_name"]));
$person = 1;
$user_id = $_SESSION['userId'];

// $name = "hi";
// $cooking_time =  30;
// $cooking_temp = 30;

$calories = 0;

$q = mysqli_query($conn,"SELECT COUNT(*) FROM `recipes`");
$rec_id = mysqli_fetch_assoc($q)['COUNT(*)'] + 1;

echo $rec_id;

//===============================================
// Add the ingredient from temp to recipe table
//===============================================

$sql1 = "SELECT * FROM `tmp_receipe_ingrident` WHERE `user_id`= ".$user_id;
$q1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
while($row = mysqli_fetch_assoc($q1)){
    $ing_id = $row['ing_id'];
    $portion = $row['portion'];
        $calories = $calories + ($row['calories'] * $row['portion']);

    $sql2 = "INSERT INTO `recipe_ingredient`(`recipe_id`, `Ingredients_id`, `quantity`) VALUES ($rec_id, $ing_id, $portion)";
    $q2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    if($q2){
        echo "Inserted ".$ing_id."-".$portion;
    }
}
$sql3 = "DELETE FROM `tmp_receipe_ingrident` WHERE `user_id`=".$user_id;
$q3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
if($q3){
    echo "Deleted";
}



//==============================================
// Add recipe steps to recipe
//==============================================

$sql4 = "SELECT * FROM `tmp_receipe_steps` WHERE `user_id`= ".$user_id;
$q4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
$step_id=1;
while($row = mysqli_fetch_assoc($q4)){
    $desc = $row['Description'];
    // echo $desc;

    $sql5 = "INSERT INTO `recipe_step`(`recipe_id`, `step_id`, `description`) VALUES ($rec_id, $step_id, '$desc')";
    echo $sql5;
    $q5 = mysqli_query($conn,$sql5) or die(mysqli_error($conn));
    if($q5){
        echo "Inserted ".$step_id;
    }
    $step_id = $step_id + 1;
}
$sql6 = "DELETE FROM `tmp_receipe_steps` WHERE `user_id`=".$user_id;
$q6 = mysqli_query($conn,$sql6) or die(mysqli_error($conn));
if($q6){
    echo "Deleted Steps";
}



//======================================
//Add utensil to recipe
//======================================

$sql7 = "SELECT * FROM `tmp_receipe_utensil` WHERE `user_id`= ".$user_id;
$q7 = mysqli_query($conn,$sql7) or die(mysqli_error($conn));
while($row = mysqli_fetch_assoc($q7)){
    $utensil_id = $row['utensil_id'];

    $sql8 = "INSERT INTO `recipe_utensil`(`recipe_id`, `utensil_id`) VALUES ($rec_id, $utensil_id)";
    $q8 = mysqli_query($conn, $sql8) or die(mysqli_error($conn));
    if($q8){
        echo "Inserted ".$utensil_id;
    }
}
$sql9 = "DELETE FROM `tmp_receipe_utensil` WHERE `user_id`= ".$user_id;
$q9 = mysqli_query($conn, $sql9) or die(mysqli_error($conn));
if($q9){
    echo "Deleted Utensil";
}

//====================================
//    Add recipe details
//====================================

$sql10 = "INSERT INTO `recipes`(`recipe_id`, `recipe_name`, `Cooking Time`, `Cooking Temperature`, `Calories`, `user_id`, `recipe_photo`) 
VALUES ($rec_id,'$name',$cooking_time,$cooking_temp,$calories,$user_id,'$rec_photo')";
$q10 = mysqli_query($conn, $sql10) or die("Error in 10");

if($q10){
    echo "Recipe Added";
}

//=================================
//    Add default ratings
//==============================

$sql11 = "INSERT INTO `rating_table`(`user_id`, `recipe_id`, `user_message`, `user_rating`) 
         VALUES (0,$rec_id,'Goodies',5)";
$q11 = mysqli_query($conn, $sql11) or die("Error in 11");
if($q11){
    echo "Added Rating!!!";
}

if($q10 && $q11){
    echo '<script type="text/javascript">';
    echo '<alert("Somethingn went wrong")';
    echo '</script>';
    header('Location:homepage.php');
}else{
    echo '<script type="text/javascript">';
    echo '<alert("Somethingn went wrong!!!")';
    echo '</script>';
    header('location:homepage.php');
}

?>
