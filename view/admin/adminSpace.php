<?php $title = 'Espace Admin'; ?>

<?php ob_start(); ?>

<?php include('../view/includes/header.php'); ?>

<div class="container my-5 pb-5">

    <h2>Espac adminsitration</h2>

    <a class="" href="index.php?action=adminAccount">Admin Account</a>
    <a class="" href="index.php?action=userGestion">User gestion</a>

</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>