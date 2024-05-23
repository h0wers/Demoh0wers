<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'World');
if(empty($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}
// if($_SESSION['role'] === 1) {
//     header('Location: adm/index.php');
    
// }
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

   <h2>Форма заказа дверей</h2>
    <form action="" method="post">
        <div>
            <label for="type_of_door">Тип двери:</label>
            <select name="type_of_door" id="type_of_door">
                <option value="межкомнатная">Межкомнатная</option>
                <option value="входная">Входная</option>
            </select>
        </div>
        <div>
            <label for="description">Описание:</label>
            <textarea name="description" id="description" rows="4" cols="50"></textarea>
        </div>
        <div>
            <label for="fio">ФИО:</label>
            <input type="text" name="fio" id="fio">
        </div>
        <div>
            <label for="phone">Телефон:</label>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <label for="adress">Адрес:</label>
            <input type="text" name="adress" id="adress">
        </div>
        <div>
            <button type="submit">Отправить заказ</button>
        </div>
    </form>

<?php

if(!empty($_POST['type_of_door']) && !empty($_POST['description']) && !empty($_POST['fio']) && !empty($_POST['phone']) && !empty($_POST['adress'])) {
    $type_of_door = $_POST['type_of_door'];
    $description = $_POST['description'];   
    $fio = $_POST['fio'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $sql = "INSERT INTO orders (type_of_door, description, fio, phone, adress) VALUES ('$type_of_door', '$description', '$fio', '$phone', '$adress')";
    $result = mysqli_query($link, $sql);
    if($result) {
        echo "<div class='success'>Заказ отправлен</div>";
    }
    else {
        echo "<div class='error'>Заказ не отправлен</div>";
    }

}



?>

</body>
</html>