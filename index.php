<?php include('Code.php');
      include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <title>EGG</title>
    <style>
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

        .add-products-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-products-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php

if (!isset($_SESSION['username'])) {
 
    echo '<div class="add-products-container">';
    echo '<a href="login.php">Login Here!</a>';

}    

?>
<div class="add-products-container">
<a href="logout.php">Logout Here</a>
 
</div>
    <h1 class="header">EGG</h1>
    <p class="dic"> Welcome, here you can sell Items you want to sell!</p><br><br>
    <div class="form">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <?php include('errors.php');?>
            
            <div>
            <label for="ItemName">Enter the Name of the Item:</label><br>
            <input type="text" name="ItemName" id="ItemName" value="<?php echo $itemname?>"><br><br><br>
            </div>

            <div>
            <label for="ItemDescription">Enter the Description of the Item:</label><br>
            <input type="text" name="ItemDescription" id="ItemDescription" value="<?php echo $itemdescription?>"><br><br><br>
            </div>

            <div>
            <label for="Price">Enter the Item Price:</label><br>
            <input type="text" name="price" id="price" value="<?php echo $price?>"><br><br><br>
            </div>

            
            <div>
            <label for="Type">Classification the item:</label><br><br>            
            <label for="class1">Cars</label>
            <input type="radio" name="type"  value="Cars">                 
            <label for="class2">Devices</label>
            <input type="radio" name="type"  value="Devices">            
            <label for="class3">Real Estates</label>
            <input type="radio" name="type"  value="Real Estates">
            <br><br>
            </div>

            <div>
            <label for="City">Enter The City:</label> 
            <select name="City">
                <option name="City">Riyadh</option>
                <option name="City">Jaddah</option>
                <option name="City">Dammam</option>
                <option name="City">Mecca</option>
                <option name="City">Abha</option>
                <option name="City">Hayel</option>
            </select><br><br><br><br>
            </div>

             
            <div>
            <label for="Photo">photo of the Item:</label>
            <input type="file" name="photo" value=""><br><br>
            </div>
        

            <input type="submit" name="add" value="Add"><br><br>

            <a href="home.php">Show All Prodects</a>
        </form>        
    </div>
</body>
</html>