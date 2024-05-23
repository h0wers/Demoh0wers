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
<h2>Количество выполненых заявок:
    <?php
    $sql = "SELECT COUNT(*) as count FROM orders WHERE status = 'Выполнена'";
    $result = mysqli_query($link, $sql);
    $result2 = mysqli_fetch_assoc($result);
    $result2 = $result2['count'];
    echo $result2;
    ?>
</h2>
<H2>Все заявки:</H2>
<table>
<tr>
<th>Тип двери</th>
<th>Описание</th>
<th>ФИО</th>
<th>Телефон</th>
<th>Адрес</th>
<th>Статус</th>
<th>Сотрудник</th>
</tr>


<?php
$sql = "SELECT * FROM orders";
$result = mysqli_query($link, $sql);
while($order = mysqli_fetch_assoc($result)) {
    echo '
    <tr>
    <td>'.$order['type_of_door'].'</td>
    <td>'.$order['description'].'</td>
    <td>'.$order['fio'].'</td>
    <td>'.$order['phone'].'</td>
    <td>'.$order['adress'].'</td>
    <td>'.$order['status'].'</td>
    <td>'.$order['workers'].'</td>
    </tr>
   ';

}
?> </table>
</body>
</html>
