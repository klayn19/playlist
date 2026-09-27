<?php

$localConfigPath = __DIR__ . '/config.local.php';
$config = is_file($localConfigPath)
    ? require $localConfigPath
    : require __DIR__ . '/config.php';
$database = $config['database'];

try {
    $conn = new PDO(
        'mysql:host=' . $database['host'] . ';dbname=' . $database['name'] . ';charset=utf8mb4',
        $database['username'],
        $database['password']
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit('Database connection failed. Check the database configuration.');
}

?>