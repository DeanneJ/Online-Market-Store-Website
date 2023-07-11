<?php

//Kaveeshwara K.A.Y.P - IT22641960

    include_once 'config.php';

    // Retrieve the feedback ID from the URL parameter
    $Fed_ID = $_GET["Fed_ID"];
    $C_ID = $_GET['C_ID'];

    // Prepare the SQL statement
    $sql = "DELETE FROM Feedback WHERE Fed_ID = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Bind the parameter to the statement
        mysqli_stmt_bind_param($stmt, "i", $Fed_ID);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Feedback Deleted Successfully!')</script>";
            echo "<script>window.location.href = 'feedbackList.php?C_ID=" . urlencode($C_ID) . "';</script>";
        } else {
            echo "<script>alert('Error deleting feedback!')</script>";
            echo "<script>window.location.href = 'feedbackList.php?C_ID=" . urlencode($C_ID) . "';</script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error preparing statement!')</script>";
        echo "<script>window.location.href = 'feedbackList.php?C_ID=" . urlencode($C_ID) . "';</script>";
    }

    mysqli_close($conn);
?>
