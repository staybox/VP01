<?php

$email = $_REQUEST['email'];

// Ищем пользователя по email
try {
    $sth = $dbh->prepare('SELECT user_id FROM users WHERE email = :email');
    $sth->execute(array('email' => $email));
    $userId = $sth->fetchColumn();
} catch (PDOException $e) {
    return null;
}

if ($userId === false) {
    // Нет такого пользователя. Создаём.
    try {
        $sth = $dbh->prepare("INSERT INTO users(name, email, phone) VALUES (:fname, :femail, :fphone)");
        $sth->execute(array(
            "fname" => $_REQUEST['name'],
            "femail" => $_REQUEST['email'],
            "fphone" => $_REQUEST['phone']
        ));
        $userId = $dbh->lastInsertId();
    } catch (PDOException $e) {
        return null;
    }
}
return $userId;

//echo $a = $_SERVER['REQUEST_URI'];
//var_dump($_POST);
/*
function clearDataBeforeInsert($data)
{
    $keys = [
        'name',
        'phone',
        'email',
        'street',
        'home',
        'part',
        'aprt',
        'floor',
        'comment',
        'payment'
    ];

    $result = [];

    foreach ($keys as $value) {
        $result[$value] = (!empty($data[$value])) ? trim($data[$value]) : null;
    }

    return $result;
}

$data = clearDataBeforeInsert($_POST);
print_r($data);*/