<?php

// Global constants

define('LDFF_VERSION', 1);

define('LDFF_SCRAPING_ROOT', 'http://ludumdare.com/compo/');
define('LDFF_SCRAPING_PAGE_SIZE', 24);

// Includes

require_once(__DIR__ . '/../vendor/autoload.php'); // TODO Optimize imports
require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/db.php');
require_once(__DIR__ . '/setting.php');
require_once(__DIR__ . '/http.php');
require_once(__DIR__ . '/scraping.php');

// PHP Errors level

if (LDFF_PRODUCTION) {
	error_reporting(E_ERROR);
}
else {
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
}

?>
