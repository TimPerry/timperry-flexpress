<?php

$parentDir = dirname(__DIR__);

# Disables all core updates:
define('WP_AUTO_UPDATE_CORE', false);

require_once($parentDir . '/vendor/autoload.php');
require_once($parentDir . '/config/app.php');
require_once(ABSPATH . 'wp-settings.php');
