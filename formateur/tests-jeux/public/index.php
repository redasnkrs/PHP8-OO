<?php

use Twig\Loader\FilesystemLoader;

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../template');
$twig = new \Twig\Environment($loader, [
   // 'cache' => '/path/to/compilation_cache',
]);