<?php
// Small helpers shared by the admin pages: escaping, CSRF tokens, flash messages.

function h(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function admin_session(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start([
            'cookie_httponly' => true,
            'cookie_samesite' => 'Strict',
            'cookie_secure'   => !empty($_SERVER['HTTPS']),
        ]);
    }
}

// HTTP Basic Auth credentials are re-sent by the browser automatically, so a
// forged cross-site POST would still be authenticated. Every write needs this token.
function csrf_token(): string
{
    admin_session();
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf'];
}

function csrf_valid(?string $token): bool
{
    admin_session();

    return is_string($token) && !empty($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}

function flash_set(string $type, string $message): void
{
    admin_session();
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function flash_take(): ?array
{
    admin_session();
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);

    return $flash;
}
