<?php
    include 'config.php';

    if(isset($_GET['removeid']))
    {
        $Cart_ID = $_GET['removeid'];
        $C_ID = $_GET['C_ID'];

        $sql = "SELECT Cart_ID FROM cart WHERE Cart_ID = $Cart_ID";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        $Cart_ID = $row['Cart_ID'];

    
        $sql = "DELETE FROM cart WHERE Cart_ID = $Cart_ID";
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            //echo "Deleted Successfully";
            header('location:cart.php?C_ID='.$C_ID.'&Cart_ID='.$Cart_ID.'');
        }

        else
        {
            die (mysqli_error($conn));
        }
    }
?>