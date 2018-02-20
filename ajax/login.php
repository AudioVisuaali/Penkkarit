<?php
require_once("../engine/library.php");

echo json_encode($account->checkNewLogin($_POST));
?>
