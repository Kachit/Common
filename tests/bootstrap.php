<?php
/**
 * @var Composer\Autoload\ClassLoader $autoloader
 */
$autoloader = require_once __DIR__ . '/../vendor/autoload.php';
$autoloader->add('Kachit\Common\Test', __DIR__);
$autoloader->add('Kachit\Common\Testable', __DIR__);