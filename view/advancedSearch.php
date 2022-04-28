<?php $title = 'Recherche avancée'; ?>

<?php ob_start(); ?>

<?php isset($tabSearch) ? $searchCount = count($tabSearch) : ""; ?>

<?php include('../view/includes/header.php'); ?>

<div class="container">
    <div class="row align-items-start">
        <div class="col-3 mt-n1 ">
            <div class="d-flex flex-column p-3 py-5 bg-main text-white  mb-5">
                <h5 class="p-color-orange mb-5">
                    <?php if (isset($tabSearch)) : ?>
                        <?= $searchCount > 1 ? $searchCount . " Resultats Trouvés" : $searchCount . " Resultat Trouvé" ?>
                    <?php endif; ?>
                </h5>
                <h2>FILTRE :</h2>
                <?php foreach ($tabCategory as $catVal) : ?>
                    <?php if (isset($searchCategory) && $searchCategory == $catVal['nom']) : ?>
                        <a class="my-1 text-danger text-decoration-none"><?= $catVal['nom'] ?></a>
                    <?php else : ?>
                        <a class="my-1 text-decoration-none"><?= $catVal['nom'] ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-9 d-flex justify-content-evenly mb-5 flex-wrap gap-3 align-items-stretch">
            <?php if (!empty($tabSearch)) : ?>
                <?php foreach ($tabSearch as $searchVal) : ?>
                    <div class="card" style="width: 18rem;">
                        <!-- <img src="https://via.placeholder.com/1500" class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title"><?= $searchVal['nom'] ?></h5>
                            <p class="card-text"><?= $searchVal['description'] ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Prix : <?= $searchVal['prix'] ?> € </li>
                            <li class="list-group-item">Marque : <?= $searchVal['nom_marque'] ?></li>
                            <li class="list-group-item">Categorie : <?= $searchVal['nom_category'] ?></li>
                        </ul>
                        <div class="card-footer py-3">
                            <a href="index.php?action=viewProduct&id=<?= $searchVal['id'] ?>" class="btn bg-orange btn-bg-orange text-white">Voir le produit</a>
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <a href="index.php?action=addCart&id=<?= $searchVal['id'] ?>" class="btn bg-orange text-white btn-bg-orange">
                                    <i class='bx bx-cart-download fs-4'></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php elseif (isset($searchCategory)) : ?>
                <h4 class="text-danger">Aucun article trouvé dans la catégorie "<?= $searchCategory ?>"</h4>
            <?php elseif (isset($searchData)) : ?>

                <h4 class="text-danger">Aucun article trouvé pour "<?= $searchData['search'] ?>"</h4>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>