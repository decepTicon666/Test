<?php require __DIR__ . "/../layout/header.php"; ?>
<?php if (!empty($error)): ?>
  <p>
    <?php echo $error; ?>
  </p>
<?php endif; ?>

<form method="POST" method="passwordResetSend" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-md-3">
      Email:
    </label>
    <div class="col-md-9">
      <input type="email" name="email" class="form-control"/>
    </div>
  </div>
  <input type="submit" value="Senden" class="btn btn-primary"/>
</form

<?php require __DIR__ . "/../layout/footer.php"; ?>
