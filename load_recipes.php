
<link rel="stylesheet" href="css/grid.css">


<?php

function display_recipe($recipe_id_array, $conn){
    for($x = 0; $x < count($recipe_id_array);$x++) {
      $row = $recipe_id_array[$x];
      $recipe_id = $row['recipe_id'];
      $temp= "SELECT ri.ingredients_id, ingredient_name FROM recipe_ingredient ri inner join ingredient_table it on it.ing_id = ri.ingredients_id WHERE ri.recipe_id = ".$recipe_id;
      $tempp = mysqli_query($conn,$temp);
      
      echo "<div class='col-lg-4 col-md-2'>";
        echo"<div class='card-recipe m-2'>";
        echo "<div class='card-body'  font-family: 'sans-serif;'>";
        echo "<img class='card-img-top img1' src='data:image; base64,".base64_encode($row['recipe_photo'])."' alt='img01'>";
          echo "<h5 class='card-title mg-t-20'>".$row['recipe_name']."</h5>";
          echo "<p class='card-text'>".'COOKING TIME:'." ".$row['Cooking Time']." ".'MIN'."</p>";
          echo "<p class='card-text'>".'CALORIES: '." ".$row['Calories']."</p>";
          echo "<p class='card-text'>INGRIDIENTS: ";
          while($roww = mysqli_fetch_assoc($tempp)){
            echo "".$roww['ingredient_name'].",";
          
          }
          echo "</p >";
          echo "<div style='text-align:center'>";
          echo "<a href='recipes.php?id=".$recipe_id."' class='btn btn-primary bg-dark' style='padding: 10px 18px; font-size: 10px;'>Load Recipe</a>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
      echo "</div>";
    }
  
  }
  
?>
