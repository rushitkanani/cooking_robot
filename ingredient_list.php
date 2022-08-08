<!DOCTYPE html>
<html lang="en">
<?php
require_once('connection.php');
if(!isset($_SESSION['login'])){
header("Location:homepage.php"); 
}
else{
  require_once('header.php');
}

?> 
<head>
  
    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <script src="lib/popper.js/popper.js"></script>
  

    <!-- Bracket CSS -->

    <link rel="stylesheet" href="css/datatable.css">

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/jquery-ui/jquery-ui.js"></script>
    <script src="lib/datatables/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    
  </head>

<div class="br-pagebody">
    <div class="br-section-wrapper">


      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10 tx-center">List Of Ingrediants</h6>

      
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap" >
          <thead>
            <tr>
            <th class="wd-5p text-center">Sr No</th>
                  <th class="wd-15p text-center">Ingrediant Name</th>
                  <th class="wd-10p text-center">Calories <br> (per 100 gram)</th>
                  <th class="wd-10p text-center">Cooking Time <br>(in min)</th>
                  <th class="wd-10p text-center">Cooking Temperature <br>(in °C)</th>
                  <th class="wd-10p text-center">Ingrediant Image</th>
                </tr>
          </thead>
          <tbody>
            <?php 
                
                $query = "select * from `ingredient_table`";
                $query_run = mysqli_query($conn, $query);
                $index=1;
                while ($row = mysqli_fetch_assoc($query_run)) 
                {
                    echo "<tr role='row' class='odd'>";
                    echo "<td style='display:table-cell; text-align:center; vertical-align:middle;'>".$index++."</td>";
                    echo "<td style='display:table-cell; text-align:center; vertical-align:middle;' tabindex='0' class='sorting_1'>".$row['ingredient_name']."</td>";
                    echo "<td style='display:table-cell; text-align:center; vertical-align:middle;'>".$row['ingredient_calories']."</td>";
                    echo "<td style='display:table-cell; text-align:center; vertical-align:middle;'>".$row['ingredient_time']."</td>";
                    echo "<td style='display:table-cell; text-align:center; vertical-align:middle;'>".$row['ingredient_temperature']."</td>";
                    echo "<td style='display:table-cell; text-align:center; vertical-align:middle;'><img src='data:image; base64,".base64_encode($row['ingredient_photo'])."' alt=".$row['ingredient_name']." width='100px' height='100px'></td>";
                    echo "</tr>";
                }
            ?>
          </tbody>
        </table>
      </div>
      <div class="form-layout-footer" style="text-align: center">
              <button class="btn btn-info btn-dark justify-content-center mg-t-20"><a href="ingredients.php" style="color: white;">Add Ingredients</a></button>
            </div>
    </div>
  </div>

    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search',
            sSearch: '',
            search: {
            return: true,
        },
            lengthMenu: '_MENU_ items/page',
          },
          "columnDefs": [
            { "orderable": false, "targets": 5 },
            { "orderable": false, "targets": 4 },
            { "orderable": false, "targets": 3 }
      ]

        });

      });
    </script>
