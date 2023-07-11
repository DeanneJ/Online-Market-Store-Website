<?php
include 'config.php';

if (isset($_POST['submit'])) {
    // Retrieve the form data
    $Full_Name = $_POST['Full_Name'];
    $Business_Name = $_POST['Business_Name'];
    $Contact_No = $_POST['Contact_No'];
    $Seller_Address = $_POST['Seller_Address'];
    $Country = $_POST['Country'];
    $Email = $_POST['Email'];
    $Seller_Username = $_POST['Seller_Username'];
    $Seller_Password = $_POST['Seller_Password'];


    // Prepare and execute the SQL query
    $sql = "INSERT INTO `Seller` (Full_Name, Business_Name, Contact_No, Seller_Address, Country, Email, Seller_Username, Seller_Password) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss", $Full_Name, $Business_Name, $Contact_No, $Seller_Address, $Country, $Email, $Seller_Username, $Seller_Password);

    if (mysqli_stmt_execute($stmt)) {
        // Retrieve the auto-incremented S_ID
        $S_ID = mysqli_insert_id($conn);
        // Redirect to the seller profile page
        header("Location: profileSeller.php?S_ID=$S_ID");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopZilla-Seller Sign Up</title>
    <link href="Styles/signupSeller.css" rel="stylesheet">
    <?php include "headerSellerBeforeLogin.php";?>              <!--header file-->
</head>

<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
    
    <div class="container">
        <br><br>
    <h1>ShopZilla Seller Centre</h1>

        <h2>Sign Up</h2><br>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm();">             <!--form started-->
            <div class="mb-3">
                <label>Full Name</label>
                <input class="details" type="text" name="Full_Name" placeholder="Enter full name" required>
            </div><br>

            <div class="mb-3">
                <label>Business Name</label>
                <input class="details" type="text" name="Business_Name" placeholder="Enter business name" required>
            </div><br>

            <div class="mb-3">
                <label>Contact No.</label>
                <input class="details" type="tel" name="Contact_No" placeholder="Enter contact no" required>
            </div><br>

            <div class="mb-3">
                <label>Address</label>
                <input class="details" type="text" name="Seller_Address" placeholder="Enter address" required>
            </div><br>


            <div class="mb-3">
                <label>Country.</label>
                <select name="Country" class="details" required>
                    <option value="" selected disabled> Country </option>
                    <option value="australia"> Australia </option>
                    <option value="india"> India</option>
                    <option value="pakistan"> Pakistan </option>
                    <option value="sri lanka"> Sri Lanka</option>
                    <option value="UK"> United Kingdom </option>
                    <option value="USA"> USA </option>
                </select>
            </div><br>

            <div class="mb-3">
                <label>Email</label>
                <input class="details" type="email" name="Email" placeholder="Enter email" required>
            </div><br>

            <div class="mb-3">
                <label>Username</label>
                <input class="details" type="text" name="Seller_Username" placeholder="Enter username" required>
            </div><br>

            <div class="mb-3">
                <label>Password</label>
                <input class="details" type="password" name="Seller_Password" placeholder="Enter password" required>
            </div><br>

           Terms and Conditions:

            <textarea id="textarea" name="terms" rows="10" cols="200" readonly>
                1. Provide accurate information and pay any necessary fees.
                2. Fulfill orders promptly, and prioritize customer satisfaction.
                3. Follow guidelines for copyrights and product images.
                4. Comply with restrictions on prohibited items.
                5. Provide accurate descriptions.
                6. Understand and comply with the platform's fee structure
                 and payment policies.
                7. Take responsibility for your products and activities, 
                and indemnify the platform against any claims or losses.
                8. Account may be terminated for violations, fraud, or 
                failure to meet performance standards.
                9. Understand how personal information and customer data
                 will be collected, used, and stored.
                10. Follow the specified procedures for resolving disputes.
                11.The platform has the right to update the terms
                 and conditions, and sellers will be notified of any changes.
            </textarea><br>

            <input type="checkbox" name="agree" value="a" required /> Agree<br><br>                                      <!--agree checkbox-->
           <input type="submit" name="submit" class="sign_up" value="Sign Up" >               <!--sign up button-->
        </form><br>        <!--form ended-->

        <h4>Already a user? <a href="loginSeller.php" target="_blank"> Login </a></h4>             <!--login link-->
    </div>

    <?php include("footer.php") ?>                        <!--footer file-->

   <!-- JavaScript code to display the message related to password requirements and agree checkbox -->
   <script>
        function validateForm() {
            var agree = document.forms[0].agree.checked;
            var password = document.forms[0].Seller_Password.value;

            if (!agree) {
                alert("Please agree to the terms and conditions.");
                return false;
            }

            // Check password requirements
            var passwordPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
            if (!passwordPattern.test(password)) {
                alert("Password must contain at least 8 characters, one special character, and one number.");
                return false;
            }
        }
    </script>
</body>

</html>


