<?php
    include_once 'config.php';

    $Pay_ID = $_GET['Pay_ID'];
    $C_ID = $_GET['C_ID'];

    // Fetch order details from the database
    $sql = "SELECT * FROM payment WHERE Pay_ID = '$Pay_ID'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Retrieve the required fields
        $C_Zipcode = $row['C_Zipcode'];
        $C_Address = $row['C_Address'];
        $Total = $row['Total'];

    }
    ?>


<!DOCTYPE html>
<html>

<head>
    <title>Order Details</title>
    <link rel="stylesheet" type="text/css" href="Styles/displayOdetails.css">
</head>

<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
<?php include_once 'headerCustomerAfterLogin.php'; ?>


    <div class='box'>
        <div class="order-display">
            <div class="od-image-up">
                <img src="Images/ShopZilla Logo.png" alt="">
            </div>
            <!-- Section 1 -->
            <div class="od-details0">
                <h5>Hello Customer,</h5><br>
                <center><p>Your order has been confirmed and will be shipping soon.</p></center><br><br>
            </div>
            <!-- Section 2 -->
            <div class='od-detailsall'>
                <div class="od-details2">
                    <h3>Zip Code : </h3>
                    <h2><?php echo $C_Zipcode;?></h2>
                </div>
                <div class="od-details3">
                    <h3>Address : </h3>
                    <h2><?php echo $C_Address;?></h2>

                </div>
            </div>
            <br>

            
            <!-- Section 3 -->

            <?php
                $sql2 = "SELECT * FROM order_sz O, product P WHERE O.P_ID = P.P_ID AND O.Pay_ID = $Pay_ID";

                $result2 = mysqli_query($conn, $sql2);
                
                if ($result2) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $P_ID = $row2['P_ID'];
                        $P_Name = $row2['P_Name'];
                        $Price = $row2['Price'];
                        $P_Availability = $row2['P_Availability'];
                        $P_Description = $row2['P_Description'];
                        $P_Category = $row2['P_Category'];
                        $S_ID = $row2['S_ID'];
                        $Business_Name = $row2['Business_Name'];
                        $imagePath = $row2['Image_URL'];
                
                
                        // Display the retrieved data or perform further actions
                

                        echo "<div class="."od-details-img-title".">
                            <div class="."od-dt-img".">
                                <img src="."$imagePath"." alt="."$imagePath".">
                            </div>

                            <div class="."od-dt-title".">
                                <p>$P_Name</p>
                                <p>$P_Description</p>
                                <p>$Price.00 LKR</p>
                            </div>
                        </div>";
                        }
                }   
            ?>


            <!-- Section 4 -->
            <div class="price-info">
                </h2><h2>Total : </h2>
                <h3><?php echo $Total;?></h3>
            </div>
            
            
            <!-- Section 5 -->
            <div class="od-buttons">
                <button class="od-btn1" onclick="editShippingDetails('<?php echo $Pay_ID; ?>')">Edit Shipping
                    Details</button>
                <button class="od-btn2" onClick="deleteme('<?php echo $Pay_ID; ?>')">Cancel Order</button>
                <script>
                function editShippingDetails(Pay_ID) {
                    window.location.href = 'updateOrderDetails.php?<?php echo "Pay_ID=$Pay_ID&C_ID=$C_ID; "?>';
                }

                function deleteme(Pay_ID) {
                    if (confirm('Are you sure you want to cancel this Order?')) {
                        window.location.href = 'deleteCheckout.php?Pay_ID=' + Pay_ID;
                    }
                }
                </script>
            </div>
        </div>
    </div>

<?php 
    mysqli_free_result($result);
    include_once 'footer.php'; 
?>

</body>

</html>