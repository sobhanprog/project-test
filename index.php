<?php
session_start();
define('BASE_PATH', __DIR__ . "/");
define('DISPLAY_ERROR', true);
include "./bootstrap/index.php";
define('CURRENT_DOMAIN', currentDomain()."/mahan");

require_once BASE_PATH . 'routing/index.php';

echo '404 - page not found';
