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
       <h2 align="center">Recipe List</h2>
       <div class="container">
        <input type="text" placeholder="Search..">
        </div>
        </div>
        <section class="grid grid3" id="mycards">
            <div class="cards">
                <img src="images/logo5.png" alt="">
                <h2>Chicken Biryani</h2>
                <p>Biryani is one of the most amazing royal delicacies introduced to Indians by the Persians. Since then
                    it has been much popular and is considered to be a luxurious treat to enjoy on special occassions.
                    Making a chicken biryani in authentic dum style does take some time and needs little expertise.</p>
                <p>Prep : 120min | Cook : 60min</p>
                <button onclick="location.href= 'recipes.php'">Learn More</button>
                <script type="text/javascript">
                    document.getElementById("myButton").onclick = function () {
                        location.href = "recipes.php";
                    };
                </script>
            </div>
            <div class="cards">
                <h2>Pav Bhaji</h2>
                <p>Pav Bhaji is flavorsome and hearty meal that has a delicious blend of spicy mixed vegetables, served
                    alongside soft butter toasted dinner rolls, crunchy onionsand lemon wedges. A total crowd-pleaser
                    with bold flavors!</p>
                <p>Prep : 120min | Cook : 60min</p>
                <button onclick="location.href= 'recipes.php'">Learn More</button>
                <script type="text/javascript">
                    document.getElementById("myButton").onclick = function () {
                        location.href = "recipes.php";
                    };
                </script>
                <p></p>
                <img src="images/logo4.png" alt="logo">
            </div>
            <div class="cards">
                <img src="images/logo6.png" alt="">
                <h2>Idli</h2>
                <p>Idli is one of the most healthiest and popular South Indian breakfast dish. These are soft, light,
                    fluffy steamed round cake made with a ground, fermented rice and lentil batter. Here I share my
                    foolproof recipe with video and step-by-step photos that will help you in making the best idli</p>
                <p>Prep : 120min | Cook : 60min</p>
                <button onclick="location.href= 'recipes.php'">Learn More</button>
                <script type="text/javascript">
                    document.getElementById("myButton").onclick = function () {
                        location.href = "recipes.php";
                    };
                </script>
            </div>
        </section>
        <section class="grid grid3">
            <div class="cards">
                <img src="images/logo3.png" alt="">
                <h2>Chole Bhature</h2>
                <p>Chole Bhature also known as Chana Bhatura is one of the most popular Punjabi dish liked almost all
                    over India. Chole stands for a spiced tangy chickpea curry and Bhatura is a soft and fluffy fried
                    leavened bread. A tasty meal combo recipe made with spicy and flavoured chana masala with a
                    deep-fried puri. It is a popular street food meal in northern india, particularly in the punjab,
                    delhi area, but also in rawalpindi pakistan</p>
                <p>Prep : 120min | Cook : 60min</p>
                <button onclick="location.href= 'recipes.php'">Learn More</button>
                <script type="text/javascript">
                    document.getElementById("myButton").onclick = function () {
                        location.href = "recipes.php";
                    };
                </script>
            </div>
            <div class="cards">
                <h2>Nachos</h2>
                <p>Make quick, delicious and easy nachos at home in just minutes! This mouth-watering recipe is
                    incredibly simple to make, and your friends and family will absolutely rave about the incredible
                    results!. While nachos have always made a great appetizer, don’t hesitate to turn them into a full
                    meal! This recipe works perfectly for dinner, be it for a party of one or for the entire family. One
                    of the best things about nachos, aside from their dig-right-in appeal, is that they are very
                    flexible when it comes to ingredients, and they are a great way to use up leftovers.</p>
                <p>Prep : 120min | Cook : 60min</p>
                <img src="images/logo7.png" alt="logo">
                <p></p>
                <button onclick="location.href= 'recipes.php'">Learn More</button>
                <script type="text/javascript">
                    document.getElementById("myButton").onclick = function () {
                        location.href = "recipes.php";
                    };
                </script>
            </div>
            <div class="cards">
                <img src="images/logo8.png" alt="">
                <h2>Pizza</h2>
                <p>Making homemade pizza dough can sound like a lot of work, but it’s so worth the bragging rights. The
                    dough itself requires few ingredients and just a little bit of rising and rest time. While you wait
                    for the dough to be ready, you can get to work prepping your tomato sauce, chopping fresh
                    vegetables, or grating the cheese you’ll put on top. Bake for 15 minutes, garnish with basil (or,
                    let’s be real, more cheese), and enjoy showing off your way-better-than-takeout creation.</p>
                <p>Prep : 120min | Cook : 60min</p>
                <button onclick="location.href= 'recipes.php'">Learn More</button>
                <script type="text/javascript">
                    document.getElementById("myButton").onclick = function () {
                        location.href = "recipes.php";
                    };
                </script>
            </div>
        </section>
    </main>
</body>
</html>
    