<?php
    include_once 'config.php';

    $S_ID = $_GET['S_ID'];

    if(isset($_POST['submit']))
    {
        $P_Name = $_POST['P_Name']; 
        $Price = $_POST['Price'];  
        $P_Availability = $_POST['P_Availability']; 
        $P_Description = $_POST['P_Description']; 
        $P_Category = $_POST['P_Category']; 
        $Category_ID = $_POST['Category_ID']; 
        $S_ID = $_POST['S_ID']; 
        $Business_Name = $_POST['Business_Name'];

        // Process image upload
        $imageName = $_FILES['Image_URL']['name'];        
        $imageTmpName = $_FILES['Image_URL']['tmp_name'];
        $imagePath = "uploads/" . $imageName;  

        move_uploaded_file($imageTmpName, $imagePath);
        

        $sql = "insert into product (P_Name, Price, P_Availability, P_Description, P_Category, Category_ID, S_ID, Business_Name, Image_URL) values('$P_Name', '$Price', '$P_Availability', '$P_Description',  '$P_Category', '$Category_ID', '$S_ID', '$Business_Name', '$imagePath')";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            //echo "Data Inserted Successfully";
            header('location:sellerProductsDisplay.php?S_ID='.$S_ID.'');
        }

        else
        {
            die (mysqli_error($conn));
        }
    }
?>