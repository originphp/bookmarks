<?php
/**
 * Front Controller.
 */

define('START_TIME', microtime(true));

/**
 * Start the Origin Bootstrap Process.
 */
require dirname(__DIR__) . '/vendor/originphp/framework/src/bootstrap.php';

$Dispatcher = new Origin\Http\Dispatcher();
$Dispatcher->start();
