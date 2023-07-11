<?php
    include_once 'config.php';

    // Check if the C_ID parameter is set in the URL
    if (isset($_GET['C_ID'])) {
        $C_ID = $_GET['C_ID'];

        if (isset($_POST['submit'])) 
        {
            $C_Address = $_POST['C_Address'];
            $C_Zipcode = $_POST['C_Zipcode'];
            $Pay_Method = $_POST['Pay_Method'];
            $Pay_card_No = $_POST['Pay_card_No'];
            $Pay_Exp_Date = $_POST['Pay_Exp_Date'];
            $Pay_Cvv = $_POST['Pay_Cvv'];

        
            $sql = "INSERT INTO payment(C_ID, C_Address, C_Zipcode, Pay_Method, Pay_card_No, Pay_Exp_Date, Pay_Cvv) VALUES('$C_ID', '$C_Address', '$C_Zipcode', '$Pay_Method', '$Pay_card_No', '$Pay_Exp_Date', '$Pay_Cvv')";
            $result = mysqli_query($conn, $sql);

             // Prepare the INSERT statement

            if ($result) {
                // Retrieve the last inserted ID
                $PayID = mysqli_insert_id($conn);

                if(isset($_GET['P_ID']))
                {
                    $P_ID = $_GET['P_ID'];

                    header("location: order.php?Pay_ID=$PayID&C_ID=$C_ID&P_ID=$P_ID");
                }
                    
                else{
                    // Redirect to the order.php page with the Pay_ID and C_ID parameters
                    header("location: order.php?Pay_ID=$PayID&C_ID=$C_ID");
                }
                
                // Close the database connection
                mysqli_close($conn);
                exit();

            } else {
                // Handle the case when the insert query fails
                echo "Insert failed: " . mysqli_error($conn);
            }
        }
    }
?>
