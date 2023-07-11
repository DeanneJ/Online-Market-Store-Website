<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="icon" href="Images/ShopZilla Logo.png" type="image/x-icon">
</head>

<body>
<header>
    <div class="head-container">
        <div class="logo">
            <a href="Home.php?S_ID=<?php echo urlencode($S_ID); ?>"> <img style="top: 5px; height: 90px; width: auto; margin-top: 5px; border: 2px solid #000000; border-radius: 10px;" src="Images/ShopZilla Logo.png" > </a>
        </div>

        <div style="width:10px">
            <label class="name" style="font-family: Georgia, serif; font-size: 50px; color:#ffffff; margin-left:-60px">ShopZilla</label>
        </div>

        <div class="nav-btns" style="margin-left:250px">
            <ul>
                <a href="HomeSeller.php"> <li>Home</li> </a>
                <a href="loginSeller.php"> <li>My Products</li> </a>
                <a href="loginSeller.php"> <li>Add Product</li> </a>
                <a href="aboutUsSeller.php"> <li>About Us</li> </a>
                <a href="loginCustomer.php"> <li>Buy</li> </a>
            </ul>
        </div>

        <div class="sign-btn-container">
          <?php
            // Check if S_ID is set
            if (isset($_GET['S_ID'])) {
                $S_ID = $_GET['S_ID'];

                // Display the profile icon with a link to the user's profile page
                echo '<a class="profile-img" href="profileSeller.php?S_ID=' . urlencode($S_ID) . '"><img src="Images/profile.png" style="height: 70px;width: auto; margin-right: 10px;"></a>';
            }
          ?>
          <a href="loginSeller.php" > <div class="login" style=""> Login </div> </a>
          <a href="signupSeller.php" > <div class="sign-up"> Sign up </div> </a>
        </div>
    </div>
</header>
</body>

</html>
