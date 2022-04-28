<?php $title = 'Article view';

$total = 0;

ob_start(); ?>

<?php include('../view/includes/header.php'); ?>

<div class="container">

  <?php ViewTemplate::returnBtn("mySpace", "Espace membre", "VOS COMMANDES :") ?>

  <?php if (!empty($tabOrder)) : ?>

    <?php foreach ($tabOrder as $valueOrder) : ?>
      <div class="card rounded my-5">
        <div class="card-header">
          <div class="row">
            <div class="col-3">
              <strong>Commande effectué le</strong><br> <?= $valueOrder['date_commande'] ?>
            </div>
            <div class="col-3">
              Total <br> <?= $valueOrder['prix'] ?> €
            </div>
            <div class="col-3">
              Mode de livraison <br> <?= $valueOrder['mode'] ?>
            </div>
            <div class="col-3">
              Transporteur <br> <?= $valueOrder['nom'] ?>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <h4 class="mb-3">N° de commande : <?= $valueOrder['id'] ?></h4>
              <a class="btn bg-orange btn-bg-orange text-white my-3" href="index.php?action=orderDetail&id=<?= $valueOrder['id'] ?>">Détail de la commande</a>

            </div>
            <div class="col-3">
              <h3 class="
                  <?php if ($valueOrder['etat'] == 'En attente') : ?>
                    text-warning
                  <?php elseif ($valueOrder['etat'] == 'Livraison') : ?>
                    text-success
                  <?php elseif ($valueOrder['etat'] == 'Refusée') : ?>
                    text-danger
                  <?php endif; ?>
              "><?= $valueOrder['etat'] ?></h3>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else : ?>

    <h4 class="text-danger">Vous n'avez aucune commande</h4>

    <a class="btn bg-orange btn-bg-orange text-white mt-3 mb-5" href="index.php">Commencer mon shopping</a>

  <?php endif; ?>
</div>

<?php !empty($tabOrder) ? include('../view/includes/footer.php') : ""; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>