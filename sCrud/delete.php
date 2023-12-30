<?php

    include("conn.php");
    session_start();

    $deleteData = mysqli_query($conn, "DELETE from products where id = '".$_SESSION['id']."'");
    if($deleteData){
        header("location: view.php");
        session_destroy();
    }else{
        header("location: view.php");
        session_destroy();
    }


?>