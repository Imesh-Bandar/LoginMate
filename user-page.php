<?php
session_start();

if (isset($_POST['log-out'])) {
    session_unset();
    session_destroy();
    header('location:./login-form.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER PAGE</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Hi, <span><?php echo $_SESSION['user-name'] ?></span></h1>
            <h2>Welcome <span><?php echo $_SESSION['user-name'] ?></span></h2>
            <p>Welcome to your User page</p>
            <a href="./login-form.php" class="btn">LOGIN</a>
            <a href="./register-form.php" class="btn">REGISTER</a>
            <div >
                <form action="" method="post">
                    <input type="submit" name="log-out" value="LOGOUT" class="btn" />
                </form>
            </div>
        </div>
    </div>


</body>

</html>