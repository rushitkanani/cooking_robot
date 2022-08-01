<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking Robot</title>
    <link rel="stylesheet" href="css/grids.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body><!DOCTYPE html>
<html lang="en">

<?php
require_once('connection.php');
if(!isset($_SESSION['login'])){
    require_once('header_1.php');
}
else{
    require_once('header.php');
}

?>
    <main>
        <section class="grid grid1">
            <h2 class="center">Let's Cook Delicious Food Together</h2>
            <div class="container"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="https://wallpapercave.com/wp/wp3724325.jpg" style="width: 750px; height: 480px;">
      </div>

      <div class="item">
        <img src="https://wallpapercave.com/wp/wp7846006.jpg" alt="Chicago" style="width: 750px; height: 480px;" >
      </div>
    
      <div class="item">
        <img src="https://images.creativemarket.com/0.1.0/ps/5829524/1820/1213/m1/fpnw/wm1/awu82uoqwx3lgrsj2omlbzhzouszk713n45h7c4cpor2my2zlpqyb34pt2ogzhep-.jpg?1549379772&s=beb2804ea962fb49e6242654b23c6cd5" alt="New york"  style="width: 750px; height: 480px;" >
      </div>

      
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
</div>

</body>
</html>

        </section>
        <section class="grid grid2 fullImage">    
        </section>
       <h2 align ="center">Recipe List</h2>
       <div class="container">
        <input type="text" placeholder="Search..">
        </div>
        </div>
       <?php $query = "SELECT * FROM recipes ";
       $query = mysqli_query($conn,$query); 
    
       
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Recipe Number</th>";
            echo "<th>Recipe Name</th>";
            echo "<th>Cooking Time </th>";
            echo "<th>View</th>";
            echo "</tr>";
            echo "</thead>";
            
            while($row = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "</tr>";
          }
            echo "</table>";
         
       ?>

        
    
</body>
</html>
    