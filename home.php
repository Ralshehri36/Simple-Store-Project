<?php
        session_start();
        // Connection
        $aa = mysqli_connect('localhost', 'root', '', 'register');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style_home.css">
    <style>
        .card{
            float: right;
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }
        main{
            width: 70%;
        }

        form{
            align-items: center;
            margin-top: 20px;
            margin-right: 30px;
            margin-left: 30px;
            background-attachment: fixed;            
        }
        a {
            color: #007bff;
            text-decoration: none;
            border: 10px;
        }.add-products-container {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        

        .add-products-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body><br><br>
<div class="add-products-container">
<a href="index.php" class="add-products-button">Add Products</a>
</div>
    <div><h1>Egg</h1></div>

    <?php 
    include('session.php');

    $result = mysqli_query($aa, "select * from items");
    while ($row = mysqli_fetch_array($result)) {
        
        echo "<center>";
        echo "<main>";
        echo "<div class='card' style='width: 18rem;'>";
        echo "<img src='$row[photo]' class='card-img-top'>";
        echo "<div class='card-body'>";
        echo  "<h5 class='card-title'>$row[ItemName]</h5>";
        echo  "<p class='card-text'>$row[Price]$</p>";         
        echo  "<a href='details.php?id=$row[id]' class='btn btn-primary'>Details</a>";
        if ($level == 1) {
            echo "<a href='delete.php? id=$row[id]' class='btn btn-danger'>Delete</a>";
            echo "<a href='ubdate.php? id=$row[id]' class='btn btn-danger'>Update</a>";
         }
        echo "</div>";
        echo "</div>";
        echo "</main>";
        echo "<center>";                
    }

    ?>    
</body>
</html>