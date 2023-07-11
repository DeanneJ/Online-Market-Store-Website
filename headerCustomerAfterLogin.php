
<?php
  session_start();

  if(isset($_SESSION['C_ID']))
  {
        $C_ID = $_SESSION['C_ID'];
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopZilla</title>
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="icon" href="Images/ShopZilla Logo.png" type="image/x-icon">
</head>

<body>
<header>
    <div class="head-container">
        <div class="logo">
            <a href="Home.php?C_ID=<?php echo $C_ID; ?>"> <img style="top: 5px; height: 90px; width: auto; margin-top: 5px; border: 2px solid #000000; border-radius: 10px;" src="Images/ShopZilla Logo.png" > </a>
        </div>

        <div style="width:10px">
            <label class="name" style="font-family: Georgia, serif; font-size: 50px; color:#ffffff; margin-left:-60px">ShopZilla</label>
        </div>

        <div class="nav-btns" style="margin-left:250px">
            <ul>
                <a href="homeCustomer.php?C_ID=<?php echo $C_ID; ?>"> <li>Home</li> </a>
                <a href="productDisplay.php?C_ID=<?php echo $C_ID;?>"> <li>Products</li> </a>
                <a href="cart.php?C_ID=<?php echo $C_ID; ?>"> <li>Cart</li> </a>
                <a href="Feedback.php?C_ID=<?php echo $C_ID; ?>"> <li>Feedback</li> </a>
                <a href="aboutUsCustomer.php?C_ID=<?php echo $C_ID; ?>"> <li>About Us</li> </a>
                <a href="loginSeller.php"> <li>Sell</li> </a>
            </ul>
        </div>

        <div class="sign-btn-container">
          <?php
            // Check if C_ID is set
            /*if (isset($_GET['C_ID'])) {
                $C_ID = $_GET['C_ID'];

                // Display the profile icon with a link to the user's profile page
                echo '<a class="profile-img" href="profileCustomer.php?C_ID=' . $C_ID . '"><img src="Images/profile.png" style="height: 70px;width: auto; margin-right: 10px;"></a>';
            }
          ?>
          <a href="logout.php" > <div class="logout"> Log Out </div> </a>*/

if (isset($_SESSION["C_Username"])) {
    echo '<a href="includes/logoutCustomer.inc.php"><div class="logout">Logout</div></a></li>';

    //echo '<a href="profileCustomer.php"><div class="sign-up">' ;
    echo '<a href="profileCustomer.php?C_ID=' . $C_ID . '"><div class="sign-up">';


    echo $_SESSION["C_Username"].' ! </div></a></li>';
}
else {
    echo '<a href="loginCustomer.php"><div class="login">Login</a></li>';
}
?>
        </div>
    </div>
    
</header>
</body>

</html>
