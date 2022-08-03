<?php
    require_once('connection.php');
    if(!isset($_SESSION['login']))
            header('Location:homepage.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking Robot</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/grids.css">
    <script src="ajax.js"></script>
    <script type="text/javascript" src="bootstrap.js"></script>
</head>
<body onload=load_data()>
<?php
    require_once('header.php');
?> 
    <div id="success_alert" class="alert alert-success" role="alert" style="visibility:hidden">
        <button type="button" class="close" onclick="$('#success_alert').css('visibility','hidden');" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong class="d-block d-sm-inline-block-force">Well done!</strong> Your Profile data has been successfully updated!!!
</div>
<div style="text-align: center;">
  <h4>My Profile</h4>
</div>
<div class="form-layout form-layout-1" style="border: none;">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Firstname: </label>
                  <input class="form-control" type="text" id="fname" placeholder="Enter firstname">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Lastname: </label>
                  <input class="form-control" type="text" id="lname" placeholder="Enter lastname">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email address: </label>
                  <input class="form-control" type="text" id="email" placeholder="Enter email address" disabled>
                </div>
              </div><!-- col-4 -->
             <!-- col-8 -->
              <!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info btn-dark" id="update" style='width:100px;margin:0 50%;position:relative;left:-50px;'>UPDATE</button>
            </div><!-- form-layout-footer -->
          </div>
          <div class="form-layout-footer">
              <button class="btn btn-info btn-dark" style='margin:0 50%;position:relative;left: -95px;px;'><a href="ingredients.php"; style="color: white";>Add New Ingredient</a></button>
            </div>
          </div>
      
</body>


<script type = "text/javascript">
    $(function() {
        $('#update').click(function() {
            $.ajax({
                type: 'post',
                url: 'update_user_data.php',
                dataType: 'json',
                data: {
                    'first_name' : $('#fname').val(),
                    'last_name' : $('#lname').val(),
                },
                success: function (response) {
                    console.log(response);
                    if (response['response'] = 'success') {
                        $('#success_alert').css("visibility","visible");
                    } else {
                        alert("Something went wrong!!!");
                    }
                }
            }); 
        });
    });

    function load_data(){
        $.ajax({
          type: 'post',
          url: 'user_data.php',
          dataType: 'json',
          data: {},
          success: function (response) {
            console.log(response);
            if (response['response'] = 'success') {
                $('#fname').val(response['first_name']);
                $('#lname').val(response['last_name']);
                $('#email').val(response['email']);

            } else {
              console.log("error")
            
            }
          }
        });
    }

</script>
