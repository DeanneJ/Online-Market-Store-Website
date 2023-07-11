<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/profileCustomer.css">
    <script src="js/profileCustomer.js"></script>
    <title>Customer Profile</title>
</head>

<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">

    <?php
    include_once 'headerCustomerAfterLogin.php';
    require_once 'includes/profileCustomer.inc.php';
    ?>

    <div class="profile-container">

        <center><h1>Customer Profile</h1></center>

        <div class="profile-details">
            <label>Name:</label>
            <label><?php echo $C_Name; ?></label>
        </div>

        <div class="profile-details">
            <label>Email:</label>
            <label><?php echo $C_Email; ?></label>
        </div>

        <div class="profile-actions">
            <button onclick="showEditProfileForm()">Edit Profile</button>
            <button onclick="showChangePasswordForm()">Change Password</button>
            <form action="includes/delete-profileCustomer.inc.php" method="POST">
                <button type="submit" name="deleteProfileSubmit"
                        onclick="return confirm('Are you sure you want to delete your account?')">Delete Profile</button>
              
            </form>
        </div>

        <!-- Edit Profile Form -->
        <div id="editProfileForm">
            <center>
            <h2>Edit Profile</h2>
            <form action="includes/edit-profileCustomer.inc.php" method="POST">
            
                <input type="text" name="C_newName" placeholder="New Name" required>
                <input type="email" name="C_newEmail" placeholder="New Email" required>
                <center><button type="submit" name="editProfileSubmit">Save Changes</button></center>
            </form>
            <center>
        </div>

        <!-- Change Password Form -->
        <div id="changePasswordForm">
            <center>
            <h2>Change Password</h2>
            <form action="includes/change-passwordCustomer.inc.php" method="POST">
           
                <input type="password" name="C_CurrentPassword" placeholder="Current Password" required>
                <input type="password" name="C_NewPassword" placeholder="New Password" required>
                <input type="password" name="C_ConfirmPassword" placeholder="Confirm Password" required>
                <center><button type="submit" name="changePasswordSubmit">Change Password</button></center>
            </form>
</center>
        </div>

    </div>

    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "sqlerror") {
            echo '<div class="error">Error!</div>';
        } else if ($_GET["error"] == "wrongpassword") {
            echo '<div class="error">Wrong password!</div>';
        } else if ($_GET["error"] == "passwordmismatch") {
            echo '<div class="error">Password mismatch!</div>';
        }
    }
    if (isset($_GET["success"])) {
        if ($_GET["success"] == "profileupdated") {
            echo '<div class="success">Profile updated!</div>';
        } else if ($_GET["success"] == "passwordchanged") {
            echo '<div class="success">Password changed!</div>';
        }
    }
    ?>

    <?php
    include_once 'footer.php';
    ?>

</body>

</html>


