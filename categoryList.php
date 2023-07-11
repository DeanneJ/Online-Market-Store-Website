
    <?php
      include_once 'config.php';
          
      // Check if C_ID is set in $_SESSION
      if (isset($_SESSION['C_ID'])) {
          $C_ID=$_SESSION['C_ID'];
      }
      // Check if C_ID is set in $_GET
      else if (isset($_GET['C_ID'])) 
      {
          $C_ID=$_GET['C_ID'];
      }
      
   
      // Assuming you have already established a database connection

      // Retrieve the product information from the database
      $sql = "SELECT * FROM product_category";
      $result = mysqli_query($conn, $sql);

      // Display the products in rows of four
      echo '<div class="product-grid">'; // Assuming you have a CSS class named "product-grid" for styling

      $count = 0; // Counter to keep track of the number of products displayed in a row

      while ($row = mysqli_fetch_assoc($result)) {
          // Retrieve the product information from the current row
          $PC_ID = $row['PC_ID'];
          $PC_Name = $row['PC_Name'];
          
          $imagePath = $row['PC_Image'];

          // Display the product information
          echo '<div class="productCategory">';
          echo '<img src="' . $imagePath . '" alt="Product Image">';
          echo '<h3>' . $PC_Name . '</h3>';


          if (isset($_SESSION['C_ID'])) {
            echo '<button class="btn btn-primary"><a class="text-light" href="displayCategory.php?PC_ID='.$PC_ID.'&C_ID='.$C_ID.'">View</a></button>';
            }

            // Check if C_ID is set in $_GET
            else if (isset($_GET['C_ID'])) {
              echo '<button class="btn btn-primary"><a class="text-light" href="displayCategory.php?PC_ID='.$PC_ID.'&C_ID='.$C_ID.'">View</a></button>';

            }
        
            else {
              echo '<button class="btn btn-primary"><a class="text-light" href="displayCategory.php?PC_ID='.$PC_ID.'">View</a></button>';

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
