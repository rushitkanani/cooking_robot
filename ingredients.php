<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ingredients</title>
</head>
<body>
<form form method="post" action="add_ingredients.php" enctype="multipart/form-data" id="myform">
    <label for = "ing_name">Ingredient Name</label>
    <input type="text" id="ingrident_name" name="ingrident_name"  required><br>
    <label for = "cooking_time">Cooking Time</labelTime</label>
    <input type="text" id="cooking_time" name="cooking_time"  required ><br>
    <label for = "cooking_temp">Cooking Temperature</labelTime</label>
    <input type="text" id="cooking_temp" name="cooking_temp" required ><br>
    <label for = "calories">Calories</label>
    <input type="text" id="calories" name="calories" required ><br>
    <label for = "file">Uplaoad Image</label>
    <input input type="file" id="image" name="image" accept="image/*"/><br>
    <input type="submit"  value="Add Ingredients" id="upload" name="upload">
   
</form>

<form form method="post"  >
    <label for = "utensil">Utensil Name</label>
    <input type="text" id="utensil" name="utensil"  required><br>
    <input type="button" id="add_utensil" name="add_utensil" value="Add Utensil">
</form>


<script src="ajax.js"></script>
<script type = "text/javascript">
  console.log("hello")
  $(function () {

    $('#add_utensil').click(function () {
        console.log("clicked!!");
        var utensil  = $('#utensil').val();
        $.ajax({
          type: 'post',
          url: 'add_utensil.php',
          dataType: 'json',
          data: {
            "utensil" : utensil,
          },
          success: function (response) {
            console.log(response);
            
          }
        })
      })
      });

</script>
</body>
</html>


