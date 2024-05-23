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

<H2>Поиск по фамилии:</H2>
<form action="" method="post">
<input type="text" name="search" id="" placeholder="Введите ФИО">
<button>Поиск</button>
</form>

<?php
if(!empty($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM orders WHERE fio = '$search'";
    $result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) > 0) { // Проверяем, есть ли результаты поиска
        echo '<table>
        <tr>'
        .'<th>Тип двери</th>'
        .'<th>Описание</th>'
        .'<th>ФИО</th>'
        .'<th>Телефон</th>'
        .'<th>Адрес</th>'
        .'</tr>';

        while($order = mysqli_fetch_assoc($result)) { // Используем цикл для обработки всех строк результата
            echo '<tr>
            <td>'.$order['type_of_door'].'</td>
            <td>'.$order['description'].'</td>
            <td>'.$order['fio'].'</td>
            <td>'.$order['phone'].'</td>
            <td>'.$order['adress'].'</td>
            </tr>';
        }

        echo '</table>';
    } else {
        echo '<div class = "error"><h2>Результатов нет</h2></div>';
    }
}
?>

</body>
</html>
