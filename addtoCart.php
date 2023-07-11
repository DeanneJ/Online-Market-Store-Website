<?php
    include 'config.php';

    $C_ID = $_GET['C_ID']; 
    $P_ID = $_GET['P_ID'];   

    $sql = "INSERT INTO cart (C_ID, P_ID) VALUES ($C_ID, $P_ID)";

    $result = mysqli_query($conn, $sql);

    if ($result) 
    {
        header('location:itemDescription.php?C_ID='.$C_ID.'&P_ID='.$P_ID.'');
    } 
    
    else 
    {
        die(mysqli_error($conn));
    }
?>


