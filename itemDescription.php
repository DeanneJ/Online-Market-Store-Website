<?php
include "config.php"; // Include the file containing your database connection code

$P_ID = $_GET["P_ID"];
$C_ID = $_GET["C_ID"];

// Prepare the SQL statement
$sql = "SELECT * FROM Product WHERE P_ID = $P_ID";
$result = mysqli_query($conn, $sql);

    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $P_ID = $row['P_ID'];
            $P_Name = $row['P_Name'];
            $Price = $row['Price'];
            $P_Availability = $row['P_Availability'];
            $P_Description = $row['P_Description'];
            $P_Category = $row['P_Category'];
            $S_ID = $row['S_ID'];
            $Business_Name = $row['Business_Name'];
            $imagePath = $row['Image_URL'];
        
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Styles/itemDescription.css">
    <title><?php echo $P_Name; ?></title>       <!-- Calling product name for page title -->
    <?php include "headerCustomerAfterLogin.php"; ?>
</head>

<body style="background-image: url('Images/2.jpg'); background-size: 100%; background-attachment: fixed; background-color: #ffffff"> <!--Body Style -->
  <!-- Calling header -->

<div class="container-layout">
    <img class="product-image" src="<?php echo $imagePath; ?>">     <!-- Calling Product Image -->
    
    <div class="product-details-container">
        <h1 class="product-name"><?php echo $P_Name; ?></h1>         <!-- Calling Product Name -->

        <div class="p-store">
            <p class="Product-store"><?php echo $Business_Name; ?></p>       <!-- Product Store Name -->
        </div>
        
        <div class="price"> 
                <?php 
                    $oldPrice = $Price + ($Price*10/100);
                ?>
                <div class="old-price">LKR <?php echo $oldPrice; ?></div>
                <div class="new-price">LKR <?php echo $Price; ?>.00</div>   <!-- Callin price-->
            </div> 

        <div class="p-des">
            <p class="Product-description"><?php echo $P_Description; ?></p>       <!-- Product DEscription -->
        </div>

        <!--Buyer protection image and text -->
        <div class="buyer-protection">
            <img src="Images/Buyer Protection1.png" alt="Protection Icon">
            <span class="buyer-protection-text">30-Day Buyer Protection<br>Money back guarantee</span>
        </div>
        
        <script>
                function showAlert() {
                    alert("Added to Cart Successfully!");
                }
        </script>
        
        <center>
            <div class="btn">
            <?php echo '<a href="addtoCart.php?C_ID='.$C_ID.'&P_ID='.$P_ID.'" class="cart-btn" onclick="showAlert()">
                    <img class="btn-icon1" src="images/1267764-57ffe663.png" alt="">
                    Add to cart
                </a>'; ?>


                <?php echo '<a href="checkout.php?C_ID='.$C_ID.'&P_ID='.$P_ID.'" class="buy-btn" >
                    <img class="btn-icon2" src="images/478096-e32e1e90.png" alt="">
                    Buy now
                </a>'; ?>
            </div>
        </center>
    </div>
</div>

<?php include "footer.php"; ?>  <!--Calling footer -->

</body>
</html>

<?php
}}

else {
    // Product not found
    echo "Product Not Found.";
}
?>
