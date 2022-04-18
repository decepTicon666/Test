<?php require __DIR__ . "/../layout/header.php"; ?>
<?php if (!empty($error)): ?>
  <p>
    <?php echo $error; ?>
  </p>
<?php endif; ?>

<form method="POST" method="login" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-md-3">
      Benutzername:
    </label>
    <div class="col-md-9">
      <input type="text" name="username" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Password:
    </label>
    <div class="col-md-9">
      <input type="password" name="password" class="form-control"/>
    </div>
  </div>

  <input type="submit" value="Einloggen" class="btn btn-primary"/>
</form>
<a href="register" class="btn btn-primary">Registrieren</a>
<a href="passwordReset" class="btn btn-primary">Passwort vergessen</a>

<?php require __DIR__ . "/../layout/footer.php"; ?>
