<?php $title = 'Article view'; ?>

<?php ob_start(); ?>

<?php include('includes/header.php') ?>

<div class="container">
    <a href=javascript:history.go(-1) class="btn btn-orange-outline mb-3"><i class='bx bx-left-arrow-alt align-baseline'></i> Retour</a>
    <h2 class="mb-5">Votre panier : </h2>
</div>

<?php include('includes/footer.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>