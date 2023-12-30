<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Add item</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th colspan="2">Operation</th>
        </tr>
        <?php
        session_start();
        include("conn.php");
        $getData = mysqli_query($conn, "SELECT * from products");
        $count=1;
        if($getData->num_rows<1){

        ?>
        <td colspan="5" align="center">No data found</td>
        <?php

        }else{
            while($row=mysqli_fetch_assoc($getData)){
                $_SESSION["id"] = $row["id"];
            ?>
            <tr>
                <td><?php echo $count++ ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["price"] ?></td>
                <td><?php echo $row["quantity"] ?></td>
                <td><a href="update.php">Update</a></td>
                <td><a href="delete.php">Delete</a></td>
            </tr>
            <?php } 
        }
        ?>

    </table>
</body>
</html>