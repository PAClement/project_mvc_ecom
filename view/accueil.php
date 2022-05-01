<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<?php include('includes/header.php') ?>

<div class="container">
    <div class="d-flex justify-content-between my-5 flex-wrap gap-3">
        <?php foreach ($productList as $valProduct) : ?>
            <div class="card" style="width: 18rem;">
                <!-- <img src="https://via.placeholder.com/1500" class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title"><?= $valProduct['nom'] ?></h5>
                    <p class="card-text"><?= $valProduct['description'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Prix : <?= $valProduct['prix'] ?> € </li>
                    <li class="list-group-item">Marque : <?= $valProduct['nom_marque'] ?></li>
                    <li class="list-group-item">Categorie : <?= $valProduct['nom_category'] ?></li>
                </ul>
                <div class="card-footer py-3">
                    <a href="index.php?action=viewProduct&id=<?= $valProduct['id'] ?>" class="btn bg-orange btn-bg-orange text-white">Voir le produit</a>
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <a href="index.php?action=addCart&id=<?= $valProduct['id'] ?>" class="btn bg-main text-white">
                            <i class='bx bx-cart-download fs-4'></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php include('includes/footer.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>