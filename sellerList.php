<?php
 include 'config.php';

 ?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Seller List</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container my-5">
            

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">S_ID</th>
                    <th scope="col">Business_Name</th>
                    <th scope="col">Add Products</th>
                    <th scope="col">View Products</th>
                </tr>
                </thead>

                <tbody>

                <?php

                    $sql = "SELECT * FROM seller";

                    $result = mysqli_query($conn, $sql);

                    if($result)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $S_ID = $row['S_ID'];
                            $Business_Name = $row['Business_Name'];

                            echo '<tr>
                                <td>'.$S_ID.'</td>
                                <td>'.$Business_Name.'</td>
                                <td><button class="btn btn-primary"><a class="text-light" href="addProduct.php?S_ID='.$S_ID.'">Add Product</a></button></td>
                                <td><button class="btn btn-primary"><a class="text-light" href="sellerProductsDisplay.php?S_ID='.$S_ID.'">View Products</a></button></td>
                            </tr>';
                        }
                    }
                ?>

                </tbody>
            </table>
        </div>
    </body>
</html>