<?php
// Router for PHP Built-in Web Server
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$filePath = __DIR__ . $uri;

// 1. If requested path is a real file (CSS, JS, Images), let PHP serve it directly
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    return false;
}

// 2. If URL without extension maps to a .php file (e.g. /pages/book-appointment -> /pages/book-appointment.php)
if (file_exists($filePath . '.php') && !is_dir($filePath . '.php')) {
    require $filePath . '.php';
    return true;
}

// 3. Directory index routing
if (is_dir($filePath)) {
    $indexFile = rtrim($filePath, '/') . '/index.php';
    if (file_exists($indexFile)) {
        require $indexFile;
        return true;
    }
}

return false;
