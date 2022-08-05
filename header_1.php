
<link rel="stylesheet" href="css/grids.css">
<link rel="stylesheet" href="css/bootstrap.css">
        <div class="pd-10 mg-t-20 bg-dark rounded">
      <div class="ht-65 bd pd-x-20 d-flex align-items-center justify-content-between">
      <h4 class="mg-b-0 tx-bold tx-spacing--2 tx-inverse tx-poppins mg-r-20"><span style="color: white; font-size: 35px;">Cooking</span><span style="color: rgb(6, 193, 103); font-size: 35px;"> Robot</span></h4>
        <ul class="nav nav-white-800 flex-column flex-md-row justify-content-end" role="tablist">
          <li class="nav-item" style="font-size: 15px;"><a class="nav-link" href="homepage.php" role="tab">Home</a></li>
          <li class="nav-item" style="font-size: 15px;"><a class="nav-link" href="ingredient_list.php" role="tab">Ingredient List</a></li>
          <li class="nav-item" style="font-size: 15px;"><a class="nav-link" href="homepage.php" role="tab">About Us</a></li>
          <li class="nav-item dropdownn" style="font-size: 15px;"><a class="nav-link" href="#">Welcome Back, <?php echo $_SESSION['name']; ?></a>
          <div class="dropdown-content">

    <a href="user_profile.php">My Profile</a>
    <a href="user_logout.php">Logout</a>
  </div>
  </li></ul>
      </div>
      </div>
