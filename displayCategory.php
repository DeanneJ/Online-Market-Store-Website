<?php
  include 'config.php';

   // Check if C_ID is set in $_SESSION
   if (isset($_SESSION['C_ID'])) {
    $C_ID=$_SESSION['C_ID'];
    include_once 'headerCustomerAfterLogin.php';
}
// Check if C_ID is set in $_GET
else if (isset($_GET['C_ID'])) 
{
    $C_ID=$_GET['C_ID'];
    include_once 'headerCustomerAfterLogin.php';
}

// Default case for other pages
else {
    include_once 'headerCustomerBeforeLogin.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Display Category</title>

    <link rel="stylesheet" href="Styles/productDisplay.css">
    
</head>

<body style="background-image: url('Images/2.jpg'); background-size: 100%; background-attachment: fixed; background-color: #ffffff">

  <div class="container">
    
    <div class="product-row">
      
    <?php
      // Assuming you have already established a database connection

      // Retrieve the product information from the database
      $PC_ID = $_GET['PC_ID'];
      $sql = "SELECT * FROM product WHERE Category_ID = $PC_ID";
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
          $P_Category = $row['P_Category'];
          $Category_ID = $row['Category_ID'];
          $S_ID = $row['S_ID'];
          $Business_Name = $row['Business_Name'];
          $imagePath = $row['Image_URL'];


          // Display the product information
          echo '<div class="product">';
          echo '<img src="' . $imagePath . '" alt="Product Image">';
          echo '<h3>' . $P_Name . '</h3>';
          echo '<p>Price: LKR ' . $Price . '</p>';
          echo '<h4>' . $Business_Name . '</h4>';
          echo '<button class="btn btn-primary"><a class="text-light" href="itemDescription.php?P_ID='.$P_ID.'">View</a></button>';
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
</body>

</html>
