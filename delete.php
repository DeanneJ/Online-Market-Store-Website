
<?php
include 'config.php';

if (isset($_GET['deleteid'])) {
    $S_ID = $_GET['deleteid'];

    $sql = "DELETE FROM `Seller` WHERE S_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $S_ID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);

        // Perform logout operation
        session_start(); // Start the session
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session

        header('Location: login.php?deleted=1'); // Redirect to login page
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
?>
