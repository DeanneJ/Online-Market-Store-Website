<?php

//Kaveeshwara K.A.Y.P - IT22641960

    include_once 'config.php';

    $C_ID = $_GET["C_ID"];

    // Display the previous data 
    $sql = "SELECT * FROM customer WHERE C_ID=$C_ID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);    
    
    $C_ID = $row['C_ID']; 
    $C_Email = $row['C_Email'];
    $C_Name = $row['C_Name'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feedback</title>

        <!-- Calling header.php -->
        <?php
            $C_ID = $_GET['C_ID'];
            include 'headerCustomerAfterLogin.php';         
        ?>
        <link rel="stylesheet" type="text/css" href="Styles/feedback.css">
    </head>
    <body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
        
        <div class="container">
            <h1>Feedback</h1>

            <!-- Feedback form -->
            <form action="submitFeedback.php" method="POST">
                <input type="hidden" name="C_ID" value="<?php echo $C_ID; ?>"> <!-- Add C_ID as a hidden input field -->

                <div class="form-group">
                    <label class="label" for="name" style="font-size: 140%; text-align: left; align-items: left;">Name:</label> <br>
                    <input type="text" name="field1" value="<?php echo $C_Name;?>" readonly>
                </div>
                <div class="form-group">
                    <label class="label" for="email" style="font-size: 140%; text-align: left;">Email:</label> <br>
                    <input type="email" name="field2" value="<?php echo $C_Email;?>" readonly>
                </div>
                <div class="form-group">
                    <label class="label" for="product" style="font-size: 140%; text-align: left;">Product / Store:</label> <br>
                    <input type="text" name="field3" required>
                </div>
                <div class="form-group">
                    <label class="label" for="title" style="font-size: 140%;">Title:</label> <br>
                    <input type="text" name="field4" required>
                </div>
                <div class="form-group">
                    <label class="label" for="description" style="font-size: 140%;">Description:</label>
                    <textarea name="field5" required></textarea>
                </div>
                <div class="form-group"> <!--Rating buttons-->
                    <label class="label" for="rating" style="font-size: 140%;">Rating:</label>
                    <div class="rating">
                        <span class="star-rating">
                            <input type="radio" name="rating" value="1" required><i></i>
                            <input type="radio" name="rating" value="2"><i></i>
                            <input type="radio" name="rating" value="3"><i></i>
                            <input type="radio" name="rating" value="4"><i></i>
                            <input type="radio" name="rating" value="5"><i></i>
                        </span>
                    </div>
                </div>
                <center><br><button type="submit" name="submit">Submit</button></center>

                <!--  button with redirection with C_ID-->
                <center><a class="my-feedback" style="margin-top: 10px;" href="feedbackList.php?C_ID=<?php echo urlencode($C_ID); ?>">View My Feedbacks</a></center> 
            </form>
        </div>
        <?php include "footer.php" ?>  <!-- Calling footer.php -->
    </body>
</html>
