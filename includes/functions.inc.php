<?php
function emptyInputSignup($C_Name,$C_Email,$C_Username,$C_Password,$C_Password_Repeat)
{
    $result;
    if (empty($C_Name) || empty($C_Username) || empty($C_Password) || empty($C_Password_Repeat))
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}
function invalidUid($C_Username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/",$C_Username))
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}
function invalidEmail($C_Email)
{
    $result;
    if (!filter_var($C_Email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}
function pwdMatch($C_Password,$C_Password_Repeat)
{
    $result;
    if ($C_Password!== $C_Password_Repeat){
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}

function uidExists($conn,$C_Username,$C_Email)
{
   $sql = "SELECT * FROM customer  WHERE C_Username = ? OR C_Email = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("Location:../signup.php?error=stmtfailed");
    exit();
   }
   mysqli_stmt_bind_param($stmt,"ss", $C_Username,$C_Email);
   mysqli_stmt_execute($stmt);
   $resultData = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultData))
   {
    return $row;
   }
   else {
    return false;
   }

   mysqli_stmt_close($stmt);
}

function createuser($conn,$C_Name,$C_Email,$C_Username,$C_Password)
{
    $sql = "INSERT INTO customer (C_Name,C_Email,C_Username,C_Password) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("Location:../signup.php?error=stmtfailed");
    exit();
   }
   //IN THE DATABASE, THEY CANNOT VIEW THE PASSWORD
   $hashedPwd = password_hash($C_Password, PASSWORD_DEFAULT);
   mysqli_stmt_bind_param($stmt,"ssss",$C_Name,$C_Email,$C_Username,$hashedPwd);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("Location:../login.php?error=none");
   exit ();

}
function emptyInputLogin($C_Username,$C_Password)
{
    $result;
    if ( empty($C_Username) || empty($C_Password) )
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}
function LoginUser($conn,$C_Username,$C_Password)
{
     $uidExists = uidExists($conn,$C_Username,$C_Password);
     if ($uidExists === false)
     {
        header("location:../login.php?error=wronglogin");
        exit();
     }
     $pwdHashed = $uidExists ["C_Password"];
     $checkPwd = password_verify($C_Password,$pwdHashed);

     if ($checkPwd === false )
     {
        
        header("location:../login.php?error=wronglogin");
        exit();
     } else if ($checkPwd === true) {
        session_start();
        $_SESSION["C_ID"] = $uidExists["C_ID"];
        $_SESSION["C_Username"] = $uidExists["C_Username"];
        $_SESSION["C_Name"] = $uidExists["C_Name"];
        header("Location:../home.php");
        exit();




     }
}