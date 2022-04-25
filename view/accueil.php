<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<?php include('includes/header.php') ?>

<div class="container">
    <div class="d-flex justify-content-between my-5 flex-wrap gap-3">
        <?php for ($i = 0; $i < count($productList); $i++) : ?>
            <div class="card" style="width: 18rem;">
                <!-- <img src="https://via.placeholder.com/1500" class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title"><?= $productList[$i]['nom'] ?></h5>
                    <p class="card-text"><?= $productList[$i]['description'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Prix : <?= $productList[$i]['prix'] ?> € </li>
                    <li class="list-group-item">Marque : <?= $productList[$i]['nom_marque'] ?></li>
                    <li class="list-group-item">Categorie : <?= $productList[$i]['nom_category'] ?></li>
                </ul>
                <div class="card-footer py-3">
                    <a href="index.php?action=viewProduct&id=<?= $productList[$i]['id'] ?>" class="btn bg-orange btn-bg-orange text-white">Voir le produit</a>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>


<?php include('includes/footer.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>