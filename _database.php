<?php
 // database connection

$config = [
    'user'      => 'root',
    'pass'      => 'admin',
    'database'  => 'grocerylist',
    'host'      => 'db'
];

$db = new \PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['database'], $config['user'], $config['pass']);

