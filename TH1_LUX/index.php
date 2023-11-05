<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="http://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <form action="index.php" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name='username' value="<?php if(isset($_REQUEST["username"])) echo $_REQUEST["username"] ?>">
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="password" name='password' value="<?php if(isset($_REQUEST["password"])) echo $_REQUEST["password"] ?>">
                <i class="bx bxs-lock-alt"></i>
            </div>
            <button type="submit" class="btn" name="dangnhap">
                Login
            </button>
            <?php require './Model/xulydangnhap.php'; ?>
        </form>
    </div>
</body>
</html>