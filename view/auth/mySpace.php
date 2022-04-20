<?php $title = 'Membre'; ?>

<?php ob_start(); ?>

<?php include('../view/includes/header.php'); ?>

<div class="container my-5 pb-5">

  <h1>membre.php</h1>

  <a href="index.php?action=myAccount">My account</a>

</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>