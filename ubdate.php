<?php include('Code.php');
      include('session.php');           
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <title>EGG Update</title>
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

        $id = $_GET['id'];
        $up = mysqli_query($aa, "select * from items where id =$id");
        $data = mysqli_fetch_array($up); 

?>
<div class="add-products-container">
<a href="logout.php">Logout Here</a>
 
</div>
    <h1 class="header">EGG</h1>
    <p class="dic"> Ubdate informiton Products</p><br><br>
    <div class="form">
        <form action="ubdate.php" method="post" enctype="multipart/form-data">
            <?php include('errors.php');?>
            
            <div>
            <label for="Item_id">Enter the Item Id:</label><br>
            <input type="number" name="Item_id" id="Item_id" value="<?php echo $data['id']?>"><br><br><br>
            </div>

            <div>
            <label for="ItemName">Ubdate the Name of the Item:</label><br>
            <input type="text" name="ItemName" id="ItemName" value="<?php echo $data['ItemName']?>"><br><br><br>
            </div>

            <div>
            <label for="ItemDescription">Update the Description of the Item:</label><br>
            <input type="text" name="ItemDescription" id="ItemDescription" value="<?php echo $data['ItemDescription']?>"><br><br><br>
            </div>

            <div>
            <label for="Price">Ubdate the Item Price:</label><br>
            <input type="text" name="price" id="price" value="<?php echo $data['Price'] ."$"?>"><br><br><br>
            </div>
            
            <div>
            <label for="City">Ubdate The City:</label> 
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
            <label for="Photo">Ubdate photo of the Item:</label>
            <input type="file" name="photo" value=""><br><br>
            </div>
        

            <input type="submit" name="update" value="Update"><br><br>

            <a href="home.php">Show All Prodects</a>

        </form>        
    </div>
</body>
</html>