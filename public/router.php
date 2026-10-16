<?php
// Router for PHP's built-in server (the equivalent of public/.htaccess):
//   php -S localhost:8080 -t public public/router.php
$Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($Path !== '/' && is_file(__DIR__ . $Path)) {
    return false; // serve the asset as is
}
$_GET['url'] = ltrim(urldecode($Path), '/');
require __DIR__ . '/index.php';
