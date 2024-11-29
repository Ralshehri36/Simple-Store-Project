<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style_home.css">
    <style>        
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

p {
    color: #666;
    margin-bottom: 10px;
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>    
<body>
    <div class="container">
    <a href="home.php">Back to Egg page</a>
<?php
    // Connection
    $aa = mysqli_connect('localhost', 'root', '', 'register');
    
    if(isset($_GET['id'])) {
        
        $id = $_GET['id'];
        
        $query = "SELECT * FROM items WHERE id = $id";
        $result = mysqli_query($aa, $query);
        
        $item = mysqli_fetch_assoc($result);
        
        if($item) {
            
            echo "<h2>Item Details</h2>";
            echo "<p><strong>Item Name:</strong> " . $item['ItemName'] . "</p>";
            echo "<p><strong>Item Description:</strong> " . $item['ItemDescription'] . "</p>";
            echo "<p><strong>Price:</strong> $" . $item['Price'] . "</p>";
            echo "<p><strong>Type:</strong> " . $item['Type'] . "</p>";
            echo "<p><strong>City:</strong> " . $item['City'] . "</p>";
            echo "<p><strong>Photo:</strong> <img src='" . $item['photo'] . "' alt='Item Photo'></p>";
        } else {
    
            echo "<p>Item not found.</p>";
        }
    } else {
        
        echo "<p>No item ID provided.</p>";
    }
?>
</div>

</body>
</html>


