<?php
 //without submitting the login cannot enter to this page
 if (isset($_POST["submit"] )) {

    $C_Name = $_POST["C_Name"];
    $C_Email = $_POST["C_Email"];
    $C_Username = $_POST["C_Username"];
    $C_Password = $_POST["C_Password"];
    $C_Password_Repeat = $_POST["C_Password_Repeat"];
    

    // to use the database connection
    require_once 'config.php';
    require_once 'functionsCustomer.inc.php';

    $emptyInput = emptyInputSignup($C_Name,$C_Email,$C_Username,$C_Password,$C_Password_Repeat);
    $invalidUid = invalidUid($C_Username);
    $invalidEmail = invalidEmail($C_Email);
    $pwdMatch = pwdMatch($C_Password,$C_Password_Repeat);
    $uidExists = uidExists($conn,$C_Username,$C_Email);

     if ($emptyInput !== false)
     {
        header("Location:../signupCustomer.php?error=emptyinput");
        exit();
     }
     if ($invalidUid !== false)
     {
        header("Location:../signupCustomer.php?error=invalidUid");
        exit();
     }
     if ($invalidEmail !== false)
     {
        header("Location:../signupCustomer.php?error=invalidemail");
        exit();
     }
     if ($pwdMatch !== false)
     {
        header("Location:../signupCustomer.php?error=passworddontmatch");
        exit();
     }
     if ($uidExists !== false)
     {
        header("Location:../signupCustomer.php?error=usernametaken");
        exit();
     }

     createuser($conn,$C_Name,$C_Email,$C_Username,$C_Password);

     


 }
 else {
    header('Location:../loginCustomer.php');
 }