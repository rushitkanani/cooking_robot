<?php
require_once('function.php');
require_once ('connection.php');
if(isset($_POST['search'])){
$search = $_POST['search'];
$select = $_POST['select'];
$result = array(); 

$user = "";

if(isset($_SESSION['userId'])){
    $user = "`user_id`= 0 OR `user_id` = ".$_SESSION['userId'];
} else {
    $user = "`user_id`= 0";
}


if($search == ""){
   
     $query1 = "select * from recipes WHERE ".$user; 
    $q1 = mysqli_query($conn,$query1) or die();
    
    while ($row = mysqli_fetch_assoc($q1)) {
        array_push($result,$row);
    }

} else if($select == 'recipe_name'){
    $query2 = "select * from recipes where recipe_name like '%".$search."%' AND (".$user.")";
    $q2 = mysqli_query($conn,$query2);
    
    while ($row = mysqli_fetch_assoc($q2)) {
        array_push($result,$row);
    }
} else if($select == 'cooking_time'){
    $query3 = "select * from recipes where `Cooking Time` >=".$search." AND ".$user;
    $q3 = mysqli_query($conn,$query3) or die();
    
    while ($row = mysqli_fetch_assoc($q3)) {
        array_push($result,$row);
    }
} else if($select == 'calories'){
    $query4 = "select * from recipes where `Calories` >=" .$search." AND ".$user ;
    $q4 = mysqli_query($conn,$query4) or die();
    
    while ($row = mysqli_fetch_assoc($q4)) {
        array_push($result,$row);
    }
} else if($select == 'ingredient'){
   
    $query = "select * from recipes where ".$user;
    $queryy = mysqli_query($conn,$query) or die();

    while ($row = mysqli_fetch_assoc($queryy)) {
        $a = array(); 
        $recipe_id = $row['recipe_id'];
        $query5= "SELECT ri.ingredients_id, ingredient_name FROM recipe_ingredient ri inner join ingredient_table it on it.ing_id = ri.ingredients_id WHERE ri.recipe_id = ".$recipe_id;
        $q5 = mysqli_query($conn,$temp);
        $flag = false;
        while($roww = mysqli_fetch_assoc($q5)){
            array_push($a,strtolower($roww['ingredient_name']));
            if(stripos(strtolower($roww['ingredient_name']), $search) !== false){
                $flag = true;
            }
          }
        if ($flag == true){
            array_push($result,$row);
        }
    }
}




    display_recipe($result, $conn);
}
    
?>