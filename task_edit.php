<!doctype html>
<html lang="ru">
<head>
<title>Список задач</title>
</head>
<body>
<?php
$host = 'localhost';  // Хост, у нас все локально
$user = 'mysql';    // Имя созданного вами пользователя
$pass = 'mysql'; // Установленный вами пароль пользователю
$db_name = 'list_task';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

// Если соединение установить не удалось, то ошибка
if (!$link) {
	echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}
	
$rows = mysqli_query($link, "SELECT COUNT(*) as count FROM tasks"); // количество полученных строк
$count = mysqli_fetch_row($rows)[0]; // количество строк в таблице
	
//Если переменная Name_task передана
if (isset($_POST["Name_task"])) {
	//Если это запрос на обновление, то обновляем
    if (isset($_GET['red'])) {
		$sql = mysqli_query($link, "UPDATE `tasks` SET `Name_task` = '{$_POST['Name_task']}',`Date_begin_task` = '{$_POST['Date_begin_task']}',`Date_end_task` = '{$_POST['Date_end_task']}'
		WHERE `ID`={$_GET['red']}");
	} 
	else { //Иначе вставляем данные, подставляя их в запрос
	$sql = mysqli_query($link, "INSERT INTO `tasks` (`Name_task`, `Date_begin_task`, `Date_end_task`) VALUES ('{$_POST['Name_task']}', '{$_POST['Date_begin_task']}', '{$_POST['Date_end_task']}')");
	}
	
	//Если вставка прошла успешно
    if ($sql) {
		$rows = mysqli_query($link, "SELECT COUNT(*) as count FROM `tasks`"); // количество полученных строк
		$count = mysqli_fetch_row($rows)[0]; // количество строк в таблице
		echo '<p>Успешно!</p>';
    } 
	else {
		echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}

//Если передана переменная red, то надо обновлять данные. Для начала достанем их из БД
if (isset($_GET['red'])) {
    $sql = mysqli_query($link, "SELECT `ID`, `Name_task`, `Date_begin_task`, `Date_end_task` FROM `tasks` WHERE `ID`={$_GET['red']}");
    $task = mysqli_fetch_array($sql);
}
	
if ($count!=0){
	//Получаем данные
	$sql = mysqli_query($link, 'SELECT `ID`, `Name_task`, `Date_begin_task`, `Date_end_task` FROM `tasks`');
	print ("<table border=0 align=left width=100% cellpadding=5>
	<tr><td><font = arial black><b>Наименование задачи</b></td>
	<td><font = arial black><b>Дата постановки задачи</td>
	<td><font = arial black><b>Дата окончания задачи</td></tr>");
	while ($result = mysqli_fetch_array($sql)) {
		$ID=$result['ID'];
		$Name_task=$result['Name_task'];
		$Date_begin_task=$result['Date_begin_task'];
		$Date_end_task=$result['Date_end_task'];
		print ("<tr><td>$Name_task</td>
		<td>$Date_begin_task</td>
		<td>$Date_end_task</td></tr>");
	}
}
else {
	echo("");
}
print ("</table>");
?>
<form action="" method="post">
<table>
<td><br><p align=justify><font = arial black><b>Поля ввода данных о задаче</b></td>
<tr>
<td align=justify>Наименование задачи:</td>
<td><input type="text" name="Name_task" style="border-radius: 10px;" value="<?= isset($_GET['red']) ? $task['Name_task'] : ''; ?>"></td>
</tr>
<tr>
<td align=justify>Дата постановки задачи:</td>
<td><input type="date" name="Date_begin_task" style="border-radius: 10px;" value="<?= isset($_GET['red']) ? $task['Date_begin_task'] : ''; ?>"></td>
</tr>
<tr>
<td align=justify>Дата окончания задачи:</td>
<td><input type="date" name="Date_end_task" style="border-radius: 10px;" value="<?= isset($_GET['red']) ? $task['Date_end_task'] : ''; ?>"></td>
</tr>
<tr>
<td>
<input type="submit" style="border-radius: 10px;" value="Подтвердить">
</td>
<td><button style="border-radius: 10px;"><a href="index.php">Назад</a></button></td>
</tr>
</table>
</form>
</body>
</html>
