<?php

declare(strict_types=1);

require __DIR__.'/_auth.php';
admin_logout();
header('Location: login.php');
exit;
