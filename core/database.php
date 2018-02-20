<?php
// Database class
Class Database {

  // Private
  private $handler;

  // Construct
  public function __construct() {

    // Global
    global $config;

    // Try to connect to the datavase
    try {
      $this->handler = new PDO("mysql:host=" . $config->database->host . ";dbname=" . $config->database->database,
      $config->database->username,
      $config->database->password
      );

      // Error mode
      $this->handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // set the PDO error mode to exception
    } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  // Checks unique info
  public function isUniqueUserInfo($column, $value, $table = "users") {

    // Query Must insert with . $value . cause otherwise error, Bindparam for values
    $query = "SELECT COUNT(*) AS `count` FROM " . $table . " WHERE " . $column . " = :value AND 'deleted' = 0;";

    // Prepare
    $stmt = $this->handler->prepare($query);
    $stmt->bindParam(':value', $value);

    // Execute
    if ($stmt->execute() === false) {
      return false;
    }

    // Fetch
    $userinfo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Empty
    if ($userinfo === false) {
      return false;

    // Not empty
    } else {

      // is unique
      if ($userinfo['count'] !== "0") {
        return true;

      // is not unique
      } else {
        return false;
      }

    }
  }

  public function createNewAccount($forminfo) {

    // Query
    $query = "INSERT INTO users (username, firstname, lastname, pwd_salt, pwd_hash, email, verified, type, deleted) VALUES (:username, :firstname, :lastname, :pwd_salt, :pwd_hash, :email, 0, :type, 0);";

    // Prepare
    $stmt = $this->handler->prepare($query);
    $stmt->bindParam(':username', $forminfo["username"]);
    $stmt->bindParam(':firstname', $forminfo["firstname"]);
    $stmt->bindParam(':lastname', $forminfo["lastname"]);
    $stmt->bindParam(':pwd_salt', $forminfo["salt"]);
    $stmt->bindParam(':pwd_hash', $forminfo["password"]);
    $stmt->bindParam(':email', $forminfo["email"]);
    $stmt->bindParam(':type', $forminfo["type"]);

    // Execute query
    if ($stmt->execute() === true) {
      if ($stmt->rowCount() == 1) {
        return true;
      }
      else {
        return "empty";
      }
    }
    else {
      return false;
    }

  }


  public function getUserInfo($username) {

    // Query Must insert with . $value . cause otherwise error, Bindparam for values
    $query = "SELECT * FROM users WHERE username = :username AND 'deleted' = 0;";

    // Prepare
    $stmt = $this->handler->prepare($query);
    $stmt->bindParam(':username', $username);

    // Execute
    if ($stmt->execute() === false) {
      return false;
    }

    // Fetch
    $userinfo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Empty
    if ($userinfo === false) {
      return false;

    // Not empty
    } else {
      return $userinfo;
    }
  }


  }


}
$database = New Database;
 ?>
