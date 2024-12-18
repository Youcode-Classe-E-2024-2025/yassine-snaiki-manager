<?php
function isPath($path) {
    $url = parse_url($_SERVER['REQUEST_URI'])['path'];
    return $url === $path; 
}