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
<h1>Выберите номер заявки:</h1>
    <form action="" method="post">
        <input type="text" name="id" id="">
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <button type="submit">Отправить</button>
    </form>

<?php
if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $sql = "UPDATE orders SET description = '$description' WHERE id = '$id'";
    mysqli_query($link, $sql);
}
else {
    echo '<div class="error">Заявка не выбрана</div>';
}
?>
</body>
</html>