<?php
//session_start();

if (!isset($_SESSION["C_ID"])) {
  header("Location: login.php");
  exit();
}

require_once 'config.php';

// Retrieve user data from the database based on the user ID stored in the session
$sql = "SELECT * FROM customer WHERE C_ID = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("Location: ../home.php?error=sqlerror");
  exit();
}
mysqli_stmt_bind_param($stmt, "i", $_SESSION["C_ID"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
  $C_Name = $row['C_Name'];
  $C_Email = $row['C_Email'];
} else {
  // Handle the case when the user data is not found
  // For example, redirect the user to the login page
  header("Location: login.php");
  exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>