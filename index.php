<?php
session_start();
define('BASE_PATH', __DIR__ . "/");
include "./bootstrap/index.php";
define('CURRENT_DOMAIN', currentDomain());

require_once BASE_PATH . 'routing/index.php';

echo '404 - page not found';
