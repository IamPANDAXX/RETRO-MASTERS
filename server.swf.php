<?php
$file = $_GET['file'] ?? '';

$path = __DIR__ . "/games/" . $file;

if (!file_exists($path)) {
    header("HTTP/1.1 404 Not Found");
    exit("Archivo no encontrado");
}

header("Content-Type: application/x-shockwave-flash");
header("Content-Length: " . filesize($path));

readfile($path);
exit;
