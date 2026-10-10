<?php
// Central database connection. Every page that needs the DB should
// `require` this file instead of hardcoding credentials.
//
// Credentials come from real environment variables if the host sets them
// (cPanel's PHP doesn't load .env files), otherwise from a gitignored
// config/db.local.php; see config/db.local.php.example.
require_once __DIR__ . '/../src/Database.php';

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
    exit('Database configuration missing: set DB_PASSWORD (and optionally DB_SERVER/DB_NAME/DB_USER) as environment variables, or copy config/db.local.php.example to config/db.local.php (on cPanel: /home/badadmin/config/db.local.php).');
}

$db = Database::connect($dbServer, $dbName, $dbUser, $dbPassword);
