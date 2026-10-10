<?php
// Central database connection. Every page that needs the DB should
// `require` this file instead of hardcoding credentials.
//
// Credentials come from, in order of priority: real environment
// variables set by the host, a gitignored .env file (see .env.example)
// for hosts that don't support setting real env vars, or a gitignored
// config/db.local.php as a last resort.
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
    exit('Database configuration missing: set DB_PASSWORD (and optionally DB_SERVER/DB_NAME/DB_USER) as environment variables, or copy config/db.local.php.example to config/db.local.php.');
}

$db = Database::connect($dbServer, $dbName, $dbUser, $dbPassword);
