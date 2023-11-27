<?php
  $db_server = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "blogdb";
  $conn = "";

  try{
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
  } catch(mysqli_sql_exception) {
      header("location: php-pages/could.php");
  }
  
?>