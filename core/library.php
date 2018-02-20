<?php

// Require config
require_once("config.php");
// Error reporting

// Error reporting
if ($config->creator_settings->show_errors) {
    ini_set('display_errors', 1);
    error_reporting(~0);
}

// Get core
require_once("generate.php");
require_once("database.php");
require_once("account.php");

?>
