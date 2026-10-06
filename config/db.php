<?php
// Central database connection. Every page that needs the DB should
// `require` this file instead of hardcoding credentials.
//
// Credentials come from real environment variables when the host
// supports them (DB_SERVER / DB_NAME / DB_USER / DB_PASSWORD), or from
// a local, gitignored config/db.local.php on hosts that don't.
mb_internal_encoding('UTF-8');

$dbServer   = getenv('DB_SERVER')   ?: 'localhost';
$dbName     = getenv('DB_NAME')     ?: 'badadmin_users';
$dbUser     = getenv('DB_USER')     ?: 'badadmin_admin';
$dbPassword = getenv('DB_PASSWORD') ?: null;

$localConfig = __DIR__ . '/db.local.php';
if ($dbPassword === null && is_file($localConfig)) {
    require $localConfig;
}

if (empty($dbPassword)) {
    http_response_code(500);
    exit('Database configuration missing: set DB_PASSWORD (and optionally DB_SERVER/DB_NAME/DB_USER) as environment variables, or copy config/db.local.php.example to config/db.local.php.');
}

$dsn = "mysql:host=$dbServer;dbname=$dbName;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$db = new PDO($dsn, $dbUser, $dbPassword, $options);
