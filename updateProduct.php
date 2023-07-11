<?php
    include_once 'config.php';

    //Declare capture ID
    $P_ID = $_GET['updateid'];

    //Display the previous data 
    $sql = "select * from product where P_ID=$P_ID";
    $result = mysqli_query($conn, $sql);            
    $row = mysqli_fetch_assoc($result);    
    
    $P_Name = $row['P_Name']; 
    $Price = $row['Price'];  
    $P_Availability = $row['P_Availability']; 
    $P_Description = $row['P_Description']; 
    $P_Category = $row['P_Category']; 
    $S_ID = $row['S_ID']; 
    $Business_Name = $row['Business_Name'];
    $Image_URL = $row['Image_URL'];

    //Update Entered Data
    if(isset($_POST['submit']))
    {
        $P_Name = $_POST['P_Name']; 
        $Price = $_POST['Price'];  
        $P_Availability = $_POST['P_Availability']; 
        $P_Description = $_POST['P_Description']; 
        $P_Category = $_POST['P_Category']; 
        $S_ID = $_POST['S_ID']; 
        $Business_Name = $_POST['Business_Name'];

        $imageName = $_FILES['Image_URL']['name'];        
        $imageTmpName = $_FILES['Image_URL']['tmp_name'];
        $imagePath = "uploads/" . $imageName;  

        move_uploaded_file($imageTmpName, $imagePath);

        $sql = "update product set P_ID='$P_ID', P_Name='$P_Name', Price='$Price', P_Availability='$P_Availability', P_Description='$P_Description', P_Category='$P_Category', S_ID='$S_ID', Business_Name='$Business_Name' where P_ID=$P_ID";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            //echo "Updated Successfully";
            header('location:sellerProductsDisplay.php?S_ID='.$S_ID.'');
        }

        else
        {
            die (mysqli_error($conn));
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Details</title>

    <link rel="stylesheet" href="Styles/formSeller.css">
</head>

<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">

    <?php
        include 'headerSellerAfterLogin.php';
    ?>
    
    <div class="container my-5">

        <h1>Update Details</h1>

        <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

            <div class="form-group">
                <label for="Product Name" class="form-label">Product Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="P_Name" value="<?php echo $P_Name;?>"> <!--Show previus data inside the field-->
            </div>

            <div class="form-group">
                <label for="Product Price" class="form-label">Product Price</label>
                <input type="text" class="form-control" placeholder="Enter Price" name="Price" value="<?php echo $Price;?>">
            </div>

            <div class="form-group">
                <label for="Product Availability" class="form-label">Product Availability</label>
                <input type="text" class="form-control" placeholder="Enter Availability" name="P_Availability" value="<?php echo $P_Availability;?>">
            </div>
            
            <div class="form-group">
                <label for="Product Description" class="form-label">Product Description</label>
                <textarea cols="50" rows="8" placeholder="Enter Description" name="P_Description" required><?php echo $P_Description;?></textarea>
            </div>

            <div class="form-group">
                <label for="Product Category" class="form-label">Product Category</label>

                <select class="form-control" placeholder="Select Category" name="P_Category" >
                        <option selected value="<?php echo $P_Category;?>"><?php echo $P_Category;?></option>
                        <option value="Electronics">Electronics</option>
                        <option value="Fashion and Clothing">Fashion and Clothing</option>
                        <option value="Health and Beauty">Health and Beauty</option>
                        <option value="Sports and OutdoorHealth and Beauty">Sports and Outdoor</option>
                        <option value="Home and Kitchen">Home and Kitchen</option>
                      </select>            
            </div>

            <div class="form-group">
                <label style="display:none" for="Category_ID">Category ID</label>
                <input type="hidden" class="form-control" id="Category_ID" name="Category_ID" readonly>
                </div>

                <script>
                // Retrieve the selected value from the dropdown and update Category_ID
                document.getElementById("P_Category").onchange = function() {
                    var P_Category = document.getElementById("P_Category").value;
                    var PC_ID;

                    switch (P_Category) {
                    case "Electronics":
                        PC_ID = 1;
                        break;

                    case "Fashion and Clothing":
                        PC_ID = 2;
                        break;

                    case "Health and Beauty":
                        PC_ID = 3;
                        break;

                    case "Sports and Outdoor":
                        PC_ID = 4;
                        break;

                    case "Home and Kitchen":
                        PC_ID = 5;
                        break;
                        
                    default:
                        PC_ID = "";
                        break;
                    }

                    document.getElementById("Category_ID").value = PC_ID;
                };
                </script>


            <div class="form-group">
                <label style="display:none" for="Store Name" >Seller ID</label>
                <input type="hidden" class="form-control" name="S_ID" value="<?php echo $S_ID;?>">
            </div>

            <div class="form-group">
                <label for="Store Name" class="form-label">Store Name</label>
                <input type="text" class="form-control" placeholder="Enter Store Name" name="Business_Name" value="<?php echo $Business_Name;?>"readonly>
            </div>

            <div class="form-group" >
                <label for="Image_URL">Image</label>
                <input type="file" id="Image_URL" name="Image_URL" accept="image/*" value="<?php echo $Image_URL;?>" required> 
            </div>


            <center><br><button type="submit" class="btn btn-primary" name="submit">Update</button></center>

            <script>
                function validateForm()
                {
                    var form = document.forms[0];
                    var Price = form.elements['Price'].value;

                    // Validate Product Price
                    if (isNaN(Price) || parseFloat(Price) <= 0) 
                    {
                        form.elements['Price'].classList.add('is-invalid');
                        alert("Price is Invalid");
                        return false;
                    } 
                    
                    else 
                    {
                        form.elements['Price'].classList.remove('is-invalid');
                    }



                    var P_Availability = form.elements['P_Availability'].value;

                    if (isNaN(P_Availability) || parseFloat(P_Availability) <= 0) 
                    {
                        form.elements['P_Availability'].classList.add('is-invalid');
                        alert("Product Availability is Invalid");
                        return false;
                    } 
                    
                    else 
                    {
                        form.elements['P_Availability'].classList.remove('is-invalid');
                    }


                    
                    
                    alert("Product Was Added Successfully!");
                    return true; // Submit the form if all validations pass
                    
                }
            </script>
        </form>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>

</html>