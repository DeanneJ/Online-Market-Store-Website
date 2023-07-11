<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="Styles/formCustomer.css">
<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
<?php
 include_once 'headerCustomerBeforeLogin.php';
?>
    
    <div class="container">
    <h1>ShopZilla</h1>

<form action="includes/loginCustomer.inc.php" method="post">
    <div class="form-group">
    <label class="label" for="C_Username" style="font-size: 140%; text-align: left; align-items: left;">Email/Username:</label> <br>
    <input type="text" id="C_Username" name="C_Username" placeholder="Email/Username">
    </div>

    <div class="form-group">
    <label class="label" for="C_Password" style="font-size: 140%; text-align: left; align-items: left;">Password:</label> <br>
    <input type="password" id="C_Password" name="C_Password" placeholder="Password">
    </div>

    <center><p><br>New Here? <a href="signupCustomer.php">Register</a> </p><center>
    <center><br><button name="submit" type="submit">Login</button></center>

  </form>
</div>


  <?php
 if(isset($_GET["error"]))
 {
    if ($_GET["error"] == "emptyinput")
    {
        echo '<div class="error">Fill in the all fields</div>';
    }
    else if ($_GET["error"] == "wronglogin")
    {
        echo '<div class="error"> Invalid Details! </div>';
    }
    
    else if ($_GET["error"] == "stmtfailed")
    {
        echo '<div class="error">Something went wrong! </div>';
    }
    else if ($_GET["error"] == "none")
    {
        echo '<div class="error">Account Created </div>';
    }
    
 }
?>
  

<?php
 include_once 'footer.php';
 ?>