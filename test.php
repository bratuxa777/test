<?php
// Настройки подключения к базе данных
$host = '10.8.98.51';
$dbname = 'db_magnit_ru';
$user = 'magnitru';
$pass = 'ami@Touv2Poh';
$options = 2;

try {
    // Создание подключения к базе данных
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // Запрос для получения списка таблиц
    $stmt = $pdo->query("SHOW TABLES");

    // Открытие файла для записи
    $file = fopen('tables_list.txt', 'w');

    // Запись названий таблиц в файл
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($row as $tableName) {
            fwrite($file, $tableName . PHP_EOL);
        }
    }

    // Закрытие файла
    fclose($file);

    echo "Названия таблиц успешно записаны в файл 'tables_list.txt'.";
} catch (PDOException $e) {
    echo "Ошибка подключения или выполнения запроса: " . $e->getMessage();
}
?>
