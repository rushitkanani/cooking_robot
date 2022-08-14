<?php

require_once('load_recipes.php');
require_once ('connection.php');

$search = $_POST['search'];
$select = $_POST['select'];
$id = 0;
$result = array(); 

if(isset($_SESSION['userId'])){
    $query = "select * from recipes WHERE `user_id`= ".$id." OR `user_id` = ".$_SESSION['userId'];
    $queryy = mysqli_query($conn,$query);
    
    while ($row = mysqli_fetch_assoc($queryy)) {
        array_push($result,$row);
    }
} else {
    $query = "select * from recipes where `user_id`= ".$id;
    $queryy = mysqli_query($conn,$query) or die($query);
    
    while ($row = mysqli_fetch_assoc($queryy)) {
        array_push($result,$row);
    }
}

display_recipe($result, $conn);
?>