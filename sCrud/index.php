<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="view.php">View products</a>
    <h1>Add new product</h1>
    <form action="" method="post">
        <label for="">Name</label>
        <input type="text" name="name" id=""><br>
        <label for="">Price</label>
        <input type="number" name="price" id=""><br>
        <label for="">Quantity</label>
        <input type="number" name="quantity" id=""><br>
        <button type="submit" name="submit">Add Product</button>
    </form>
</body>
</html>
<?php

include("conn.php");
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $sql="INSERT into products(name,price,quantity) values(?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt){
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sii", $name, $price, $quantity);

        // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "Product added";
        } else {
            echo "Product not added";
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    }else{
        echo "Prepared statement error: " . mysqli_error($conn);
    }
}

?>