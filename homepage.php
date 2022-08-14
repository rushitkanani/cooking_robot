<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking Robot</title>
    <link rel="stylesheet" href="css/grids.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body><!DOCTYPE html>
<html lang="en">

<?php
require_once('connection.php');
require_once('load_recipes.php');
if(!isset($_SESSION['login'])){
    require_once('header_1.php');
}
else{
    require_once('header.php');
}

?>
    <main>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="center-text">
      <div class="carousel-inner">
        <div class="item active">
          <img src="https://vistapointe.net/images/stake-13.jpg" style="width: 100%; height: 700px;">
        </div>

        <div class="item">
          <img src="https://wallpapercave.com/wp/wp7846006.jpg" alt="Chicago" style="width: 100%; height: 700px;">
        </div>

        <div class="item">
          <img
            src="https://images.creativemarket.com/0.1.0/ps/5829524/1820/1213/m1/fpnw/wm1/awu82uoqwx3lgrsj2omlbzhzouszk713n45h7c4cpor2my2zlpqyb34pt2ogzhep-.jpg?1549379772&s=beb2804ea962fb49e6242654b23c6cd5"
            alt="New york" style="width: 100%; height: 700px;">
        </div>


      </div>
      <div class="centerrr">Lets Learn and Cook Together</div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



<h2 class="tx-gray-800 tx-uppercase tx-bold m-4 tx-center">Recipes</h2>

<div class="search-bar-align">

<label style="text-align: center; font-size: 16px;"> Search By: </label>  

<select id = "select" style="font-size: 16px;">  
<option value = "recipe_name" > Recipe Name   
</option>
<option value = "ingredient" > Ingredients  
</option>  
<option value = "cooking_time" > Cooking Time   
</option>  
<option value = "calories" > Calories  
</option>    
</select>
  
<input class="search-bar" type="search" id="search" name="search" placeholder="Search here" style="font-size: 15px; text-align: center">
</div>

</div>
<div class="row"  font = "Sans-serif">
<div id="receipe_content">   
</div>
</div>


<script src="ajax.js"></script>
<script type = "text/javascript">
  console.log("hello")
  $(function () {

    $(document).ready(function () {
      $('#receipe_content').html("");
      $.ajax({
        type: 'POST',
        url: 'load_default_receipe.php',
        data: {
          "search" : "",
          "select": "recipe_name",
        },
        success: function(response){
          $("#receipe_content").html(response);
        },
      })
    });

    $('#search').change(function () {
        console.log("clicked!!");
        var search = $('#search').val();
        var select = $('#select').val();
        $('#receipe_content').html("");

        console.log(search);
        console.log(select)
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
            "search" : search,
            "select" : select
          },
          success: function (response) {
            console.log("assllllll")
            console.log("response", response)
            $("#receipe_content").html(response);
          },
          error: function(xhr, status, error){
            console.log("asassd0;")
            xhr.then((arg)=>{
              console.log(arg)
            })
            console.log(xhr)
          }
        })
      })
      });
</script>
</body>
</html>
    
