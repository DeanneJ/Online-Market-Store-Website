
<?php
 //without submitting the login cannot enter to this page
 if (isset($_POST["submit"] )) {

    $C_Username = $_POST["C_Username"];
    $C_Password = $_POST["C_Password"];

    // to use the database connection
    require_once 'config.php';
    require_once 'functionsCustomer.inc.php';

   // handling the error if there are empty inputs
    $emptyInput = emptyInputLogin( $C_Username, $C_Password);

     if (emptyInputLogin($C_Username, $C_Password) !== false)
     {
       header('Location:../loginCustomer.php?error=emptyinput');
        exit();
     }

     // calling the function to login the user 
     loginUser($conn,$C_Username, $C_Password);


 }

 // display login page if user failed to log
 else {
    header('Location:../loginCustomer.php');
 }



