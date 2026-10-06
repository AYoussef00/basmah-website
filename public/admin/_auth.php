<?php

declare(strict_types=1);

session_start();

const ADMIN_USERNAME = 'admin';
const ADMIN_PASSWORD = 'password';

function admin_logged_in(): bool
{
    return ! empty($_SESSION['basma_admin']);
}

function require_admin(): void
{
    if (! admin_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

function attempt_login(string $username, string $password): bool
{
    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        session_regenerate_id(true);
        $_SESSION['basma_admin'] = [
            'username' => ADMIN_USERNAME,
            'name' => 'مدير بصمة',
        ];

        return true;
    }

    return false;
}

function admin_logout(): void
{
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], (bool) $params['secure'], (bool) $params['httponly']);
    }
    session_destroy();
}
