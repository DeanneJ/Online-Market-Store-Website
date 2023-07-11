<?php
session_start();

if (!isset($_POST["deleteProfileSubmit"])) {
    header("Location: ../profileCustomer.php");
    exit();
}

require_once 'config.php';

// Delete the user profile and data from the database
$sql = "DELETE FROM customer WHERE C_ID = ?";

//creating a new statement
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("Location: ../homeCustomer.php?error=sqlerror");
    exit();

}

//creating the statement and the datatype
mysqli_stmt_bind_param($stmt, "i", $_SESSION["C_ID"]);

//sends the message to the database
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Destroy the session
session_destroy();

// Redirect the user to the login page with a success message
header("Location: ../homeCustomer.php?success=profiledeleted");
exit();
?>

