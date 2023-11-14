<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>LOGIN</title>
    <p><?php
        if(isset($_GET['message'])){
            echo $_GET['message'];
        }
    ?></p>
</head>
<body>
    <form method = "POST" action ="login.php">
    <input type="text" name="username" placeholder="Input Username HERE">
    <input type="password" name="password" placeholder="Input Password HERE">
    <button type="submit" name ="login">LOGIN</button>
    </form>
</body>
</html>