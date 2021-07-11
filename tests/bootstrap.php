<?php
/**
 * This is the bootstrap for running tests, you can add additional configuration
 * or setup for your testing needs.
 */
use Origin\Core\Config;

require dirname(__DIR__) . '/config/bootstrap.php';

Config::write('App.url', 'http://localhost');
