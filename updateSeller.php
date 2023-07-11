<?php
include 'config.php';

if (isset($_POST['submit'])) {
    // Retrieve the form data
    $S_ID = $_POST['S_ID'];
    $Full_Name = $_POST['Full_Name'];
    $Business_Name = $_POST['Business_Name'];
    $Contact_No = $_POST['Contact_No'];
    $Seller_Address = $_POST['Seller_Address'];
    $Country = $_POST['Country'];
    $Email = $_POST['Email'];
    $Seller_Username = $_POST['Seller_Username'];
    $Seller_Password = $_POST['Seller_Password'];

    // Prepare and execute the SQL query
    $sql = "UPDATE Seller SET Full_Name=?, Business_Name=?, Contact_No=?, Seller_Address=?, Country=?, Email=?, Seller_Username=?, Seller_Password=? WHERE S_ID=?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssi", $Full_Name, $Business_Name, $Contact_No, $Seller_Address, $Country, $Email, $Seller_Username, $Seller_Password, $S_ID);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect to the seller profile page
        header("Location: profileSeller.php?S_ID=" . $S_ID);
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
} else {
    // Retrieve the S_ID from the query parameter
    $S_ID = $_GET['S_ID'];

    // Fetch the seller details from the database
    $sql = "SELECT * FROM Seller WHERE S_ID=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $S_ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $seller = mysqli_fetch_assoc($result);

    if ($seller) {
        ?>
        <!DOCTYPE html>
        <html lang="en">


        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>ShopZilla - Update Seller</title>
            <link href="Styles/updateSeller.css" rel="stylesheet" />
            <?php include "headerSellerAfterLogin.php";?> <!-- header file -->
        </head>

        <body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
            <h1>Update Profile</h1>

            <div class="container my-5">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm();">
                    <input type="hidden" name="S_ID" value="<?php echo $seller['S_ID']; ?>">
                    <div class="form-group">
                        <label for="Full_Name">Full Name</label>
                        <input type="text" id="Full_Name" name="Full_Name" value="<?php echo $seller['Full_Name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Business_Name">Business Name</label>
                        <input type="text" id="Business_Name" name="Business_Name" value="<?php echo $seller['Business_Name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Contact_No">Contact No.</label>
                        <input type="text" id="Contact_No" name="Contact_No" value="<?php echo $seller['Contact_No']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Seller_Address">Address</label>
                        <input type="text" id="Seller_Address" name="Seller_Address" value="<?php echo $seller['Seller_Address']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Country.</label>
                        <select name="Country" class="details" required>
                        <option selected value="<?php echo $seller['Country']; ?>"><?php echo $seller['Country']; ?></option>
                            <option value="australia"> Australia </option>
                            <option value="india"> India</option>
                            <option value="pakistan"> Pakistan </option>
                            <option value="sri lanka"> Sri Lanka</option>
                            <option value="UK"> United Kingdom </option>
                            <option value="USA"> USA </option>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" id="Email" name="Email" value="<?php echo $seller['Email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Seller_Username">Username</label>
                        <input type="text" id="Seller_Username" name="Seller_Username" value="<?php echo $seller['Seller_Username']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Seller_Password">Password</label>
                        <input type="password" id="Seller_Password" name="Seller_Password" value="<?php echo $seller['Seller_Password']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update">
                    </div>
                </form>
            </div>

            <?php include "footer.php"; ?> <!-- footer file -->

            <!-- JavaScript code to display the message related to password requirements -->
            <script>
                function validateForm() {
                  
                    var password = document.forms[0].Seller_Password.value;

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
<?php
    } else {
        echo "Error: Seller not found.";
    }
}
?>
