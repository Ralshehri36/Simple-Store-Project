<?php include('Code.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" type="text/css" href="style_register.css">

</head>
<body>
    <div> <h2>Login</h2> </div>

    <form action="login.php" method="post">
    <?php include('errors.php');?>

    <div>
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="<?php echo $username;?>">
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" value="<?php echo $password;?>">
    </div>

    <div>
        <button type="submit" name="login">Login</button><br><br>
    </div>
    </form>

    <p>
        Don't Have Account?<a href="Register.php">Sign-up</a>
    </p>
</body>
</html>