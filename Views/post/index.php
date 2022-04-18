<?php include __DIR__ . "/../layout/header.php"; ?>

<ul>
  <br>
  <br>
  <?php
  foreach ($posts AS $post):  ?>
    <li>
      <a href="post?id=<?php echo e($post->id); ?>">
    <?php echo e($post->title); ?>
    </li>
<?php //Elegantere Methode, um eine foreach Schleife zu schließen, beginnt mit : ?>
  <?php endforeach; ?>
</ul>

<?php include __DIR__ . "/../layout/footer.php"; ?>
