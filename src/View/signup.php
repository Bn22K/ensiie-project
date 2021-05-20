<div class="wrapper">
<div class="form-header">
    <h1>Inscription :</h1>
  </div>
<form action="signup.php" method="post">
<div class="form-grp">
    <label>Nom :</label>
    <input type="text" name="nom" required/>
  </div>
  <span id='missNom'></span><br>
  <div class="form-grp">
    <label>Prenom :</label>
    <input type="text" name="prenom" required/>
  </div>
  <span id='missPrenom'></span><br>
  <div class="form-grp">
    <label>Email :</label>
    <input type="email" name="email" required/>
    <?php if (isset($data['userAlreadyExist'])): ?>
      <span class="error-message"><?= $data['userAlreadyExist'] ?></span>
    <?php endif; ?>
  </div>
  <span id='missEmail'></span><br>
  <div class="form-grp">
    <label>Mot de passe (8 caractères minimum):</label>
    <input type="password" name="password" minlength="8" required />
  </div>
  <span id='missPassword'></span><br>
  <div class="form-grp">
    <label>Vérification du mot de passe :</label>
    <input type="password" name="password_verify" />
    <?php if (isset($data['passwordDoesNotMatch'])): ?>
      <span class="error-message"><?= $data['passwordDoesNotMatch'] ?></span>
    <?php endif; ?>
  </div>
  <span id='missPasswordVerif'></span><br>
  <button type="submit" >Valider</button>
</form>
</div>
<script src="assets/js/verif.js"> </script>