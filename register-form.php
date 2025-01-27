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
            <input type="text" name="name" id="name" required placeholder="Enter your name" />
            <input type="email" name="email" id="email" required placeholder="Enter your Emmail" />
            <input type="passowrd" name="password" id="password" required placeholder="Enter your Password" />
            <input type="passowrd" name="cpassword" id="cpassword" required placeholder="Enter your Confirom Password" />
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