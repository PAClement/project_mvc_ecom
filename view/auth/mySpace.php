<?php $title = 'Membre'; ?>

<?php ob_start(); ?>

<?php include('../view/includes/header.php'); ?>

<div class="container my-5 pb-5">

  <div class="d-flex justify-content-around frameUserGlobal">
    <?php ViewTemplate::frameAccount("myAccount", "bx-user", "Votre compte")  ?>
    <?php ViewTemplate::frameAccount("myOrder", "bxs-package", "Vos commandes")  ?>
  </div>

</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>