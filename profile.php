<?php
include_once 'headerCustomerAfterLogin.php';
require_once 'includes/profile.inc.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/profile.css">
    <script src="js/profile.js"></script>
    <title>Customer Profile</title>
</head>
<body>
    <div class="profile-container">
        <h1>Customer Profile</h1>
        <div class="profile-details">
            <label>Name:</label>
            <span><?php echo $C_Name; ?></span>
        </div>
        <div class="profile-details">
            <label>Email:</label>
            <span><?php echo $C_Email; ?></span>
        </div>
        <div class="profile-actions">
            <button onclick="showEditProfileForm()">Edit Profile</button>
            <button onclick="showChangePasswordForm()">Change Password</button>
           
        </div>

        <!-- Edit Profile Form -->
        <div id="editProfileForm">
            <h2>Edit Profile</h2>
            <form action="includes/edit-profile.inc.php" method="POST">
                <input type="text" name="C_newName" placeholder="New Name" required>
                <input type="email" name="C_newEmail" placeholder="New Email" required>
                <button type="submit" name="editProfileSubmit">Save Changes</button>
            </form>
        </div>

        <!-- Change Password Form -->
        <div id="changePasswordForm">
            <h2>Change Password</h2>
            <form action="includes/change-password.inc.php" method="POST">
                <input type="password" name="C_CurrentPassword" placeholder="Current Password" required>
                <input type="password" name="C_NewPassword" placeholder="New Password" required>
                <input type="password" name="C_ConfirmPassword" placeholder="Confirm Password" required>
                <button type="submit" name="changePasswordSubmit">Change Password</button>
            </form>
        </div>
    </div>
    <?php
    if(isset($_GET["error"])) {
        if ($_GET["error"] == "sqlerror") {
            echo '<div class="error">Error!</div>';
        } else if ($_GET["error"] == "wrongpassword") {
            echo '<div class="error">Wrong password!</div>';
        } else if ($_GET["error"] == "passwordmismatch") {
            echo '<div class="error">Password mismatch!</div>';
        }
    }
    if(isset($_GET["success"])) {
        if ($_GET["success"] == "profileupdated") {
            echo '<div class="success">Profile updated!</div>';
        } else if ($_GET["success"] == "passwordchanged") {
            echo '<div class="success">Password changed!</div>';
        }
    }
    ?>
</body>
</html>




