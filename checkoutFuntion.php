<?php
require 'config.php';

if (isset($_POST['submit'])) {
    $C_Address = $_POST['C_Address'];
    $C_Zipcode = $_POST['C_Zipcode'];
    $Pay_card_No = $_POST['Pay_card_No'];
    $Pay_Exp_Date = $_POST['Pay_Exp_Date'];

    $sql = "INSERT INTO `payment`(`C_Address`, `C_Zipcode`, `Pay_card_No`, `Pay_Exp_Date`) VALUES ('$C_Address', '$C_Zipcode', '$Pay_card_No', '$Pay_Exp_Date')";
    $result = mysqli_query($conn, $sql);
   
    if ($result) {
        $orderID = mysqli_insert_id($conn); // Get the ID of the inserted row
        mysqli_close($conn); 

        // Redirect with the necessary itemid as orderid
        header("Location: displayCheckout.php?itemid=$C_Itemid&orderid=$orderID");
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
?>