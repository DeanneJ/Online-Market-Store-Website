
<?php
 //without submitting the login cannot enter to this page
 if (isset($_POST["submit"] )) {

    $C_Username = $_POST["C_Username"];
    $C_Password = $_POST["C_Password"];

    // to use the database connection
    require_once 'config.php';
    require_once 'functions.inc.php';
    $emptyInput = emptyInputLogin( $C_Username, $C_Password);

     if (emptyInputLogin($C_Username, $C_Password) !== false)
     {
       header('Location:../login.php?error=emptyinput');
        exit();
     }

     loginUser($conn,$C_Username, $C_Password);


 }
 else {
    header('Location:../login.php');
 }