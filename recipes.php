<!DOCTYPE html>
<html lang="en">

  <head>    
  
    <link rel="stylesheet" href="css/grids.css">
    <!-- vendor css -->
    <!-- <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet"> -->
    <!-- <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet"> -->
    <!-- <link href="lib/select2/css/select2.min.css" rel="stylesheet"> -->
    <!-- <script src="lib/popper.js/popper.js"></script> -->
  
    <!-- Bracket CSS -->

    <!-- <link rel="stylesheet" href="css/datatable.css"> -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/jquery-ui/jquery-ui.js"></script>
    <!-- <script src="lib/datatables/jquery.dataTables.js"></script> -->
    <!-- <script src="lib/datatables-responsive/dataTables.responsive.js"></script> -->
    <!-- <script src="lib/select2/js/select2.min.js"></script>   -->
  </head>
  <div>
<?php
 require_once('connection.php');
if(!isset($_SESSION['login'])){
  require_once('header_1.php');
}
else{
  require_once('header.php');
}
?>
</div>
<button type="button">add to list</button>
<div class="br-pagebody">
    <div class="br-section-wrapper">
      <?php 
       
        
        $query_1 = "SELECT * FROM `recipes` WHERE `recipe_id`=".$_GET['id'];
        $q_1 = mysqli_query($conn,$query_1) or die($query_1);
        $row = mysqli_fetch_assoc($q_1);

        echo '<h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10 tx-center">'.$row['recipe_name'].'</h6>';
        echo '<div class="text-align-center" >';
        echo '<img src="data:image; base64,'.base64_encode($row['recipe_photo']).'">';

        echo '<div class="bd bd-gray-300 rounded table-responsive mg-t-50">';
            echo '<table class="table mg-b-0" id ="descriptionTable" style="border:none;">';
              echo '<thead>';
                echo '<tr>';
                  echo '<th>Cooking Time</th>';
                  echo '<th>Cooking Temperature</th>';
                  echo '<th>Calories</th>';
                  echo '<th>Serving</th>';
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';

              echo '<td id = "cooking">'.$row['Cooking Time'].'</td>';
              echo '<td>'.$row['Cooking Temperature'].'</td>';
              echo '<td>'.$row['Calories'].' </td>';
      
      ?>
                <td>
                    <select id = "serving">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    </select>
                </td>
              </tbody>
            </table>
</div>
</div>

<!--  list of utensils -->
<div class="bd bd-gray-300 rounded table-responsive mg-t-20">
            <table class="table">
              
              <thead>
                <th>Sr no</th>
                <th>Utensils Required</th>
             </thead>
          <?php
$query_4= "SELECT utensils_name from recipe_utensil ru inner join utensils u on u.utensils_id = ru.utensil_id WHERE ru.recipe_id = ".$_GET['id'];
$q_4 = mysqli_query($conn,$query_4) or die (mysqli_error($conn)) ;
$index=1;
while($row = mysqli_fetch_array($q_4)){
  echo '<tr>';
  echo '<td>'.$index++.'</td>';
  echo '<td>'.$row['utensils_name'].'</td>';
  echo '</tr>';
}

?>
            </table>
</div>
<!-- list of ingredients -->
<h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10 mg-t-20 tx-center">List Of Ingrediants</h6>
<div class="bd bd-gray-300 rounded table-responsive mg-t-20">
            <table class="table" id = "ingredientTable">
              
              <tbody>
                <th>Quantity</th>
                <th>Ingredients</th>
             </tbody>
          <?php
$query_2= "SELECT ingredient_name,ri.quantity FROM recipe_ingredient ri inner join ingredient_table it on it.ing_id = ri.ingredients_id WHERE ri.recipe_id = ".$_GET['id'];
$q_2 = mysqli_query($conn,$query_2) or die (mysqli_error($conn)) ;
while($row = mysqli_fetch_array($q_2)){
  echo '<tr >';
  echo '<td id = "quantity" >'.$row['quantity'].'</td>';
  echo '<td>'.$row['ingredient_name'].'</td>';
  echo '</tr>';
}

?>
            </table>
</div>

<div class="bd bd-gray-300 rounded table-responsive mg-t-20 justify-content-center">
            <table class="table" >
              <thead>
                <tr>
                  <th class="wd-20">Steps</th>
                  <th style="text-align: center;">Description</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $query_3= "SELECT recipe_step.description FROM recipe_step WHERE recipe_step.recipe_id=".$_GET['id'];
                $q_3 = mysqli_query($conn,$query_3);
                $index=1;
                while($row = mysqli_fetch_array($q_3)){
                  echo '<tr>';
                  echo '<td>'.$index++.'</td>';
                  echo '<td>'.$row['description'].'</td>';
                  echo '</tr>';
                }
              ?>
                
              </tbody>
            </table>
</div>



</div>

<script type="text/javascript">
 $(document).ready(function () {
  console.log("Js is running")
  var select = 1;
  var data = $('#cooking').text()

  var quan_data = []
  var quan = document.getElementById('ingredientTable').rows.length
  for(var i=1; i< quan; i++){ 
    var row = document.getElementById('ingredientTable').rows[i].cells
    quan_data[i] = row[0].innerHTML
  }
  // console.log(typeof(data));
  var descriptionTable;
  $('#serving').change(function () {
  select = $('#serving').val(); 
  console.log(select)
  if(select == 1){
  console.log(data);
  document.getElementById('cooking').innerHTML = data;
  var quan = document.getElementById('ingredientTable').rows.length
  for(var i=1; i< quan; i++){ 
    var row = document.getElementById('ingredientTable').rows[i].cells
    row[0].innerHTML = quan_data[i]
  }
  }
  else if(select == 2){
  (document.getElementById('cooking').innerHTML) = data*2
  var quan = document.getElementById('ingredientTable').rows.length
  for(var i=1; i< quan; i++){ 
    var row = document.getElementById('ingredientTable').rows[i].cells
    row[0].innerHTML = quan_data[i] * 2
  }
  }
else if(select == 3){
 // var data = ($('#cooking').text())*3
  console.log(data);
  document.getElementById('cooking').innerHTML = data*3
  var quan = document.getElementById('ingredientTable').rows.length
  for(var i=1; i< quan; i++){ 
    var row = document.getElementById('ingredientTable').rows[i].cells
    row[0].innerHTML = quan_data[i] * 3
  }
}
else if(select == 4){
  //var data = ($('#cooking').text())*4
  console.log(data);
  document.getElementById('cooking').innerHTML = data*4
  var quan = document.getElementById('ingredientTable').rows.length
  for(var i=1; i< quan; i++){ 
    var row = document.getElementById('ingredientTable').rows[i].cells
    row[0].innerHTML = quan_data[i] * 4
  }
}

});
 
  })
 


</script>
 <div>
  <?php
 require_once('rating_page.php');
 ?>
 </div>

