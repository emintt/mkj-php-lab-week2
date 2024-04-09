<?php
// lähetä PHPSESSIOID cookiessa
session_start();
global $DBH;
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/dbConnect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['username']) && isset($_POST['password'])) {
    // hash password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "SELECT * FROM Users WHERE username = :username AND password = :password";
    $data = [
      'username' => $_POST['username'],
      'password' => $password,
    ];
    try {
      $STH = $DBH->prepare($sql);
      $STH->execute($data);
      $user = $STH->fetch(PDO::FETCH_ASSOC);
      print_r($user);
      if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        print_r($_SESSION['user']);
        // redirect to secret page
        header('Location: home.php');
        exit;
      } else {
        // header('Location: index.php?success=Invalid username or password');
      }
    } catch (PDOException $e) {
      echo "Could not insert data into the database." . $e->getMessage();
      file_put_contents('PDOErrors.txt', 'insertData.php - ' . $e->getMessage(), FILE_APPEND);
    }
  }
}
