<!--Assignment 3
Create a form that has the following fields:
Username
Remember me (checkbox)
Submit button
When the form is submitted, check if the "Remember me" checkbox is checked.
    If it is, create a session variable that stores the username. If it is not, delete the session variable.
When the page is loaded, check if the session variable is set.
    If it is, fill in the username field with the value from the session variable.
Use the same file for the form and the script.
-->
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
