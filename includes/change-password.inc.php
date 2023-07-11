<?php
session_start();

if (!isset($_POST["changePasswordSubmit"])) {
    header("Location: ../profile.php");
    exit();
}

require_once 'config.php';

// Check if the database connection is successful
if (!$conn) {
    header("Location: ../profile.php?error=dberror");
    exit();
}

// Retrieve the current password, new password, and confirm password from the form
$C_CurrentPassword = $_POST['C_CurrentPassword'];
$C_NewPassword = $_POST['C_NewPassword'];
$C_ConfirmPassword = $_POST['C_ConfirmPassword'];

// Retrieve the user's current password from the database based on the user ID stored in the session
$sql = "SELECT C_Password FROM customer WHERE C_ID = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../profile.php?error=" . urlencode(mysqli_stmt_error($stmt)));
    exit();
}
mysqli_stmt_bind_param($stmt, "i", $_SESSION["C_ID"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Verify if the current password matches the one stored in the database
    $passwordCheck = password_verify($C_CurrentPassword, $row['C_Password']);
    if ($passwordCheck == false) {
        // Redirect the user back to the profile page with an error message
        header("Location: ../profile.php?error=wrongpassword");
        exit();
    }
} else {
    // Handle the case when the user data is not found
    // For example, redirect the user to the login page
    header("Location: ../login.php");
    exit();
}

// Validate the new password and confirm password
if ($C_NewPassword !== $C_ConfirmPassword) {
    // Redirect the user back to the profile page with an error message
    header("Location: ../profile.php?error=passwordmismatch");
    exit();
}

// Update the user's password in the database
$sql = "UPDATE customer SET C_Password = ? WHERE C_ID = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../profile.php?error=" . urlencode(mysqli_stmt_error($stmt)));
    exit();
}
$newHashedPassword = password_hash($C_NewPassword, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "si", $newHashedPassword, $_SESSION["C_ID"]);
if (!mysqli_stmt_execute($stmt)) {
    header("Location: ../profile.php?error=" . urlencode(mysqli_stmt_error($stmt)));
    exit();
}
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Redirect the user back to the profile page with a success message
header("Location: ../profile.php?success=passwordchanged");
exit();
?>



