<?php
    include "config.php"; // Include the file containing your database connection code
          
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Styles/cart.css">
    <title>Shopping Cart</title>       <!-- Calling product name for page title -->

    
</head>

<body style="background-image: url('Images/2.jpg'); background-size: 100%; background-attachment: fixed; background-color: #ffffff"> <!--Body Style -->

<?php 
        $C_ID = $_GET['C_ID'];

        include_once "headerCustomerAfterLogin.php";  
    
        $sql = "SELECT * FROM cart CT, product P WHERE CT.P_ID = P.P_ID AND C_ID = $C_ID";
    
        $result = mysqli_query($conn, $sql); 
         
    echo '<div class="b-btn">';
        echo '<a href="checkout.php?C_ID='.$C_ID.'" class="buy-btn">   <!-- Buy button -->
        <img class="btn-icon2" src="images/478096-e32e1e90.png" alt="">
        Buy Now
        </a>';
    echo '</div>';

    
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $Cart_ID = $row['Cart_ID'];
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
<div class="container-layout">

    <img class="product-image" src="<?php echo $imagePath;?>">     <!-- Calling Product Image -->
    
    <div class="product-details-container">
        <h1 class="product-name"><?php echo $P_Name; ?></h1>         <!-- Calling Product Name -->
        <br>
        <h6 class="Business_Name"><?php echo $Business_Name; ?></h6>         <!-- Calling Product Name -->
        
        <div class="price">
            <div class="new-price">LKR <?php echo $Price; ?>.00</div>   <!-- Callin price-->
        </div> 

        <div class="p-des">
            <p class="Product-description"><?php echo $P_Description; ?></p>       <!-- Product DEscription -->
        </div>


        
        <center>
            <div class="btn">
                </a>
                <?php
                echo '<a href="removeCartProduct.php?C_ID='.$C_ID.'&removeid='.$Cart_ID.'" class="buy-btn">   <!-- Remove button -->
                    Remove
                </a>';  ?>
            </div>
        </center>
    </div>
    
</div>
<?php 
 }
}

?>
 

</body>
</html>

<?php 
//Calling foote
include "footer.php"; 
?>
