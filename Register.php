<?php include('Code.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGG</title>
    <link rel="stylesheet" type="text/css" href="style_register.css">
</head>
<body>
        <div> 
        <h2>Register</h2>    
        </div>
    
        <form action="Register.php" method="post" enctype="multipart/form-data">  
            <?php include('errors.php');?>
        <div>
            <label for="fullname">FullName:</label>
            <input id="fullname" type="text" name="fullname" value="<?php echo $fullname?>"><br><br>            
        </div>        

        <div>
            <label for="username">UserName</label>
            <input id="username" type="text" name="username" value="<?php echo $username?>"><br><br>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?php echo $email?>"><br><br>
        </div>

        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" value="<?php echo $password?>"><br><br>
        </div>

        <div>
            <label for="re_password">Re_Password:</label>
            <input id="re_password" type="password" name="re_password"><br><br>
        </div>

        <div>
            <label for="P_photo">Profile Photo</label>
            <input type="file" name="p_photo"><br><br>
            </div>

        <div>
            <button type="submit" name="register_user">Sign up</button><br><br>
        </div>
        <p>
           Have Account? <a href="login.php">Login</a>
        </p>
        </form>    
</body>
</html>