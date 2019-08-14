<?php

  session_start();
  session_destroy();
  echo "Logout";
  header('Location: index.php');

?>
