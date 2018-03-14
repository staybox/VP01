<?php
// Входной контроль
// Надо проверить, что поля email и phone точно есть (т.к. в базе они помечены NOT NULL)
if ((empty($_REQUEST['email'])) || (empty($_REQUEST['phone']))) {
    echo json_encode(['result' => 'fail', 'error_code' => 4001], JSON_UNESCAPED_UNICODE);
    return;
}
// Подключаемся к базе
$dbh = require_once 'dbconnect.php';
if ($dbh === false) {
    echo json_encode(['result' => 'fail', 'error_code' => 4002], JSON_UNESCAPED_UNICODE);
    return;
}
// Фаза 1: Регистрация или "авторизация" пользователя
// По окончании этой фазы имеем в наличии userId
$userId = require_once 'auth.php';
if (empty($userId)) {
    echo json_encode(['result' => 'fail', 'error_code' => 4003], JSON_UNESCAPED_UNICODE);
    return;
}