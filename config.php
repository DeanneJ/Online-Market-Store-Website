<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $database = "shopzilla";

    //create connection
    $conn = new mysqli($servername, $username, $password, $database);

   if(!$conn)
   {
       die (mysqli_error($conn));
   }
?>