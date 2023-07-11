<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Styles/homeCustomer.css">
  <link rel="stylesheet" href="Styles/productDisplay.css">
    <title>Homepage</title>
</head>
<body style="background-image: url('Images/2.jpg'); background-size: 100%; background-attachment: fixed; background-color: #ffffff">

        <?php
        include_once 'config.php';
        
        // Check if C_ID is set in $_SESSION
    if (isset($_SESSION['S_ID'])) {
        include_once 'headerSellerAfterLogin.php';
    }
    // Check if C_ID is set in $_GET
    else if (isset($_GET['S_ID'])) {
        include_once 'headerSellerAfterLogin.php';
    }
    // Default case for other pages
    
    else {
        include_once 'headerSellerBeforeLogin.php';
    }
    
        ?>   
        <img class="homeback" src="Images/back2.jpg" alt="center logo">
        

        <div class="container2">
        <div class="welcome">
                <h1>Welcome to ShopZilla</h1>
            </div>
        
            <form action="https://www.google.com/search" method="get" class="search-bar">
                <input type="text"placeholder="search anything" name="q">
                <button type="submit"><img src="Images/search.png"></button>
            </form>
        </div>
        
            
        <div class="index">
                <h1 class="hello" >Hello <?php 
                if (isset($_SESSION["C_Username"])) {
                    
                echo $_SESSION["C_Username"] . ' !';
                }
                else {
                    echo 'user !';
                 
                }
                ?></h1>
                </div>

        <div class="container">
    
        <div class="product-row">
    <?php

      
      // Retrieve the product information from the database
      $sql = "SELECT * FROM product";
      $result = mysqli_query($conn, $sql);

      // Display the products in rows of four
      echo '<div class="product-grid">'; // Assuming you have a CSS class named "product-grid" for styling

      $count = 0; // Counter to keep track of the number of products displayed in a row

      while ($row = mysqli_fetch_assoc($result)) {
          // Retrieve the product information from the current row
          $P_ID = $row['P_ID'];
          $P_Name = $row['P_Name'];
          $Price = $row['Price'];
          $P_Availability = $row['P_Availability'];
          $P_Description = $row['P_Description'];
          $Business_Name = $row['Business_Name'];
          $imagePath = $row['Image_URL'];

         

          // Display the product information
          echo '<div class="product">';
          echo '<img src="' . $imagePath . '" alt="Product Image">';
          echo '<h3>' . $P_Name . '</h3>';
          echo '<p>Price: LKR ' . $Price . '</p>';
          echo '<h4>' . $Business_Name . '</h4>';

          if (isset($_SESSION['C_ID'])) {
            echo '<button class="btn"><a href="itemDescription.php?P_ID='.$P_ID.'&C_ID='.$C_ID.'">View</a></button>';
        }
        // Check if C_ID is set in $_GET
        else if (isset($_GET['C_ID'])) {
            echo '<button class="btn"><a href="itemDescription.php?P_ID='.$P_ID.'&C_ID='.$C_ID.'">View</a></button>';
        }
        // Default case for other pages
        
        else {
            echo '<button class="btn"><a href="loginCustomer.php">View</a></button>';
        }
          
          // Add more information as needed
          echo '</div>';

          // Increment the counter
          $count++;

          // Check if four products have been displayed in a row
          if ($count % 4 === 0) {
              echo '<div class="clearfix"></div>'; // Assuming you have a CSS class named "clearfix" to clear floats
          }
      }

      echo '</div>';
?>
               
        </div>
    </div>

  

<?php
 include_once 'footer.php';
?>

</body>
</html>
