<?php

    //Kaveeshwara K.A.Y.P - IT22641960

    
    include_once 'config.php';
    
    //The values of Fed_ID and C_ID are retrieved from the form submission.
    $Fed_ID = $_POST["Fed_ID"];
    $C_ID = $_POST["C_ID"];

    // Retrieve the form data
    $Fed_Name = $_POST["field1"];
    $Fed_Email = $_POST["field2"];
    $Fed_Product_or_Store = $_POST["field3"];
    $Fed_Title = $_POST["field4"];
    $Fed_Description = $_POST["field5"];    
    $Fed_Rating = $_POST["rating"];

    // Prepare the SQL statement with placeholders
    $sql = "UPDATE Feedback SET
        Fed_Name = ?,
        Fed_Email = ?,
        Fed_Product_or_Store = ?,
        Fed_Title = ?,
        Fed_Description = ?,
        Fed_Rating = ?
        WHERE Fed_ID = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind parameters to the statement     ("ssssssi", which indicates that there are seven parameters to bind. The data type "s" represents a string.)
        $stmt->bind_param("ssssssi", $Fed_Name, $Fed_Email, $Fed_Product_or_Store, $Fed_Title, $Fed_Description, $Fed_Rating, $Fed_ID);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Feedback Updated Successfully!')</script>";
            echo "<script>window.location.href = 'feedbackList.php?C_ID=" . urlencode($C_ID) . "';</script>";
            exit;
        } else {
            echo "<script>alert('Error updating feedback!')</script>";
            echo "<script>window.location.href = 'feedbackList.php?C_ID=" . urlencode($C_ID) . "';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Error preparing statement!')</script>";
        echo "<script>window.location.href = 'Feedback.php?C_ID=" . urlencode($C_ID) . "';</script>";
        exit; // Add exit to prevent further execution
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
?>
