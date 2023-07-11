<?php
    include "config.php"; // Include the file containing your database connection code

    //Calling header
    $S_ID = $_GET['S_ID'];

    $sql = "SELECT * FROM product WHERE S_ID = $S_ID";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $Business_Name = $row['Business_Name']
    

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Styles/sellerProductDisplay.css">
    <title><?php echo $Business_Name?></title>       <!-- Calling product name for page title -->
    
    <?php include "headerSellerAfterLogin.php";?>
</head>

<body style="background-image: url('Images/2.jpg'); background-size: 100%; background-attachment: fixed; background-color: #ffffff"> <!--Body Style -->

<?php

    $sql = "SELECT * FROM product WHERE S_ID = $S_ID";

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
<div class="container-layout">
    <img class="product-image" src="<?php echo $imagePath;?>">     <!-- Calling Product Image -->
    
    <div class="product-details-container">
        <h1 class="product-name"><?php echo $P_Name; ?></h1>         <!-- Calling Product Name -->
        
        <div class="price">
            <div class="new-price">LKR <?php echo $Price; ?>.00</div>   <!-- Callin price-->
        </div> 

        <div class="p-des">
            <p class="Product-description"><?php echo $P_Description; ?></p>       <!-- Product DEscription -->
        </div>
        
        <center>
            <div class="btn">
                <?php
                echo '<a href="updateProduct.php?updateid='.$P_ID.'&S_ID='.$S_ID.'" class="update-btn"  > 
                    Update
                ';?>
                </a>
                <?php
                echo '<a href="deleteProduct.php?deleteid='.$P_ID.'&S_ID='.$S_ID.'" class="delete-btn">   <!-- By=uy button -->
                    Delete
                </a>';?>
            </div>
        </center>
    </div>
</div>

<?php 
    }
}
    include "footer.php"; 
?>  <!--Calling footer -->

</body>
</html>