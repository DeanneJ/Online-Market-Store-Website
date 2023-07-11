<?php
    include 'config.php';

    if(isset($_GET['deleteid']))
    {
        $P_ID = $_GET['deleteid'];

        $sql = "SELECT S_ID FROM product WHERE P_ID = $P_ID";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        $S_ID = $row['S_ID'];


        

        $sql = "delete from product where P_ID = $P_ID";
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            //echo "Deleted Successfully";
            header('location:sellerProductsDisplay.php?S_ID='.$S_ID.'');
        }

        else
        {
            die (mysqli_error($conn));
        }
    }
?>