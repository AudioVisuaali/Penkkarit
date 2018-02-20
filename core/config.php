<?php
// config.php
// Define vars for config
$vars = array(
  "database" => array(                // Database connection variables
        "host" => "localhost",          // Host address
        "username" => "root",            // Username
        "password" => "Krypt0n1te",      // Password
        "database" => "penkkarit_v1"             // Database name
      ),
      "creator_settings" => array(
        "show_errors" => true
      )
);

// Class config
Class Config {
  // construct
  public function __construct($vars) {
    // for list/item in list
    foreach ($vars as $key =>$var) {
      // if list create a index for key
      if (is_array($var)) {
        $this->$key = new Config($var);
      } else {
        $this->$key = $var;
      }
    }
  }
}

// create
$config = new Config($vars);
?>
