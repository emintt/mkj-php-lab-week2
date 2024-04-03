<?php
// dbConnect.php

global $host, $dbname, $username, $password;

require 'dbconfig.php';

$dsn = "mysql:host=$host;dbname=$dbname;port=3307;charset=utf8";

try {
  $DBH = new PDO($dsn, $username, $password);
  $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch(PDOException $e) {
  echo "Could not connect to database." .  $e->getMessage();
  file_put_contents('PDOErrors.txt', 'dbConnect.php - ' . $e->getMessage(), FILE_APPEND);
}
?>
