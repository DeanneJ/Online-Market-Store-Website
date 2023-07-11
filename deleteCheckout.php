<?php
      require 'config.php';
      
    

      if (isset($_GET['Pay_ID'])) {
        $Pay_ID=$_GET['Pay_ID'];
        
        
        // Delete the order from the payment table using the provided ID
        $sql = "DELETE FROM `payment` WHERE `Pay_ID` ='$Pay_ID'";
      
        if ($conn->query($sql) === TRUE) {
          // Order Details deleted successfully
          header('location:checkout.php');
        } else {
          echo "Error deleting user: ".$conn->error;
        }
        
      }

    ?>