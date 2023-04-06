<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>register</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" id="" placeholder="Usernanme"><br>
        <input type="password" name="password" id="" placeholder="password"><br>
        <input type="password" name="confirm_password" id="" placeholder="confirm your password"><br>

        <label for="seller">Seller</label>
        <input type="radio" name="profile" id="seller" value="1"><br>
        
        <label for="costumer">Costumer</label>
        <input type="radio" name="profile" id="costumer" value="2"><br>

        <input type="submit" value="Register">

    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once 'app/core/controllers/user.php';
        $user = new  User();
        $user->register($_POST['username'], $_POST['password'],$_POST['confirm_password'],$_POST['profile']);
    }
    ?>
    
</body>
</html>