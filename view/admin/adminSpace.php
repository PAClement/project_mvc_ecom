<?php $title = 'Espace Admin'; ?>

<?php ob_start(); ?>

<?php include('../view/includes/header.php'); ?>

<div class="container my-5 pb-5">

    <div class="d-flex justify-content-around frameUserGlobal">
        <?php ViewTemplate::frameAccount("adminAccount", "bx-user", "Votre compte")  ?>
        <?php ViewTemplate::frameAccount("userGestion", "bxs-group", "Gestion utilisateur")  ?>
        <?php ViewTemplate::frameAccount("adminProducts", "bxl-product-hunt", "Gestion produits et +")  ?>
    </div>

</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>