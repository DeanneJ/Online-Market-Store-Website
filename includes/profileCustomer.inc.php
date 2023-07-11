<?php


if (!isset($_SESSION["C_ID"])) {
  header("Location: loginCustomer.php");
  exit();
}

require_once 'config.php'; // connect with the database

$sql = "SELECT * FROM customer WHERE C_ID = ?"; // retrieve data from the table in database using a SQL Statement

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {

  header("Location: ../homeCustomer.php?error=sqlerror");
  exit();

}

mysqli_stmt_bind_param($stmt, "i", $_SESSION["C_ID"]);  //  explain bind parameter fuction

mysqli_stmt_execute($stmt);  // execution of the statement

$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

  // get data in database to PHP variables
  $C_Name = $row['C_Name'];
  $C_Email = $row['C_Email'];

} else {

  // direct user into login page if data is not fetched from the database correctly
  header("Location: loginCustomer.php");
  exit();

}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>