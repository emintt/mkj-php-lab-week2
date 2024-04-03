<!--Create a form that has the following fields:
Username
Remember me (checkbox)
Submit button
When the form is submitted, check if the "Remember me" checkbox is checked.
    If it is, create a cookie that stores the username. If it is not, delete the cookie.
When the page is loaded, check if the cookie is set.
    If it is, add the username from the cookie to input field's value. Also set the checkbox to checked.
Use the same file for the form and the script.-->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  print_r($_POST);

  if (isset($_POST['remember-me'])) {
    setcookie('username', $_POST['username'], time() + 24 * 60 * 60);
  } else {
    setcookie('username', '', time() - 3600);
  }

  // refresh page to update cookie
  // send a 'location' header to instruct browser to redirect,
  // $_SERVER['PHP_SELF']: super global variable that contain the file name of then currently executing script
  header('Location: ' . $_SERVER['PHP_SELF']);
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="username">Username</label>
  <input <?php
    // Use $_COOKIE to read a cookie
    if (isset($_COOKIE['username'])) {
      echo 'value="' . $_COOKIE['username'] . '"';

    }

  ?> type="text" name="username" id="username" />
  <br>
  <label for="remember-me">Remember me</label>
  <input <?php
    if (isset($_COOKIE['username'])) {
        echo 'checked';
    }
  ?>
          type="checkbox" id="remember-me" name="remember-me">
  <br>
  <input type="submit" />
</form>
