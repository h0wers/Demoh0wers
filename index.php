<?php
$link = mysqli_connect('localhost', 'root', '', 'World');
session_start();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Examen</title>
</head>
<body>
   <nav>
     <a href="index.php">Главная</a>
     <a href="orders.php">Заявка</a>
     <a href="orders_all.php">Заказы</a>
     <a href="logout.php">Выйти</a>
   </nav>
    <h1>Войти:</h1>
    <div class="form">
    <form action="" method="post">

  
        <div class="input-login">
            <input type="text" name="login" placeholder="Login">
        </div>

        <div class="input-password">
            <input type="text" name="password" placeholder="Password">
        </div>

        <table>
            <button>Войти</button>
         
        </table>
    </div> 
    


<?php

    if(!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
        $result = mysqli_query($link, $sql);
        $user = mysqli_fetch_assoc($result);
      
        if($user) {
            $_SESSION['user'] = $user;
            $_SESSION['auth'] = true;
            $_SESSION['role'] = $user['role'];
            sleep(2);
            echo "<div class='success'>Вы вошли</div>";
            header('Location: orders.php');
        }
        else{
           
            echo "<div class='error'> Неправильный логин или пароль</div>";
        }
    }
?>

</body>
</html>


