<?php
  //start the session so we can access the variables
  session_start();
  //destroy the session variables so that you are logged out
  session_destroy();
  //Redirect back to the index page
  header('Location: index.php');

?>
