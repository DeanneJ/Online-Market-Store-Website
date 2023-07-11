<?php
 include 'config.php';

 ?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Customer List</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container my-5">
            

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">C_ID</th>
                    <th scope="col">C_Name</th>
                    <th scope="col">Home</th>
                    <th scope="col">Cart</th>
                </tr>
                </thead>

                <tbody>

                <?php

                    $sql = "SELECT * FROM customer";

                    $result = mysqli_query($conn, $sql);

                    if($result)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $C_ID = $row['C_ID'];
                            $C_Name = $row['C_Name'];

                            echo '<tr>
                                <td>'.$C_ID.'</td>
                                <td>'.$C_Name.'</td>
                                <td><button class="btn btn-primary"><a class="text-light" href="productDisplay.php?C_ID='.$C_ID.'">Home</a></button></td>
                                <td><button class="btn btn-primary"><a class="text-light" href="cart.php?C_ID='.$C_ID.'">Cart</a></button></td>
                            </tr>';
                        }
                    }
                ?>

                </tbody>
            </table>
        </div>
    </body>
</html>