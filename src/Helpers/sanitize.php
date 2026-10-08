<?php
/**
 * Shared $_POST input-handling helpers for admin/*.php endpoints.
 * These only normalize access (defaults, presence checks); they don't
 * escape or validate content, matching the endpoints' existing behavior.
 */

function post_or_default(string $key, string $default = ''): string
{
    return $_POST[$key] ?? $default;
}

function post_nonempty_string(string $key): ?string
{
    $value = $_POST[$key] ?? '';

    return $value !== '' ? $value : null;
}

function decode_rich_text(string $encoded): string
{
    return base64_decode($encoded);
}

function post_time_or_now(): string
{
    return !empty($_POST['time']) ? $_POST['time'] : date('Y-m-d H:i:s');
}
