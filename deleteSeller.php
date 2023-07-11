<?php
include 'config.php';

$S_ID = $_GET['S_ID'] ?? '';

// Prepare and execute the SQL query to delete the seller
$sql = "DELETE FROM Seller WHERE S_ID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $S_ID);

if (mysqli_stmt_execute($stmt))
{
    $sql2 = "DELETE FROM Product WHERE S_ID = ?";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt2, "s", $S_ID);

    if (mysqli_stmt_execute($stmt2)) {
        // Redirect to loginSeller.php after successful deletion
        header("Location: loginSeller.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

?>
