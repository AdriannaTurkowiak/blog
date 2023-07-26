<?php

session_start();
require "includes/url.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if($_POST['username'] == 'Ada' && $_POST['password'] == '123') {
      session_regenerate_id(true);
    $_SESSION['is_logged'] = true;
    redirect('/');}

  else {

    $error = 'Błąd logowania!';
  }
  }
?>

<?php require 'includes/header.php'; ?>


<h2>Logowanie</h2>
<?php if (!empty($error)): ?>
  <p><?= $error ?></p>
  <?php endif; ?>


<form method="post">
  <div>
      <label for="username">Login</label>
      <input name="username" id="username">
  </div>   
  <div>
      <label for="password">Hasło</label>
      <input type ="password" name="password" id="password">
  </div>     

  <button>Zaloguj</button>

</form>

<?php require 'includes/footer.php';  ?>