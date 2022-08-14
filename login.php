<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(isset($_SESSION['login'])){
  header('Location:homepage.php');
}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cooking Robot</title>
  <link rel="stylesheet" href="css/grids.css">
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<div class="pd-10 mg-t-20 bg-dark rounded">
<div class="ht-65 bd pd-x-20 d-flex align-items-center justify-content-between">
  <h4 class="mg-b-0 tx-bold tx-spacing--2 tx-inverse tx-poppins mg-r-20"><span style="color: white; font-size: 35px;">Cooking</span><span style="color: rgb(6, 193, 103); font-size: 35px;"> Robot</span></h4>
        <ul class="nav nav-white-800 flex-column flex-md-row justify-content-end" role="tablist">
        <li class="nav-item" style="font-size: 15px;"><a class="nav-link" href="homepage.php" role="tab">Home</a></li>  
      </ul>
      </div>
      </div>

    <form  method = "POST">

      <body>
        <div class="d-flex align-items-center justify-content-center ht-500 pd-x-20 pd-xs-x-0">
          <div class="card wd-350 ">
            <div class="card-body pd-x-20 pd-xs-40">
              <h5 class="tx-xs-24 tx-normal tx-gray-900 mg-b-15" >Sign in to continue</h5>
              <p class="mg-b-30 tx-14">Don't have an account? <a href="register.php">Create an account</a>, it only
                takes less than a minute.</p>

              <div class="form-group">
                <input class="form-control" type="text" name="email_id" id = "email_id" placeholder="Enter email address">
              </div>
              <div class="form-group">
                <input class="form-control" type="password" name="password" id = "password" placeholder="Enter password" >
              </div>
              <!-- <div class="form-group"><a href="#" class="tx-12">Forgot password?</a></div> -->
              <input type = button class="btn btn-info btn-block btn-dark" value = "Sign in" name = "signIn" id="signIn" >
              

            </div>
          </div>
        </div>
        
      </body>

    </form>
<script src="ajax.js"></script>
<script type = "text/javascript">
  console.log("hello")

  $(function () {

    $('#signIn').click(function () {
        console.log("clicked!!");
        var email = $('#email_id').val();
        var password = $('#password').val();
        if(email== "" || password== ""){
          alert("Please enter your Email  or Password")
        }
        else{
        $.ajax({
          type: 'post',
          url: 'user_login.php',
          dataType: 'json',
          data: {
            "emailPhp" : email,
            "passwordPhp" : password,
          },
          success: function (response) {
            console.log(response);
            if (response['result'] == 'success') {
              window.location.assign('homepage.php');
            } else {
              alert('Check Email or Password');
              window.location.reload();
            }
          }
        })
      }
    })
      
    })
    
 

</script>
 
