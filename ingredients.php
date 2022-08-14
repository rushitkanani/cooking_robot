<?php
session_start();
if(!isset($_SESSION['login'])){
header("Location:homepage.php"); 
}
else{
  require_once('header.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.css">
    <div class="rcorners">
        
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="row mg-t-80">
          <div class="col-xl-6" style="background-color: #fff;">
            <div class="form-layout form-layout-4" >
              <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Add Ingredient Here</h6>
              <p class="mg-b-30 tx-gray-600">Ingredient details of a custom recipe.</p>
              <form method="post" action="add_ingredients.php" enctype="multipart/form-data" id="myform">
              <div class="row">
                <label class="col-sm-4 form-control-label">Ingredient Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter Ingredient Name" id="ingrident_name" name="ingrident_name" required oninvalid="this.setCustomValidity('Enter Ingredient Name')" oninput="this.setCustomValidity('')">
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Cooking Time: </label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter Cooking Time" id="cooking_time" name="cooking_time"  >
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Cooking Temperature: </label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter Cooking Temperature" id="cooking_temp" name="cooking_temp">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Calories: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" placeholder="Enter Calories" id="calories" name="calories" required oninvalid="this.setCustomValidity('Enter Calories')" oninput="this.setCustomValidity('')" >
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Upload Image: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required oninvalid="this.setCustomValidity('Upload Ingredient Image')" oninput="this.setCustomValidity('')">
                </div>
              </div>
              
              <div class="form-layout-footer mg-t-30">
                <button class="btn btn-info btn-dark active" id="upload" name="upload">Add Ingredient</button>
              </div>
            </div>
          </div>
</form   >
          <div class="col-xl-6 mg-t-20 mg-xl-t-0" style="background-color: #fff;">
            <div class="form-layout form-layout-4">
              <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Add Utensils</h6>
              <p class="mg-b-30 tx-gray-600">Add your utensils here</p>
              <form action="add_utensil.php" method= "GET" >
              <div class="row">
                <label class="col-sm-4 form-control-label"> Utensil Name:<span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" id="utensil" name="utensil" required oninvalid="this.setCustomValidity('Enter Utensil Name')" oninput="this.setCustomValidity('')">
</div>
                <div class="form-layout-footer mg-t-30" style="padding-left: 35%;">
                <button class="btn btn-info btn-dark active" id="add_utensil" name="add_utensil">Add Utensil</button>
                
              </div>
                </div>
              </div><!-- row --><!-- row -->
            </div><!-- form-layout -->
          </div><!-- col-6 -->
</form>
</body>
</html>
