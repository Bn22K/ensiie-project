
<div class="wrapper">
  <div class="form-header">
    <h1>Connexion :</h1>
  </div>
<form action="login.php" method="post">
  <div class="form-grp">
    <label>Email :</label>
    <input type="email" name="email" />
  </div>
  <div class="form-grp">
    <label>Mot de passe :</label>
    <input type="password" name="password" />
  </div>
  <?php if (isset($data['failedAuthent'])): ?>
      <span class="error-message"><?= $data['failedAuthent'] ?></span>
    <?php endif; ?>
  <input type="submit" value="Connexion"></input>
</form>
</div>