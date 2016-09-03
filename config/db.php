<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=' . (!empty(getenv('DBNAME')) ? getenv('DBNAME') : 'tinhte'),
    'username' => !empty(getenv('DBUSERNAME')) ? getenv('DBUSERNAME') : 'root',
    'password' => !empty(getenv('DBPASSWORD')) ? getenv('DBPASSWORD') : 'root',
    'charset' => 'utf8',
];