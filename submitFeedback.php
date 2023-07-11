<?php

    //Kaveeshwara K.A.Y.P - IT22641960

    
    include_once 'config.php';

    // Retrieve the feedback data from the form
    $C_ID = $_POST["C_ID"];
    $Fed_Name = htmlspecialchars($_POST["field1"]);          //    htmlspecialchars() to prevent potential HTML or XSS attacks.
    $Fed_Email = htmlspecialchars($_POST["field2"]);
    $Fed_Product_or_Store = htmlspecialchars($_POST["field3"]);
    $Fed_Title = htmlspecialchars($_POST["field4"]);
    $Fed_Description = htmlspecialchars($_POST["field5"]);
    $Fed_Rating = $_POST["rating"];

    // Prepared with parameter binding to insert the feedback data into the 'Feedback' table. (The placeholders '?' are used for the parameterized values, which will be bound later)
    $stmt = $conn->prepare("INSERT INTO Feedback (Fed_ID, C_ID, Fed_Name, Fed_Email, Fed_Product_or_Store, Fed_Title, Fed_Description, Fed_Rating) 
                            VALUES ('', ?, ?, ?, ?, ?, ?, ?)");

    // The parameters are bound to the prepared statement using bind_param(). ('isssss' is spesify data types of values. 'i'=integer  's' = string)
    $stmt->bind_param("isssssi", $C_ID, $Fed_Name, $Fed_Email, $Fed_Product_or_Store, $Fed_Title, $Fed_Description, $Fed_Rating);

    // Execute the statement using execute().
    if ($stmt->execute()) {
        $Fed_ID = mysqli_insert_id($conn); // Get the auto-generated feedback ID
        
        // Display a confirmation message and redirect the user based on their choice
        echo "<script>
                var confirmation = confirm('Feedback Received Successfully! Do you want to update or remove your feedback?'); 
                if (confirmation) {
                    window.location.href = 'feedbackList.php?C_ID=$C_ID';
                } else {
                    window.location.href = 'feedback.php?C_ID=$C_ID';
                }
            </script>";

    } else {
        // Display the specific error message
        echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    mysqli_close($conn);
?>
