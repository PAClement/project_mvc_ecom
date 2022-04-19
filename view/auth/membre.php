<?php $title = 'Membre'; ?>

<?php ob_start(); ?>

<h1>Espace membre</h1>

<div class="container my-5 pb-5">

  <h2 class="my-5">Bonjour <?= $info['nom'] . ' ' . $info['prenom'] ?></h2>

  <h4>Voici vos informations</h4>
  <ul class="list-group">
    <li class="list-group-item"><strong>Votre mail : </strong><?= $info['mail'] ?></li>
    <li class="list-group-item"><strong>Votre address : </strong><?= $info['address'] ?></li>
    <li class="list-group-item"><strong>Votre tel : </strong><?= $info['tel'] ?></li>
    <li class="list-group-item"><strong>Date d'inscription : </strong><?= $info['date_inscription'] ?></li>
  </ul>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>