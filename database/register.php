<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
global $DBH;
require 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $data = [
      'username' => $_POST['username'],
      'password' => password_hash($_POST['password'], PASSWORD_BCRYPT_DEFAULT_COST),
      'email' => $_POST['email'],
    ];

    $sql = 'INSERT INTO Users (username, password, email) VALUES (:username, :password, :email)';

    try {
      $STH = $DBH->prepare($sql);
      $STH->execute($data);
      header('Location: login.php?success=Item added');
    } catch (PDOException $e) {
      echo "Could not insert data into the database.";
      file_put_contents('PDOErrors.txt', 'insertData.php - ' . $e->getMessage(), FILE_APPEND);
    }
  }
}