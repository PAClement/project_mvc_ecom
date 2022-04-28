<?php $title = 'Article view';

$total = 0;

ob_start(); ?>

<?php include('../view/includes/header.php'); ?>

<div class="container">

  <?php ViewTemplate::returnBtn("myOrder", "Mes commandes", "MA COMMANDE :") ?>

  <div class="row">
    <div class="col-9">
      <h3>Commande n° <?= $orderDetail[0]['id'] ?></h3>
      <h5 class="mb-3 p-color-orange">Effectuée le <?= $orderDetail[0]['date_commande'] ?></h5>
      <h6 class="my-3">Transporteur : <?= $orderDetail[0]['nom_transporteur'] ?></h6>
      <h6 class="my-3">Mode de livraison : <?= $orderDetail[0]['mode'] ?></h6>
      <?php foreach ($orderDetail as $valueCart) : ?>
        <div class="row border-bottom py-3 my-5">
          <div class="col-9">
            <h5><?= $valueCart['nom_produit'] ?></h5>
            <h6 class="p-color-orange"><?= $valueCart['ref'] ?></h6>
            <h6>Quantité : <?= $valueCart['quantite'] ?></h6>
            <a class="my-3" href="index.php?action=viewProduct&id=<?= $valueCart['product_id'] ?>">Voir les détails de cet article</a>
          </div>
          <div class="col-3">
            <h6><?= $valueCart['produit_prix'] ?> €</h6>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="col-3">
      <h5 class="
        <?php if ($orderDetail[0]['etat'] == 'En attente') : ?>
          text-warning
        <?php elseif ($orderDetail[0]['etat'] == 'Livraison') : ?>
          text-success
        <?php elseif ($orderDetail[0]['etat'] == 'Refusée') : ?>
          text-danger
        <?php endif; ?>
      "><?= $orderDetail[0]['etat'] ?></h5>
      <h4 class="mb-5"><?= $orderDetail[0]['commande_prix'] ?> €</h4>
    </div>
  </div>

</div>

<?php include('../view/includes/footer.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>