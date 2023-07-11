

<?php
include 'config.php';

$S_ID = $_GET['S_ID'] ?? '';

// Prepare the query using a prepared statement
$sql = "SELECT * FROM `Seller` WHERE S_ID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $S_ID);
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_assoc($result); // Fetch the row
?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopZilla - Seller Profile</title>
    <link href="Styles/profileSeller.css" rel="stylesheet" />
    
    <?php include 'headerSellerAfterLogin.php'; ?> <!-- header file -->
</head>

<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
    <h1>Seller Profile</h1>

    <div class="container">
        <?php if ($row) { ?>
            <div class="profile-container">
                <div class="profile-info">
                    <h2>Seller Name</h2>
                    <p><?php echo $row['Full_Name']; ?></p>
                </div>
                <div class="profile-info">
                    <h2>Business Name</h2>
                    <p><?php echo $row['Business_Name']; ?></p>
                </div>
                <div class="profile-info">
                    <h2>Contact No.</h2>
                    <p><?php echo $row['Contact_No']; ?></p>
                </div>
                <div class="profile-info">
                    <h2>Address</h2>
                    <p><?php echo $row['Seller_Address']; ?></p>
                </div>
                <div class="profile-info">
                    <h2>Country</h2>
                    <p><?php echo $row['Country']; ?></p>
                </div>
                <div class="profile-info">
                    <h2>Email</h2>
                    <p><?php echo $row['Email']; ?></p>
                </div>
                <div class="profile-info" hidden>
                    <h2>Username</h2>
                    <p><?php echo $row['Seller_Username']; ?></p>
                </div>
                <div class="profile-info" hidden>
                    <h2>Password</h2>
                    <p><?php echo $row['Seller_Password']; ?></p>
                </div>
            </div>
            <br>
            <div class="profile-actions">
                <a href="updateSeller.php?S_ID=<?php echo $row['S_ID']; ?>" class="update">Update</a>
         
            <a href="deleteSeller.php?S_ID=<?php echo $row['S_ID']; ?>" class = "delete" onclick="return confirm('Are you sure you want to delete your account?')">Delete</a>
        </div>

        <?php } else { ?>
            <p>No data found.</p>
        <?php } ?>
    </div>

    <?php include "footer.php"; ?> <!-- footer file -->
</body>

</html>
