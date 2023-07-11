<?php

    //Kaveeshwara K.A.Y.P - IT22641960


    include_once 'config.php';

    // Check if the C_ID variable is set
    if (isset($_GET["C_ID"])) {
        $C_ID = $_GET["C_ID"];    // Retrieve the value of C_ID
    
    } else {
        echo "C_ID is not set!";   // Debug output if C_ID is not set
    }

    // Retrieve the feedback from the database using the feedback ID
    $sql = "SELECT * FROM feedback WHERE C_ID = ?";
    $stmt = $conn->prepare($sql);   

    $stmt->bind_param("s", $C_ID);                          // The "s" specifies that the parameter is a string. 
    //The purpose of binding parameters is to prevent SQL injection attacks and securely pass values to the query.

    $stmt->execute();
    $result = $stmt->get_result();  //Get resulte
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Styles/feedbackList.css">
        <title> My feedback </title>
        
        <?php
            $C_ID = $_GET['C_ID'];
            include 'headerCustomerAfterLogin.php';
            
        ?>
    </head>

    <body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">

        <div class="container-layout">
            <?php
                // Check if there are no feedback entries
                if (mysqli_num_rows($result) === 0) {
                    echo '<script>alert("You have no feedbacks.")</script>';
                    echo "<script>window.location.href = 'Feedback.php?C_ID=" . urlencode($C_ID) . "';</script>"; // Redirect the user to the Feedback.php page with the C_ID parameter
                } else {
            ?>
            <table class="table">
                <tr>
                    <th style="display: none;" scope="col">Feedback ID</th>
                    <th scope="col">Product / Store</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Actions</th>
                </tr>
                
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $Fed_ID = $row['Fed_ID'];
                        $fed_Product_or_Store = $row['Fed_Product_or_Store'];
                        $Fed_Title = $row['Fed_Title'];
                        $Fed_Description = $row['Fed_Description'];
                        $Fed_Rating = $row['Fed_Rating'];

                        echo 
                            '<tr>
                                <td style="display: none;">'.$Fed_ID.'</td>
                                <td>'.$fed_Product_or_Store.'</td>
                                <td>'.$Fed_Title.'</td>
                                <td>'.$Fed_Description.'</td>
                                <td>'.$Fed_Rating.'</td>
                                <td>
                                    <button class="update-btn"><a style="color: #fff !important;" href="submittedFeedback.php?Fed_ID='.$Fed_ID.'&C_ID='.$C_ID.'">Update</a></button>
                                    <button class="delete-btn"><a style="color: #fff !important;" href="deleteFeedback.php?Fed_ID='.$Fed_ID.'&C_ID='.$C_ID.'" >Delete</a></button>
                                </td>
                            </tr>'
                        ;
                    }
                ?>
            </table>
        
            <?php
                }
            ?>
        </div>

        <?php
            $stmt->close();
            mysqli_close($conn);
            include "footer.php";
        ?>
    </body>
</html>