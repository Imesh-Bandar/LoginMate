<?php
session_start();
@include './dbconnection.php';

if (isset($_POST['login'])) {

    $user_email = $_POST['email'];

    $user_password = $_POST['password'];
    //$userRole = $_POST['role'];

    $SQL = "SELECT * FROM USER WHERE email='$user_email'";
    //execute the query
    $response = mysqli_query($conn, $SQL);

    //if check response password and my password is same
    if (mysqli_num_rows($response) > 0) {
        $row = mysqli_fetch_assoc($response);
        //check password is correct
        if (password_verify($user_password, $row['passowrd'])) {
            //check that user type of role
            if ($row['USERTYPE'] === 'admin') {
                $_SESSION['admin-name'] = $row['name'];
                echo $_SESSION['admin-name'];
                header('location:./admin-page.php');
            } else {
                $_SESSION['user-name'] = $row['name'];

                // echo $_SESSION['user-name'];
                header('location:./user-page.php');
            }
        } else {
            $error[] = "Password is not correct";
        }
    }
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN FORM</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo "<p class='alert'>" . $error . "</p>";
                }
            }




            ?>
            <h3>LOGIN FORM</h3>
            <input type="email" name="email" id="email" required placeholder="Enter your Emmail" />
            <input type="password" name="password" id="password" required placeholder="Enter your Password" />
            <input type="submit" name="login" value="login now" class="form-btn" />
            <p>Don't Have an account <a href="./register-form.php">REGISTER-NOW</a> </p>
        </form>
    </div>
</body>

</html>