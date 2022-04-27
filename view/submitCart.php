<?php $title = 'Article view';

$total = 0;

ob_start(); ?>

<div class="container">
  <form action="index.php?action=createOrder" method="POST">
    <a href="index.php?action=myCart" class="btn btn-orange-outline mb-3 mt-5 "><i class='bx bx-left-arrow-alt align-baseline'></i> Retour</a>
    <div class="card rounded">
      <div class="card-body">
        <h4>1 - Choisir Transporteur : </h4>
        <div class="col-6 pt-3 ps-3">
          <?php foreach ($tabTransporteur as $valueTransporteur) : ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="<?= $valueTransporteur['nom'] ?>" name="transporteur" id="<?= $valueTransporteur['nom'] ?>" <?= $valueTransporteur['nom'] == 'Notre transporteur' ? "checked" : "" ?>>
              <label class="form-check-label" for="<?= $valueTransporteur['nom'] ?>">
                <?= $valueTransporteur['nom'] ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="card-body">
        <h4>2 - Adresse de livraison : </h4>
        <div class="col-6 pt-3 ps-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" value="<?= $_SESSION['user_id'] ?>" name="address" id="address" checked>
            <label class="form-check-label" for="address">
              <?= $tabUserInfo['city'] . " - " . $tabUserInfo['address'] . " - " . $tabUserInfo['postal_code'] ?>
            </label>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h4>3 - Récapitulatif de votre commande : </h4>

        <div class="col-6 pt-3 ps-3">
          <?php foreach ($cartTab as $valueCart) : ?>
            <div class="row border-bottom py-3">
              <div class="col-9">
                <h5><?= $valueCart['nom'] ?></h5>
                <h6 class="p-color-orange"><?= $valueCart['ref'] ?></h6>
                <h6>Quantité : <?= $count_tab[$valueCart['id']] ?></h6>
              </div>
              <div class="col-3">
                <h6><?= $valueCart['prix'] ?> €</h6>
              </div>
            </div>
            <?php
            $total = $total + ($valueCart['prix'] * $count_tab[$valueCart['id']]);
            ?>
            <input class="d-none" value="<?= $total ?>" name="orderPrix">
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="card-footer">
      <h4 class="mt-3">TOTAL DE LA COMMANDE : <?= $total ?> €</h4>
      <button type="submit" class="btn bg-orange btn-bg-orange text-white my-3">
        <i class='bx bx-credit-card-alt fs-4'></i>
        <span class="align-top"> Payer ma commande</span>
      </button>
    </div>
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>