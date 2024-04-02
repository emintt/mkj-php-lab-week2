<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remember-me'])) {
        $_SESSION['username'] = $_POST['username'];
    } else {
        unset($_SESSION['username']);
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="username">Username</label>
  <input <?php
    if (isset($_SESSION['username'])) {
      echo 'value=' . $_SESSION['username'] . '"';
    }

  ?> type="text" name="username" id="username" />
  <br>
  <label for="remember-me">Remember me</label>
  <input type="checkbox" id="remember-me" name="remember-me">
  <br>
  <input type="submit" />
</form>
