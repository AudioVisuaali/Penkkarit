<?php
// Class session
class Session {

  // Public new session
  public function createNewSession($userinfo) {

    // Globals
    global $generate;

    // Start session if not started
    if ($this->checkIfSessionExists() === false) {
      session_start();
    }

    // Destroy session and data
    session_destroy();

    // Start new session
    session_start();

    // Define session variables
    $_SESSION["userinfo"] = $userinfo;
    $_SESSION["sessionhash"] = $generation->getSaltedHash($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'],
                                                          $userinfo["pwd_hash"]);

    return true;

  }

  public function CheckCurrentSession() {

    global $database;
    global $account;

    // Start session
    if ($this->checkSessionExists() === false) {
        session_start();
    }

    // Check if session have needed variables
    if (isset($_SESSION["sessionhash"],
              $_SESSION["userinfo"]["username"],
              $_SESSION["userinfo"]["firstname"],
              $_SESSION["userinfo"]["lastname"],
              $_SESSION["userinfo"]["pwd_hash"],
              $_SESSION["userinfo"]["email"],
              $_SESSION["userinfo"]["verified"],
              $_SESSION["userinfo"]["type"]) === false) {
        // Delete all information unless there is errors set
        if (isset($_SESSION["error"]) === false) {
            header("Location: /");
            exit();
        }
        return false;
    }

    // Get user data
    $userid = $this->getUserId();
    $user = $database->getUserInfo($userid);

  }


  // Check if session is present
  public function checkIfSessionExists() {
      if (session_status() == PHP_SESSION_ACTIVE) {
          return true;
      }
      return false;
  }

  // user id
  public function getUserId() {
      return $_SESSION["userinfo"]["userid"];
  }


}

$session = new Session;
 ?>
