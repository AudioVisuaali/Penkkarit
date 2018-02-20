<?php
// Class account
Class Account {

  // Create new account
  public function createNewAccount($forminfo) {

    // Global
    global $database;
    global $generate;

    // User input data
    $neededData = ["username" => "Virheellinen käyttäjänimi!",
                   "firstname" => "Syötä etunimi!",
                   "lastname" => "Syötä sukunimi!",
                   "password" => "Syötä salasana!",
                   "password_2" => "Salasanat eivät täsmää!",
                   "email" => "Syötä sähköpostiosoite!",
                   "type" => "Valitse opiskelija tai opettaja!"];

    // Going through keys
    foreach ($neededData as $key => $value) {
      // Checking data
      if (!(isset($forminfo[$key]))) {
        return ["state" => "error", "message" => $value];
      }
    }

    // Cheking username
    if ($forminfo["username"]) {
      if (strlen($forminfo["username"]) <= 4 || strlen($forminfo["username"]) > 32) {
        return ["state" => "error", "message" => $value];
      }
    }

    // Checking firstname length
    if ($forminfo["firstname"]) {
      if (strlen($forminfo["firstname"]) <= 1 || strlen($forminfo["firstname"]) > 32) {
        return ["state" => "error", "message" => $value];
      }
    }

    // Checking lastname length
    if ($forminfo["lastname"]) {
      if (strlen($forminfo["lastname"]) <= 1 || strlen($forminfo["lastname"]) > 32) {
        return ["state" => "error", "message" => $value];
      }
    }

    // Password match check
    if (strcmp($forminfo["password"], $forminfo["password_2"]) !== 0) {
      return ["state" => "error", "message" => "Salasanat eivät täsmää!"];
    }

    // Email filter
    if (filter_var($forminfo["email"], FILTER_VALIDATE_EMAIL) === false) {
      return ["state" => "error", "message" => "Virheellinen sähköpostiosoite!"];
    }

    // User type
    if ($forminfo["type"] !== "0" && $forminfo["type"] !== "1") {
      return ["state" => "error", "message" => "Virheellinen käyttäjätyyppi!"];
    }
    // Username check
    if ($database->isUniqueUserInfo("username", $forminfo["username"])) {
      return ["state" => "error", "message" => "Käyttäjänimi olemassa!"];
    }

    // Email check
    if ($database->isUniqueUserInfo("email", $forminfo["email"])) {
      return ["state" => "error", "message" => "Sähköpostiosoite on olemassa!"];
    }

    // Salt
    $forminfo["salt"] = $generate->getRandomHash();

    // hash
    $forminfo["password"] = $generate->getSaltedHash($forminfo["password"], $forminfo["salt"]);

    // Create user
    $creation = $database->createNewAccount($forminfo);
    return ["state" => "success", "message" => "Account ceated!"];

  }

  public function checkNewLogin($post) {
    global $database;
    global $generate;
    global $session;

    if (isset($post["username"]) === false || $post["username"] == "") {
      return ["state" => "error", "message" => "Syötä käyttäjätunnus!"];
    }

    // Check if password is not set
    if (isset($post["password"]) === false || $post["password"] == "") {
      return ["state" => "error", "message" => "Syötä salasana!"];
    }

    // Create variables
    $username = $post["username"];
    $password = $post["password"];

    $result = $database->getUserInfo($username);

    if ($result === false) {
      return ["state" => "error", "message" => "Tapahtui virhe!"];
    }

    if ($result === "empty") {
        return ["state" => "error", "message" => "Käyttäjätunnus tai salasana on väärä!"];
    }

    $passwordCheck = $generate->getSaltedHash($pwd, $result["pwd_salt"]);

    // If hashes do not match, password was wrong
    if (strcmp($result["pwd_hash"],$passwordCheck) !== 0) {
        return ["state" => "error", "message" => "Käyttäjätunnus tai salasana on väärä!"];
    }

    // If success, continue to create new session
    $session->newLoginSession($result);

    return ["state" => "success", "message" => "Kirjautuminen onnistui!"];

  }



}
$account = new Account;
 ?>
