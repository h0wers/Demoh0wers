<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'World');
if(empty($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Examen</title>
</head>
<body>
   <nav>
    <a href="index.php">Все заявки</a>
    <a href="workers.php">Сотрудник</a>
    <a href="description.php">Описание</a>
    <a href="status.php">Статус</a>
     <a href="../logout.php">Выйти</a>
   </nav>
<h2>Выберите заявку и сотрудника:</h2>
    <form action="" method="post">
        <input type="text" name="id" placeholder="Номер заявки">
        <input type="text" name="worker" placeholder="ФИО сотрудника">

        <button type="submit">Отправить</button>



</form>

<?php

if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    $worker = $_POST['worker'];
    $sql = "UPDATE orders SET workers = '$worker' WHERE id = '$id'";
    mysqli_query($link, $sql);
}


?>


</body>
</html>