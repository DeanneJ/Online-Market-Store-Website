<?php
// Fetch product details based on the provided P_ID
include_once 'config.php';

include 'headerCustomerAfterLogin.php';

if(isset($_GET['C_ID'])){
    $C_ID = $_GET['C_ID'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout Page</title>
    <link rel="stylesheet" type="text/css" href="Styles/checkout.css">

</head>

<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
    <div class="container">
        <h1>Checkout Page</h1>

        <form method="post" action=<?php 
                                        if (isset($_GET['P_ID'])) 
                                        {
                                        $P_ID = $_GET['P_ID'];
                                        echo"payment.php?C_ID=$C_ID&P_ID=$P_ID";
                                        }

                                        else{
                                            echo"payment.php?C_ID=$C_ID";
                                        }
                                    ?>>
                                        
            <!-- Shipping Address Section -->
            <h2>Shipping Address</h2>
            <label for="C_Address">Address:</label>
            <input type="text" id="C_Address" name="C_Address" required><br>

            <label for="C_Zipcode">Zip Code:</label>
            <input type="text" id="C_Zipcode" name="C_Zipcode" required><br>


            <!-- Payment Method Section -->

            <h2>Payment Method</h2>
            <label for="Pay_Method">Select Payment Method:</label>
            <select id="Pay_Method" name="Pay_Method" required>
                <option value="visa">Visa</option>
                <option value="debit">Debit Card</option>
            </select><br><br>

            <!-- Payment Details Section -->
            <h2>Payment Details</h2>
            <label for="Pay_card_No">Card Number:</label>
            <input type="text" id="Pay_card_No" name="Pay_card_No" required><br>

            <label for="Pay_Exp_Date">Expiration Date:</label>
            <input type="date" id="Pay_Exp_Date" name="Pay_Exp_Date" required><br>

            <label for="Pay_Cvv">CVV:</label>
            <input type="text" id="Pay_Cvv" name="Pay_Cvv" required><br>

            <!-- Submit Buttons -->
            <button type="submit" value="submit" name="submit">Pay Now</button>

        </form>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>