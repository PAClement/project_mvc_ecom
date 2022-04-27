<?php $title = 'Article view';

$total = 0;

ob_start(); ?>

<?php include('includes/header.php') ?>

<div class="container">
    <a href="index.php" class="btn btn-orange-outline mb-3"><i class='bx bx-left-arrow-alt align-baseline'></i> Retour</a>
    <h2 class="mb-5">Votre panier : </h2>
    <?php if (!empty($cartTab)) { ?>
        <?php foreach ($cartTab as $value) : ?>
            <div class="card shadow-lg mb-5 rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <h2><?= $value['nom'] ?></h2>
                            <p>Ref : <?= $value['ref'] ?></p>
                            <?php if ($value['nom_marque'] != "Toutes marques") : ?>
                                <p>Marque : <?= $value['nom_marque'] ?></p>
                            <?php endif; ?>
                            <a class="my-3" href="index.php?action=viewProduct&id=<?= $value['id'] ?>">Voir les détails de cet article</a>
                        </div>
                        <div class="col-3">
                            <h4 class="mb-5"><?= $value['prix'] ?> €</h4>
                            <a class="btn bg-orange btn-bg-orange text-white" href="index.php?action=addCart&red=on&id=<?= $value['id'] ?>"> <i class='bx bxs-up-arrow'></i></a>
                            <h6 class="my-2">Quantité : <?= $count_tab[$value['id']] ?></h6>

                            <?php if ($count_tab[$value['id']] > 1) { ?>
                                <a class="btn bg-orange btn-bg-orange text-white" href="index.php?action=delCart&id=<?= $value['id'] ?>"> <i class='bx bxs-down-arrow'></i></a>
                            <?php } else { ?>
                                <a class="btn btn-danger" href="index.php?action=delCart&id=<?= $value['id'] ?>">Supprimer cet article</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            $total = $total + ($value['prix'] * $count_tab[$value['id']]);

            ?>
        <?php endforeach; ?>

        <h4>TOTAL DU PANIER : <?= $total ?> €</h4>

        <div class="my-5">
            <a href="index.php?action=submitCart" class="btn bg-orange btn-bg-orange text-white"><i class='bx bx-package fs-4'></i> <span class="align-top"> Passer la commande</span></a>
        </div>
    <?php } else { ?>

        <h4 class="text-danger">Aucun article dans votre panier !</h4>

        <a class="btn bg-orange btn-bg-orange text-white mt-3 mb-5" href="index.php">Commencer mon shopping</a>

    <?php } ?>
</div>

<?php !empty($cartTab) ? include('includes/footer.php') : ""; ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>