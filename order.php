<?php 
include_once 'config.php';

$C_ID = $_GET['C_ID'];
$Pay_ID = $_GET['Pay_ID'];

if(isset($_GET['P_ID']))
{
    $P_ID = $_GET['P_ID'];

    $sql2 = "INSERT INTO order_sz (Pay_ID, C_ID, P_ID) VALUES('$Pay_ID', '$C_ID', '$P_ID')";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        header("location:orderCal.php?Pay_ID=$Pay_ID&C_ID=$C_ID&P_ID=$P_ID");
    }
}

else
{
    $sql = "SELECT * FROM cart WHERE C_ID = $C_ID";
    $result = mysqli_query($conn, $sql);
    

    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $P_ID = $row['P_ID']; // Retrieve the P_ID from the fetched row

            $sql2 = "INSERT INTO order_sz (Pay_ID, C_ID, P_ID) VALUES('$Pay_ID', '$C_ID', '$P_ID')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("location:orderCal.php?Pay_ID=$Pay_ID&C_ID=$C_ID");
            }
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
