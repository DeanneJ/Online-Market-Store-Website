<?php
session_start();

if (!isset($_POST["editProfileSubmit"])) {
    header("Location: ../profile.php");
    exit();
}

require_once 'config.php';

// Retrieve the new name and email from the form
$C_newName = $_POST['C_newName'];
$C_newEmail = $_POST['C_newEmail'];

// Update the user's name and email in the database
$sql = "UPDATE customer SET C_Name = ?, C_Email = ? WHERE C_ID = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../profile.php?error=sqlerror");
    exit();
}
mysqli_stmt_bind_param($stmt, "ssi", $C_newName, $C_newEmail, $_SESSION["C_ID"]);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Redirect the user back to the profile page with a success message
header("Location: ../profile.php?success=profileupdated");
exit();
?>
