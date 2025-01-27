<?php
@include './dbconnection.php';
session_start();
if (isset($_POST['submit'])) {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_cpassword = $_POST['cpassword'];
    $userRole = $_POST['role'];

    //check if password and confrom password is same
    if ($user_password === $user_cpassword) {
        $SELECT = "SELECT * FROM USER WHERE email='$user_email' && passowrd='$user_password'";

        //execute the query
        $response = mysqli_query($conn, $SELECT);

        //if check user has that email and password
        if (mysqli_num_rows($response) > 0) {
            //send error message
            $error[] = "This user already exists";
        } else {
            $haspassword = password_hash($user_password, PASSWORD_DEFAULT);
            //not exist user then insert the data
            $INSERT = "INSERT INTO USER(name,email,passowrd,USERTYPE)VALUES('$user_name','$user_email','$haspassword','$userRole')";

            //execute the query
            $response = mysqli_query($conn, $INSERT);
            if ($response) {
                $sucess[] = "User Register Sucessfully";
                header('location:./login-form.php');
                if ($userRole == 'admin') {
                    $_SESSION['admin-name'] = $user_name;
                } else {
                    $_SESSION['user-name'] = $user_name;
                }
            }
        }
    } else {
        echo "<div  class='alert'>Password and Confirm Password is not same</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER FROM</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>REGISTER FORM</h3>
            <?php

            if (isset($error)) {
                foreach ($error as $error) {
                    echo "<p class='alert'>" . $error . "</p>";
                }
            }
            if (isset($sucess)) {
                foreach ($sucess as $sucess) {
                    echo "<p class='sucess'>" . $sucess . "</p>";
                }
            }

            ?>
            <input type="text" name="name" id="name" required placeholder="Enter your name" />
            <input type="email" name="email" id="email" required placeholder="Enter your Email" />
            <input type="password" name="password" id="password" required placeholder="Enter your Password" />
            <input type="password" name="cpassword" id="cpassword" required placeholder="Enter your Confirom Password" />
            <select name="role" id="role">
                <option value="" selected>Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn" />
            <p>Already Have an account <a href="./login-form.php">LOGIN-NOW</a> </p>
        </form>
    </div>
</body>

</html>