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
            </div><!-- row -->
              <div class="form-layout-footer" style="text-align: center">
                <button class="btn btn-info btn-dark justify-content-center" id="update" >UPDATE</button>
              </div>
              </div>
          

              <div class="form-layout form-layout-1" style="border: none;">
                <form method='post' action='update_user_password.php' name = "password_form">
                  <div class="row mg-b-25">
                  <div class="col-lg-4">            
                  <div class="form-group">
                  <label class="form-control-label">Old Password: </label>
                  <input class="form-control" type="text" id="old_password" name ="old_password" placeholder="Enter Old Password">
                  </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                  <div class="form-group">
                  <label class="form-control-label">New Password: </label>
                  <input class="form-control" type="text" id="new_password" name ="new_password" placeholder="Enter New Password">
                  </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                  <div class="form-group">
                  <label class="form-control-label">Confirm Password: </label>
                  <input class="form-control" type="text" id="confirm_password" name="confirm_password" placeholder="Re-enter New Password">
                  </div>
                  </div><!-- col-4 -->
                  <!-- col-8 -->
                  <!-- col-4 -->
                 <!-- row -->

                  </div><!-- row -->
                  <div class="form-layout-footer" style="text-align: center">
                 <button class="btn btn-info btn-dark justify-content-center" id="update_password" >UPDATE PASSWORD</button>
                  </div>

                 <!-- <div class="form-layout-footer mg-t-100" style="text-align: center">
                 <button class="btn btn-info btn-dark justify-content-center"  ><a href="add_custom_recipe.php" style="color: white;">ADD CUSTOM RECIPE</a></button>
                  </div> -->
                  </div>
                  </div><!-- form-layout-footer -->
                </form>
              </div><!-- row -->
              <form method="GET" action= 'createlist.php'>
                <div class="form-layout-footer" style="text-align: center">
                <button class="btn btn-info btn-dark justify-content-center" >Create List</button>
                </div>

                <!-- <div class="form-layout-footer mg-t-100" style="text-align: center">
                <button class="btn btn-info btn-dark justify-content-center"  ><a href="add_custom_recipe.php" style="color: white;">ADD CUSTOM RECIPE</a></button>
                </div> -->
                </div>
              </form>
</body>


<script type = "text/javascript">
    // $(function() {
// $('#update_password').click(function() {

// var old_password = $('#old_password').val();
// var new_password = $('#new_password').val();
// var confirm_password = $('#confirm_password').val();

// if (old_password == ""|| new_password == "" || confirm_password == ""){
//   alert('Password Fields cannot be empty');
// }
// else if (old_password == new_password){
//   alert ('Password should be unique');
// }
// elseif (confirm_password != new_password){
//   alert ('password does not match');
// }




// })

      // update button
        $('#update').click(function() {
          var first_name = $('#fname').val()
          var last_name = $('#lname').val()
          if(first_name == "" || last_name == ""){
            alert('Firstname & Lastname cannot be empty')
          }
          else{
            $.ajax({
                type: 'post',
                url: 'update_user_data.php',
                dataType: 'json',
                data: {
                    'first_name' : first_name,
                    'last_name' : last_name,
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
          } 
        });
    // });

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
