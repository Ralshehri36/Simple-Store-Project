<?php
    $aa = mysqli_connect('localhost', 'root', '', 'register');

    $id = $_GET['id'];
    mysqli_query($aa, "delete from items where id = $id");
    header('location: home.php');
