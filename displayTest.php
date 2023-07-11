<?php
  include 'config.php';
  include_once 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template: 50px / auto auto auto auto;
  grid-gap: 10px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
</style>
</head>
<body>



<div class="grid-container">
    <?php
        
        // Retrieve the product information from the database
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);

        // Display the products in rows of four
        //echo '<div class="product-grid">'; // Assuming you have a CSS class named "product-grid" for styling

        //$count = 0; // Counter to keep track of the number of products displayed in a row

        while ($row = mysqli_fetch_assoc($result)) {
            // Retrieve the product information from the current row
            $P_ID = $row['P_ID'];
            $P_Name = $row['P_Name'];
            $Price = $row['Price'];
            $P_Availability = $row['P_Availability'];
            $P_Description = $row['P_Description'];
            $P_Category = $row['P_Category'];
            $Business_Name = $row['Business_Name'];
            $imagePath = $row['Image_URL'];

            echo '
                <div class="item1">
                <img src="' . $imagePath . '" alt="Product Image">
                <h3>' . $P_Name . '</h3>
                <p>Price: LKR ' . $Price . '</p>
                <button class="btn btn-primary"><a class="text-light" href="itemDescription.php?P_ID='.$P_ID.'">View</a></button>
                </div>

            ';
        }
    ?>
</div>

<?php
  include_once 'footer.php';
?>
</body>
</html>