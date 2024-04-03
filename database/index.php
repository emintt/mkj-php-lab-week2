<?php
require_once __DIR__ . '/inc/header.php';
?>
<section>
  <h1>Login</h1>
  <form action="login.php" method="post">
    <div>
      <label for="username">Username</label>
      <input type="text" name="username" id="username">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password" id="password">
    </div>
    <div>
      <input type="submit" value="Login">
    </div>
  </form>
</section>
<section>
  <h1>Register</h1>
  <form action="register.php" method="post">
    <div>
      <label for="username">Username</label>
      <input type="text" name="username" id="username">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password" id="password">
    </div>
    <div>
      <label for="email">Email</label>
      <input type="email " name="email" id="email">
    </div>
    <div>
      <input type="submit" value="Register">
    </div>
  </form>
</section>