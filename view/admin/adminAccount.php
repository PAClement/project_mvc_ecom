<?php $title = 'Admin account'; ?>

<?php ob_start(); ?>

<?php include('../view/includes/header.php'); ?>

<div class="container my-5 pb-5">

    <?php ViewTemplate::returnBtn("adminSpace", "Espace admin", "ADMIN ACCOUNT :") ?>

    <h4>Cher admin voici tes informations</h4>
    <ul class="list-group mb-5">
        <li class="list-group-item"><strong>Votre mail : </strong><?= $infoAdmin['mail'] ?></li>
        <li class="list-group-item"><strong>Votre password : </strong><?= $infoAdmin['password'] ?></li>
        <li class="list-group-item"><strong>Votre token : </strong><?= $infoAdmin['token'] ?></li>
    </ul>

    <div class="card text-white bg-dark mb-5" style="max-width: 18rem;">
        <div class="card-header">DANGER ZONE</div>
        <div class="card-body">
            <h5 class="card-title mb-5">
                <a class="btn btn-danger mb-1" href="index.php?action=deconnect">Se deconnecter</a>
            </h5>
            <p class="card-text">
                Tout action sera irrémédiable
            </p>
        </div>
    </div>

</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>