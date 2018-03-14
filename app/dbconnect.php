<?php
// Модуль для подключения к базе
// На выходе:  $dbh

// Файл с параметрами подключения
$config = require_once realpath(__DIR__ . '/../config.php');

try {
    // Подключаемся к базе через PDO, обрабатываем ошибки и затем передаем параметры в объект PDO
    $dsn = "mysql:host=" . $config["db"]['host'] . ";" . "dbname=" . $config["db"]['dbname'] . ";" . "charset=" . $config["db"]['charset'];
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    // Подключаемся к базе
    $dbh = new PDO($dsn, $config['db']['user'], $config['db']['password'], $opt);
    // Всё нормально - отдаём $dbh
    return $dbh;
} catch (PDOException $e) {
    return false;
}


// Такой подход уже не используется. Он преобразует значения массива в переменные
// Бежим по массиву в другом файле и берем значения этого массива
/*
foreach ($config['db'] as $key => $value) {
    ${$key} = $value;
}
*/