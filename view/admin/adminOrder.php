<?php $title = 'Commandes listes'; ?>

<?php ob_start();

include('../view/includes/header.php');

?>

<div class="container my-5">

    <?php ViewTemplate::returnBtn("adminSpace", "Espace admin", "LISTE DES COMMANDES :") ?>

    <div class="row d-flex justify-content-center my-5">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                <li class="nav-item tab-list" role="presentation">
                    <button class="nav-link active show" id="faq_tab_1-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_1" type="button" role="tab" aria-controls="faq_tab_1" aria-selected="true">
                        <div class="d-flex flex-column lh-lg">
                            <i class='bx bx-timer fs-1'></i><span>Commande en attente</span>
                        </div>
                    </button>
                </li>
                <li class="nav-item tab-list" role="presentation">
                    <button class="nav-link" id="faq_tab_2-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_2" type="button" role="tab" aria-controls="faq_tab_2" aria-selected="false">
                        <div class="d-flex flex-column lh-lg">
                            <i class='bx bx-error-alt fs-1'></i><span>Commande refusée</span>
                        </div>
                    </button>
                </li>
                <li class="nav-item tab-list" role="presentation">
                    <button class="nav-link" id="faq_tab_3-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_3" type="button" role="tab" aria-controls="faq_tab_3" aria-selected="false">
                        <div class="d-flex flex-column lh-lg">
                            <i class='bx bx-home-alt-2 fs-1'></i><span>Commande livrée</span>
                        </div>
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <!--========================
  =========== COMMAND EN ATTENTE ===========
===============================-->
                <div class="tab-pane fade py-5 ps-5product active show" id="faq_tab_1" role="tabpanel" aria-labelledby="faq_tab_1-tab">
                    <?php if (!empty($OrderStay)) : ?>
                        <?php foreach ($OrderStay as $valOrder) : ?>
                            <div class="card rounded my-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-around align-items-center">
                                        <div class="d-flex flex-column">
                                            <h3>Commande n° <?= $valOrder['command_id'] ?></h3>
                                            <h4 class="text-warning "><?= $valOrder['etat'] ?></h4>
                                        </div>
                                        <h5><?= $valOrder['mail'] ?></h5>
                                        <div class="d-flex flex-column">
                                            <h5>Commande effectuée le</h5>
                                            <h6><?= $valOrder['date_commande'] ?></h6>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="btn btn-success" href="index.php?action=stateOrder&etat=Livraison&command_id=<?= $valOrder['command_id'] ?>">Accepter la commande</a>
                                            <a class="btn bg-orange btn-bg-orange text-white my-1" href="index.php?action=adminOrderDetail&command_id=<?= $valOrder['command_id'] ?>">Détail de la commande</a>
                                            <a class="btn btn-danger" href="index.php?action=stateOrder&etat=Refusée&command_id=<?= $valOrder['command_id'] ?>">Refusée la commande</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h4 class="text-danger">Aucune commande en attente</h4>
                    <?php endif; ?>
                </div>
                <!--========================
  =========== COMMANDE REFUSEE ===========
===============================-->
                <div class="tab-pane fade py-5 ps-5" id="faq_tab_2" role="tabpanel" aria-labelledby="faq_tab_2-tab">
                    <?php foreach ($OrderRefus as $valOrder) : ?>
                        <div class="card rounded my-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="d-flex flex-column">
                                        <h3>Commande n° <?= $valOrder['command_id'] ?></h3>
                                        <h4 class="text-danger "><?= $valOrder['etat'] ?></h4>
                                    </div>
                                    <h5><?= $valOrder['mail'] ?></h5>
                                    <div class="d-flex flex-column">
                                        <h5>Commande effectuée le</h5>
                                        <h6><?= $valOrder['date_commande'] ?></h6>
                                    </div>
                                    <a class="btn bg-orange btn-bg-orange text-white" href="index.php?action=adminOrderDetail&command_id=<?= $valOrder['command_id'] ?>">Détail de la commande</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!--========================
  =========== COMMANDE LIVREE ===========
===============================-->
                <div class="tab-pane fade py-5 ps-5" id="faq_tab_3" role="tabpanel" aria-labelledby="faq_tab_3-tab">
                    <?php foreach ($OrderAccept as $valOrder) : ?>
                        <div class="card rounded my-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="d-flex flex-column">
                                        <h3>Commande n° <?= $valOrder['command_id'] ?></h3>
                                        <h4 class="text-success "><?= $valOrder['etat'] ?></h4>
                                    </div>
                                    <h5><?= $valOrder['mail'] ?></h5>
                                    <div class="d-flex flex-column">
                                        <h5>Commande effectuée le</h5>
                                        <h6><?= $valOrder['date_commande'] ?></h6>
                                    </div>
                                    <a class="btn bg-orange btn-bg-orange text-white" href="index.php?action=adminOrderDetail&command_id=<?= $valOrder['command_id'] ?>">Détail de la commande</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</div>


<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>