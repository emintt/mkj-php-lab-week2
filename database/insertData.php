<?php
global $DBH;
require 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // name attribute on form
  if (isset($_POST['title']) && isset($_POST['description']) && $_FILES['file'] !== null) {
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $filesize = $_FILES['file']['size'];
    $temp_file = $_FILES['file']['tmp_name'];
    $destination = __DIR__ . '/uploads/' . $filename;
    if (!move_uploaded_file($temp_file, $destination)) {
      // header('Location: home.php?success=File upload failed');
      exit;
    }

    $data = [
      'user_id' => 1,
//      'filename' => 'https://placekitten.com/640',
      'filename' => $filename,
      'media_type' => $filetype,
      'title' => $_POST['title'],
      'description' => $_POST['description'],
      'filesize' => $filesize,
    ];

    $sql = 'INSERT INTO MediaItems (user_id, filename, filesize, media_type, title, description) 
                VALUES (:user_id, :filename, :filesize, :media_type, :title, :description)';

    try {
      // statement handle
      $STH = $DBH->prepare($sql);
      $STH->execute($data);
      header('Location: index.php?success=Item added');
    } catch (PDOException $e) {
      echo "Could not select data from the database." . $e->getMessage();
      file_put_contents('PDOErrors.txt', 'selectData.php - ' . $e->getMessage(), FILE_APPEND);
    }
  }
}
