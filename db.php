<?php
$dsn = 'mysql:host=localhost;dbname=php_final_project';
$username = 'root';
$password = '';
$options = [];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
}