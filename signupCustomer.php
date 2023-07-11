<?php
 include_once 'headerCustomerBeforeLogin.php';
?>
<link rel="stylesheet" href="Styles/formCustomer.css">
<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">

 
 <div class="container">
    <h1>ShopZilla</h1>
    
<form action="includes/signupCustomer.inc.php" method="post">
    
<div class="form-group">
    <label class="label" for="C_Name" style="font-size: 140%; text-align: left; align-items: left;">Name:</label> <br>
    <input type="text" id="C_Name" name="C_Name" placeholder="Name">
</div>

<div class="form-group">
    <label class="label" for="C_Email" style="font-size: 140%; text-align: left; align-items: left;">Email:</label> <br>
    <input type="text" id="C_Email" name="C_Email" placeholder="Email">
    </div>

    <div class="form-group">
    <label class="label" for="C_Username" style="font-size: 140%; text-align: left; align-items: left;">Username:</label> <br>
    <input type="text" id="C_Username" name="C_Username" placeholder="Username">
    </div>

    <div class="form-group">
    <label class="label" for="C_Password" style="font-size: 140%; text-align: left; align-items: left;">Password:</label> <br>
    <input type="password" id="C_Password" name="C_Password" placeholder="Password">
    </div>

    <div class="form-group">
    <label class="label" for="C_Password_Repeat" style="font-size: 140%; text-align: left; align-items: left;">Repeat Password:</label> <br>
    <input type="password" id="C_Password_Repeat" name="C_Password_Repeat" placeholder="Repeat Password">
    </div>

        <center><p><br>Already have an account? <a href="loginCustomer.php"> Log in.</p></center>
        <center><br><button name="submit" type="submit">Register</button></center>
        

  </form>
</div>

 
 <?php
 if(isset($_GET["error"]))
 {
    if ($_GET["error"] == "emptyinput")
    {
        echo '<div class="error">Fill in the all fields</div>';
    }
    else if ($_GET["error"] == "invaliduid")
    {
        echo '<div class="error"> Invalid Username! </div>';
    }
    else if ($_GET["error"] == "invalidemail")
    {
        echo '<div class="error">Invalid Email! </div>';
    }
    else if ($_GET["error"] == "passwordsdontmatch")
    {
        echo '<div class="error">Passwords not matching! </div>';
    }
    else if ($_GET["error"] == "stmtfailed")
    {
        echo '<div class="error">Something went wrong! </div>';
    }
    else if ($_GET["error"] == "none")
    {
        echo '<div class="error">Account Created </div>';
    }
    else if ($_GET["error"] == "usernametaken")
    {
        echo '<div class="error">Username/Email already in use </div>';
    }
 }
?>
 

<?php
 include_once 'footer.php';
 ?>