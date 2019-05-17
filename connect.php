<?php

$mysqli = new mysqli($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

?>