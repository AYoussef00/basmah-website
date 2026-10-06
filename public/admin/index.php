<?php

declare(strict_types=1);

require __DIR__.'/_auth.php';

header('Location: '.(admin_logged_in() ? 'dashboard.php' : 'login.php'));
exit;
