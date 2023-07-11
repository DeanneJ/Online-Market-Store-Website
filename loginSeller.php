<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'config.php'; // Include the file that establishes the database connection

    $Seller_Username = $_POST["Seller_Username"];
    $Seller_Password = $_POST["Seller_Password"];

    $sql = "SELECT * FROM Seller WHERE Seller_Username = '$Seller_Username' AND Seller_Password = '$Seller_Password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Fetch the Seller ID from the result
        $row = $result->fetch_assoc();
        $S_ID = $row['S_ID'];

        // Redirect to profileSeller.php with the Seller ID as a parameter
        header("Location: profileSeller.php?S_ID=$S_ID");
        exit();
    } else {
        $is_invalid = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">




<head>
    <title>ShopZilla-Seller Login</title>
    <!--header file-->
    <?php include "headerSellerBeforeLogin.php";?>
    <link href="Styles/loginSeller.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                          
    <script>
        function displayMessage() {
            alert("Relax! Try to remember your password.");
        }
    </script>

</head>


<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
    

    <div class="container">
    <h1>ShopZilla Seller Centre</h1>
        <h2>Login</h2>
        
         <!--check whether the entered username and password are already the Seller table-->
        <?php if ($is_invalid): ?>
            <p>Invalid username or password</p>
        <?php endif; ?>

        <form method="POST">

            <div class = "form-group">
            <label for = "username" style = "font-size: 140%;">Username:</label>
            <input id="username_password" type="text" name="Seller_Username" placeholder="Enter username">
            </div><br>


            <div class = "form-group">
            <label for = "password" style = "font-size: 140%;">Password:</label>
            <input id="username_password" type="password" name="Seller_Password" placeholder="Enter password"><br><br>
            </div>


           
           <a href="#" onclick="displayMessage()" class="forgot_password">Forgot password?</a>
            <input type="checkbox" name="agree" value="a" class="forgot_password"> Remember me  <br><br>
            <button type="submit" name="submit" onclick="return validateForm();"> Submit </button>

          <br>
            <h4 class="signin_link">Not a member? <a href="signupSeller.php">Sign up</a></h4>          <!--sign up link-->
        </form>
    </div>

    <?php include "footer.php"?>    <!--footer file-->

</body>

</html>
