<?php $title = 'Article view'; ?>

<?php ob_start(); ?>

<?php include('includes/header.php') ?>

<div class="container">
    <a href="index.php" class="btn bg-orange text-white btn-bg-orange mb-5"><i class='bx bx-left-arrow-alt align-baseline'></i> Retour</a>
    <div class="d-flex mb-5">
        <div class="productViewImageFrame">
            <img src="https://placeholdpic.com/300x600" class="img-fluid productViewImage" alt="product_image">
        </div>
        <div class="flex-colmuns ps-5">
            <h2 class="mb-5"><?= $oneProduct["nom"] ?></h2>
            <h6 class="mb-5"><?= $oneProduct["description"] ?></h6>
            <h3 class="mb-5"><?= $oneProduct["prix"] ?> €</h3>
            <a href="index.php?action=addCart&id=<?= $oneProduct['id'] ?>" class="btn bg-orange text-white btn-bg-orange">
                <i class='bx bx-cart-download fs-4'></i>
                <span class="align-top"> Ajouter au panier</span>
            </a>
            <ul class="mt-5">
                <li>Categorie : <?= $oneProduct["nom_category"] ?></li>
                <li>Marque : <?= $oneProduct["nom_marque"] ?></li>
            </ul>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>