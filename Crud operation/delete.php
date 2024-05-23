<?php
    $conn=mysqli_connect("localhost","root","","crud");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `create_db` where id=$id";
        $conn->query($sql);
    }
    header('location:/Crud operation/display.php');
    exit;
?>