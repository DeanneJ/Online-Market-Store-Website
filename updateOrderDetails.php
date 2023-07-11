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

    mysqli_free_result($result);

} else {
    echo "No order found.";
    exit;
}

// Handle the update operation when the form is submitted
if (isset($_POST['submit'])) {
    $newAddress = $_POST['C_Address'];
    $newZipcode = $_POST['C_Zipcode'];

    // Update the order details in the database
    $updateSql = "UPDATE payment SET C_Address = '$newAddress', C_Zipcode = '$newZipcode' WHERE Pay_ID = '$Pay_ID'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        echo "<script>window.location.href = 'displayCheckout.php?Pay_ID=$Pay_ID&C_ID=$C_ID';</script>";
    } else {
        echo "Failed to update order details.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Your Address</title>
    <link rel="stylesheet" type="text/css" href="Styles/displayOdetails.css">
</head>

<body>
    <div class='box1'>
        <div class="order-display">
            <div class="od-image-up">
                <img src="Images/ShopZilla Logo.png" alt="">
            </div>
            <!-- Section 1 -->
            <div class="od-details022">
                <h2>Edit Your Address</h2>
            </div>

            <hr style="width:100%;text-align:left;margin-left:2%">

            <!-- Section 3 -->
            <div class='update-field'>
                <form method="POST" action="">
                    <div class='uf1'>
                        <label for="C_Address">Address</label>
                        <input type="text" value="<?php echo $C_Address; ?>" id="C_Address" name="C_Address">
                    </div>

                    <div class='uf2'>
                        <label for="C_Zipcode">ZIP CODE</label>
                        <input type="text" value="<?php echo $C_Zipcode; ?>" id="C_Zipcode" name="C_Zipcode">
                    </div>

                    <div class="od-buttons2">
                        <button class="od-btn4" onclick="goback('<?php echo $Pay_ID; ?>')">Go Back</button>
                        <button class="od-btn3" type="submit" name="submit">Update</button>
                    </div>
                </form>

                <script>
                function goback(Pay_ID) {
                    window.location.href = "displayCheckout.php?Pay_ID="+$Pay_ID"&C_ID="+$C_ID";
                }
                </script>
            </div>
        </div>
    </div>
</body>

</html>