<?php
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Seller Products List</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5"> <a class="text-light" href="sellerList.php">Add Product</a></button>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">P_ID</th>
                <th scope="col">P_Name</th>
                <th scope="col">Price</th>
                <th scope="col">P_Availability</th>
                <th scope="col">P_Description</th>
                <th scope="col">P_Category</th>
                <th scope="col">S_ID</th>
                <th scope="col">Business_Name</th>
                <th scope="col">Image_URL</th>
                <th scope="col">Operations</th>
              </tr>
            </thead>

            <tbody>
                <?php
                  $S_ID = $_GET['S_ID'];

                  $sql = "SELECT * FROM product WHERE S_ID = $S_ID";

                  $result = mysqli_query($conn, $sql);

                  if($result)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      $P_ID = $row['P_ID'];
                      $P_Name = $row['P_Name'];
                      $Price = $row['Price'];
                      $P_Availability = $row['P_Availability'];
                      $P_Description = $row['P_Description'];
                      $P_Category = $row['P_Category'];
                      $S_ID = $row['S_ID'];
                      $Business_Name = $row['Business_Name'];
                      $imagePath = $row['Image_URL'];

                      echo 
                        '<tr>
                          <th scope="row">'.$P_ID.'</th>
                          <td>'.$P_Name.'</td>
                          <td>'.$Price.'</td>
                          <td>'.$P_Availability.'</td>
                          <td>'.$P_Description.'</td>
                          <td>'.$P_Category.'</td>
                          <td>'.$S_ID.'</td>
                          <td>'.$Business_Name.'</td>
                          <td>'.$imagePath.'</td>
                          <td> 
                            <button class="btn btn-primary"><a class="text-light" href="update.php?updateid='.$P_ID.'">Update</a></button>
                            
                            <button class="btn btn-danger"><a class="text-light" href="delete.php?deleteid='.$P_ID.'">Delete</a></button>
                          </td>
                        </tr>';
                    }
                  }
                ?>
            </tbody>
          </table>
    </div>
</body>
</html>