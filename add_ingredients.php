<?php 
require_once('connection.php');
if(isset($_POST['upload']))
{
    if($_FILES['image']['size'] > 50000000){
        echo "large IMAGE";
    }
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $ingrident_name = strtoupper($_POST['ingrident_name']);
    $cooking_time = $_POST['cooking_time'];
    $cooking_temp = $_POST['cooking_temp'];
    $calories = $_POST['calories'];

    $sql = "SELECT * FROM `ingredient_table` WHERE `ingredient_name`='$ingrident_name'";
    $res = mysqli_query($conn, $sql) or die("Error in SQL");
    if(mysqli_num_rows($res) == 0){
        $query = "INSERT INTO 
        `ingredient_table`(`ingredient_name`,`ingredient_calories`,`ingredient_time`,`ingredient_temperature`,`ingredient_photo`) 
        values('$ingrident_name','$calories','$cooking_time','$cooking_temp','$file')";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo "<script> confirm('Ingredient Added Successfully');
            window.location.assign('ingredients.php');
            </script>";    
        }
        else{
            echo "<script> confirm('Something went wrong!!!');
            window.location.assign('ingredients.php');
            </script>";
        }
    }else{
        echo "<script> confirm('IngredientAlready Exists!!!');
            window.location.assign('ingredients.php');
            </script>";
    }

}
?>

