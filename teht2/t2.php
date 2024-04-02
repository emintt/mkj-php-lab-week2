<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $remember_me = $_POST['remember-me'];
  $username = $_POST['username'];
  print_r($_POST);

  if (isset($_POST['remember-me'])) {
    setcookie('username', $username);
  } else {
    setcookie('username', '', time() - 3600);
  }

  // refresh page to update cookie
  header('Location');
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="username">Username</label>
  <input <?php
    if (isset($_COOKIE['username'])) {
      echo 'value=' . $_COOKIE['username'] . '"';
    }

  ?> type="text" name="username" id="username" />
  <br>
  <label for="remember-me">Remember me</label>
  <input type="checkbox" id="remember-me" name="remember-me">
  <br>
  <input type="submit" />
</form>
