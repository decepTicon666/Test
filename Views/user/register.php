<?php require __DIR__ . "/../layout/header.php"; ?>
<?php if (!empty($error)): ?>
  <p>
    <?php echo $error; ?>
  </p>
<?php endif; ?>

<form method="POST" method="insertRegister" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-md-3">
      Vorname:
    </label>
    <div class="col-md-9">
      <input type="text" name="surname" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Nachname:
    </label>
    <div class="col-md-9">
      <input type="text" name="lastname" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Adresse:
    </label>
    <div class="col-md-9">
      <input type="text" name="street" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Hausnummer:
    </label>
    <div class="col-md-9">
      <input type="text" name="number" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Adresse/Zusatz:
    </label>
    <div class="col-md-9">
      <input type="text" name="adress" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Postleitzahl:
    </label>
    <div class="col-md-9">
      <input type="text" name="zipCode" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Stadt:
    </label>
    <div class="col-md-9">
      <input type="text" name="city" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Land:
    </label>
    <div class="col-md-9">
      <input type="text" name="country" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Telefonnummer:
    </label>
    <div class="col-md-9">
      <input type="text" name="phone" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      E-mail Adresse:
    </label>
    <div class="col-md-9">
      <input type="text" name="email" class="form-control"/>
    </div>
  </div>
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
      Passwort:
    </label>
    <div class="col-md-9">
      <input type="password" name="password" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Passwort wiederholen:
    </label>
    <div class="col-md-9">
      <input type="password" name="passwordRepeat" class="form-control"/>
    </div>
  </div>
  <a href="insertRegister" class="btn btn-primary">Registrieren</a>
</form

<?php require __DIR__ . "/../layout/footer.php"; ?>
