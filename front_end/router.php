<?php
$uri = $_SERVER["REQUEST_URI"];

if($uri === '/' || $uri === '/index.php'){
    require 'front_end/login.php';
} else {
    return false;
}