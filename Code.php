<?php 
       
    // Declaration
    $fullname = "";
    $username = "";
    $email = "";
    $password = "";
    $errors = array();
    $level = 0;
    $_SESSION['success'] = "";
    
    $itemname = "";
    $itemdescription = "";
    $price = "";
    $type = "";
    $city = "";

    $aa = mysqli_connect('localhost', 'root', '', 'register');
    session_start();    
   

    //Register User

    if (isset($_POST['register_user'])) {

        $fullname = mysqli_real_escape_string($aa, $_POST['fullname']);
        $username = mysqli_real_escape_string($aa, $_POST['username']);
        $email = mysqli_real_escape_string($aa, $_POST['email']);
        $password1 = mysqli_real_escape_string($aa, $_POST['password']);
        $password2 = mysqli_real_escape_string($aa, $_POST['re_password']);

        $profile = $_FILES['p_photo'];
        $profile_location = $_FILES['p_photo']['tmp_name'];
        $profile_name = $_FILES['p_photo']['name'];
        $Pfolder = "Profile/".$profile_name;
                
        
        if (empty($fullname)) {
            array_push($errors, "Fullname is required");
        }
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password1)) {
            array_push($errors, "Password is required");
        }
       
        if (strlen($password1) < 8) {
            array_push($errors, "Password should be at least 8 characters long");
        }   
        
        if ($password1 != $password2) {
            array_push($errors, "Passwords do not match");
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email format");
        }

        if (empty($_FILES['p_photo']['name'])) {
            array_push($errors, "Add Photo Profile!");
        }
        
        if ($_FILES["p_photo"]["size"] > 500000) {
            array_push($errors, "File is too large");            
        }
                        
        if (count($errors) == 0) {
            $password = password_hash($password1, PASSWORD_DEFAULT);

            $q = mysqli_query($aa, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
            if (mysqli_num_rows($q) > 0) {
                echo "<script>alert('Username or Email Has Already Been Taken')</script>";
            } else {

                if (move_uploaded_file($profile_location, $Pfolder)) {
                    echo "<script> alert('Photo uploaded') </script>";
                } else {
                    echo "<script> alert('Error in upload') </script>";
                } 

                $query = "INSERT INTO user (FullName, UserName, Email, Password, p_photo, level) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($aa, $query);
                mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $username, $email, $password, $Pfolder, $level);
                mysqli_stmt_execute($stmt);

                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Sign-up is Complete";

                header('location: login.php');
                exit();
            }
        }
    }

    //Login User
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($aa, $_POST['username']);
        $password = mysqli_real_escape_string($aa, $_POST['password']);
    
        if (empty($username)) { array_push($errors, "Username is required");}
            
        
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if (count($errors) == 0) {

            $query = "SELECT * FROM user WHERE UserName = ?";
            $stmt = mysqli_prepare($aa, $query);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['Password'])) {
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Login is success";
                    $_SESSION['timelogaout'] =time();
                    $_SESSION['level'] = $user ['level'];
                    header('location: index.php');
                    exit();
                } else {
                    array_push($errors, "Error in Username or Password");
                }
            } else {
                array_push($errors, "Error in Username or Password");
            }
        }
    }

        

    //index php
    if (isset($_POST['add'])) {    
        
        $itemname = mysqli_real_escape_string($aa, $_POST['ItemName']);
        $itemdescription = mysqli_real_escape_string($aa, $_POST['ItemDescription']);
        $price = mysqli_real_escape_string($aa, $_POST['price']);
        $type = mysqli_real_escape_string($aa, $_POST['type']);  
        $city = mysqli_real_escape_string($aa, $_POST['City']);        

        $photo = $_FILES['photo'];
        $photo_location = $_FILES['photo']['tmp_name'];
        $photo_name = $_FILES['photo']['name'];
        $folder = "Images/".$photo_name;


        if (empty($itemname)) {
            array_push($errors, "Item Name is Required");
        }
        if (empty($itemdescription)) {
            array_push($errors, "Item Description is Required");
        }
        if (empty($price)) {
            array_push($errors, "Enter The Price");
        }
        if ($type == 'select_item') {
            array_push($errors, "Enter The Type");
        }
        if (empty($city)) {
            array_push($errors, "Chose City");        
        }       
        if (empty($_FILES['photo']['name'])) {
            array_push($errors, "Add Photo!");
        }
        
        if ($_FILES["photo"]["size"] > 500000) {
            array_push($errors, "File is too large");            
        }
                        
        if (move_uploaded_file($photo_location, 'Images/'.$photo_name)) {
            echo "<script> alert('Photo uploaded') </script>";
        }else {
            echo "<script> alert('Error in upload') </script>";
        }

        if (count($errors) == 0) {
            $query = "insert into items(itemname, itemdescription, price, type, city, photo) values ('$itemname', '$itemdescription', '$price', '$type', '$city', '$folder')"; 
            mysqli_query($aa, $query);

            array_push($errors, "Done");
            header('location: index.php');
        }
    }
    
        //UBDATE INFO ITEMS             
         
    if (isset($_POST['update'])) {          
                        
        $itemname = $_POST['ItemName'];
        $itemdescription = $_POST['ItemDescription'];
        $price = $_POST['price'];        
        $city = $_POST['City'];        

        $photo = $_FILES['photo'];
        $photo_location = $_FILES['photo']['tmp_name'];
        $photo_name = $_FILES['photo']['name'];
        $folder_up = "Images/".$photo_name;

        if (empty($_FILES['photo']['name'])) {
            array_push($errors, "Add Photo!");
        }
        
        if ($_FILES["photo"]["size"] > 500000) {
            array_push($errors, "File is too large");            
        }
                                
        
        if (count($errors) == 0) {
            // Check if 'id' is set in $_POST array
            if(isset($_POST['id'])) {
                $id = $_POST['id'];      
                $sql = "UPDATE items SET ItemName='$itemname', ItemDescription='$itemdescription', price='$price', City='$city', photo='$folder_up' WHERE id=$id"; 
                mysqli_query($aa, $sql);
        
                if (move_uploaded_file($photo_location, 'Images/'.$photo_name)) {
                    echo "<script> alert('Photo updated') </script>";
                } else {
                    echo "<script> alert('Error in update') </script>";
                }
                array_push($errors, "Done");
                header('location: details.php');
            } else {
                // Handle the case where 'id' is not set
                echo "ID is not set.";
            }
        }
    }
        