<?php
var_dump($_REQUEST);
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