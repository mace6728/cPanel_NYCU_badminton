<?php
/**
 * Shared response-formatting helpers for admin/*.php and api/*.php endpoints.
 */

function send_html_header(): void
{
    header('Content-Type: text/html; charset=utf-8');
}

function send_json_header(): void
{
    header('Content-Type: application/json; charset=utf-8');
}

function respond_success(): void
{
    echo 'success';
}

function respond_failure(): void
{
    echo 'fail';
}

function respond_db_error(PDOException $e): void
{
    http_response_code(500);
    echo 'Database Error: ' . $e->getMessage();
}

function respond_logic_error(Exception $e, string $prefix = 'Logic Error: '): void
{
    http_response_code(400);
    echo $prefix . $e->getMessage();
}
