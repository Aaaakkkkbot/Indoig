<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$uriSegments = explode('/', trim($uri, '/'));
$lastSegment = end($uriSegments);
if ($lastSegment === 'get.php') {
    // If yes, replace the last segment with "index.php"
    array_pop($uriSegments);
    $uri = implode('/', $uriSegments) . '/index.php';
}
$currentUrl = "$protocol://$host$uri";
?>