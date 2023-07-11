<?php

    //Kaveeshwara K.A.Y.P - IT22641960

    
    include_once 'config.php';

    $Fed_ID = $_GET["Fed_ID"];  // Retrieve the feedback ID from the URL parameter
    if (isset($_GET['C_ID'])) {
        $C_ID = $_GET['C_ID'];

    } else {
        echo "<script>alert('Error reading feedback!')</script>";  // Handle the case when $C_ID is not set, display an error message and redirect the user
        echo "<script>window.location.href = 'feedback.php?C_ID=" . urlencode($C_ID) . "';</script>";
    }
    
    // Retrieve the feedback from the database using the feedback ID
    $sql = "SELECT * FROM Feedback WHERE Fed_ID = '$Fed_ID'";
    $result = mysqli_query($conn, $sql);
    $feedback = mysqli_fetch_assoc($result);

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Submitted Feedback</title>
        <link rel="stylesheet" type="text/css" href="Styles/feedback.css">
        <?php
            $C_ID = $_GET['C_ID'];
            include 'headerCustomerAfterLogin.php';
            
        ?>  <!-- Calling headerer.php -->
    </head>

    <body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
        
        <div class="container">
            <h1>Submitted Feedback</h1>

            <!-- Feedback form with pre-filled values -->
            <form action="updateFeedback.php" method="POST">

                <input type="hidden" name="Fed_ID" value="<?php echo $Fed_ID; ?>">
                <input type="hidden" name="C_ID" value="<?php echo $C_ID; ?>">

                <div class="form-group">
                    <label for="name" style="font-size: 140%;">Name :</label> <br>
                    <input type="text" name="field1" value="<?php echo $feedback['Fed_Name']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="email" style="font-size: 140%;">Email :</label> <br>
                    <input type="text" name="field2" value="<?php echo $feedback['Fed_Email']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="product" style="font-size: 140%;">Product/Store :</label> <br>
                    <input type="text" name="field3" value="<?php echo $feedback['Fed_Product_or_Store']; ?>">
                </div>

                <div class="form-group">
                    <label for="title" style="font-size: 140%;">Title :</label> <br>
                    <input type="text" name="field4" value="<?php echo $feedback['Fed_Title']; ?>" >
                </div>

                <div class="form-group">
                    <label for="description" style="font-size: 140%;">Description :</label> <br>
                    <textarea name="field5"><?php echo $feedback['Fed_Description']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="rating" style="font-size: 140%;">Rating :</label>
                    <div class="rating">
                        <center>
                            <!-- Radio buttons for selecting the rating -->
                            <span class="star-rating">
                                <input type="radio" name="rating" value="1" <?php if ($feedback['Fed_Rating'] == 1) echo 'checked'; ?>><i></i>
                                <input type="radio" name="rating" value="2" <?php if ($feedback['Fed_Rating'] == 2) echo 'checked'; ?>><i></i>
                                <input type="radio" name="rating" value="3" <?php if ($feedback['Fed_Rating'] == 3) echo 'checked'; ?>><i></i>
                                <input type="radio" name="rating" value="4" <?php if ($feedback['Fed_Rating'] == 4) echo 'checked'; ?>><i></i>
                                <input type="radio" name="rating" value="5" <?php if ($feedback['Fed_Rating'] == 5) echo 'checked'; ?>><i></i>
                            </span>
                        </center>
                    </div>
                </div>

                <center>
                    <br>
                    <button type="submit" name="update">Update</button>    <!-- update button -->
                </center>
            </form>
        </div>

        <?php include "footer.php" ?>  <!-- Calling footer.php -->
    </body>
</html>
