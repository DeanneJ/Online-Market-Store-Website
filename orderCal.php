<?php 
include_once 'config.php';

$C_ID = $_GET['C_ID'];
$Pay_ID = $_GET['Pay_ID'];

if(isset($_GET['P_ID']))
{
    $P_ID = $_GET['P_ID'];
}

include_once "headerCustomerAfterLogin.php";

$sql = "SELECT * FROM order_sz O, product P WHERE O.P_ID = P.P_ID AND O.Pay_ID = $Pay_ID";

$result = mysqli_query($conn, $sql);

if ($result) {
    $Total = 0; // Initialize the Total variable before the loop
    while ($row = mysqli_fetch_assoc($result)) {
        $P_ID = $row['P_ID'];
        $P_Name = $row['P_Name'];
        $Price = $row['Price'];
        $P_Availability = $row['P_Availability'];
        $P_Description = $row['P_Description'];
        $P_Category = $row['P_Category'];
        $S_ID = $row['S_ID'];
        $Business_Name = $row['Business_Name'];
        $imagePath = $row['Image_URL'];

        $Total += $Price;

        // Display the retrieved data or perform further actions
    }
    
    
    // Update the payment table with the total amount
    $updateSql = "UPDATE payment SET Total = $Total WHERE Pay_ID = $Pay_ID";

    $updateResult = mysqli_query($conn, $updateSql);
    if ($updateResult) 
    {
        if(!isset($_GET['P_ID']))
        {
            $deletesql = "DELETE FROM cart WHERE C_ID = '$C_ID'";
            $deleteResult = mysqli_query($conn, $deletesql);
        }
        
        header("location:displayCheckout.php?C_ID=$C_ID&Pay_ID=$Pay_ID");
    }
} 

else {
    // Handle the case when the query fails
    echo "Query failed: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
