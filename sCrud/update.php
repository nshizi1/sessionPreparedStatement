<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Update data</h2>
    <?php
        include("conn.php");
        session_start();
        $getItem = mysqli_query($conn, "SELECT * from products where id = '".$_SESSION["id"]."'");
        while($row=mysqli_fetch_assoc($getItem)){
    ?>
    <form action="" method="post">
        <label for="">Name</label>
        <input type="text" value="<?php echo $row["name"] ?>" name="name" id=""><br>
        <label for="">Price</label>
        <input type="number" value="<?php echo $row["price"] ?>" name="price" id=""><br>
        <label for="">Quantity</label>
        <input type="number" value="<?php echo $row["quantity"] ?>" name="quantity" id=""><br>
        <button type="submit" name="submit">Update Product</button>
    </form> 
    <?php } ?>
</body>
</html>
<?php

        if(isset($_POST["submit"])){
            $name=$_POST["name"];
            $price=$_POST["price"];
            $quantity=$_POST["quantity"];
            $sql="UPDATE products SET name='$name',price='$price',quantity='$quantity' WHERE id='".$_SESSION["id"]."'";
            $result=mysqli_query($conn,$sql);
            if($result){
                header("location: view.php");
                session_destroy();
            }else{
                header("location: view.php");
                session_destroy();
            }
        }

?>