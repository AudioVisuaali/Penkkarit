<?php
// Class Generate
Class Generate {
  // Henerate cryptographically secure pseudo random string
  public function getRandomHash($len=128) {
    // Generate pseudo random bytes and SHA512 hash
    $hash = hash("sha256", openssl_random_pseudo_bytes(32));
    // Cut hash to wanted length
    $cuthash = substr($hash, 0, $len);

    return $cuthash;
  }

  // Generate hash from word and salt
  public function getSaltedHash($word, $salt) {
      //hash
      $hash = hash('sha256', $word . $salt);

      // Hash
      return $hash;
  }
}

// Start
$generate = new Generate;
?>
