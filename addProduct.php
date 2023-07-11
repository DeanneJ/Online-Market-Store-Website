<!doctype html>
<html lang="en">

<head>
    <?php
        include 'config.php';

        $S_ID = $_GET['S_ID'];
        //Display the previous data 
        $sql = "select * from seller where S_ID=$S_ID";
        $result = mysqli_query($conn, $sql);            
        $row = mysqli_fetch_assoc($result);    
        
        $S_ID = $row['S_ID']; 
        $Business_Name = $row['Business_Name'];  

    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Products - <?php echo $Business_Name;?></title>

    <link rel="stylesheet" href="Styles/formSeller.css">
    <?php 
        //Declare capture ID
        include "headerSellerAfterLogin.php";
    ?>
</head>

<body style="background-image: url('Images/back 2.png'); background-size: 40%; background-attachment: fixed;">
    
    

    <div class="container my-5">
        <h1>Add Product</h1>

        <?php echo '<form action="submitForm.php?S_ID='.$S_ID.'" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">;'?>

            <div class="form-group">
                <label for="Product Name"  >Product Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="P_Name">
            </div>

            <div class="form-group">
                <label for="Product Price" >Product Price</label>
                <input type="text" class="form-control" placeholder="Enter Price" name="Price">
            </div>

            <div class="form-group">
                <label for="Product Availability" >Product Availability</label>
                <input type="text" class="form-control" placeholder="Enter Availability" name="P_Availability">
            </div>
            
            <div class="form-group">
                <label for="Product Description" >Product Description</label>
                <textarea cols="50" rows="8" placeholder="Enter Description" name="P_Description" required></textarea>
            </div>

            <div class="form-group">
                <label for="Product Category">Product Category</label>
                <select class="form-control" placeholder="Select Category" name="P_Category" id="P_Category">
                    <option value="" disabled selected>Select Category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Fashion and Clothing">Fashion and Clothing</option>
                    <option value="Health and Beauty">Health and Beauty</option>
                    <option value="Sports and Outdoor">Sports and Outdoor</option>
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
                <label for="Business Name" >Business Name</label>
                <input type="text" class="form-control" placeholder="Enter Store Name" name="Business_Name" value="<?php echo $Business_Name;?>" readonly>
            </div>

            <div class="form-group" >
                <label for="Image_URL">Image</label>
                <input type="file" id="Image_URL" name="Image_URL" accept="image/*" required> 
            </div>

            
            <center><br><button type="submit" class="btn btn-primary" name="submit" id="submit" >Submit</button></center>

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
    <?php include "footer.php" ?>
</body>

</html>