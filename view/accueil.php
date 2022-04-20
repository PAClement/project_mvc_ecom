<?php $title = 'Mon accueil'; ?>

<?php ob_start(); ?>

<?php include('includes/header.php') ?>

<h1>Accueil</h1>

<h2>Welcome to the best ecom website!</h2>

<?php include('includes/footer.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>