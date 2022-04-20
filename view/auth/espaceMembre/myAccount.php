<?php $title = 'MyAccount'; ?>

<?php ob_start(); ?>

<?php include('../view/includes/header.php'); ?>

<div class="container my-5 pb-5">

    <h1 class="mb-5">Espace membre</h1>

    <div class="row">
        <div class="col-6">
            <div class="card text-dark bg-light mb-5" style="max-width: 50rem;">
                <div class="card-header">Edit my profil</div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form action="index.php?action=myAccount" method="POST">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" value="<?= $info['nom'] ?>" name="nom" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Prenom</label>
                                <input type="text" value="<?= $info['prenom'] ?>" name="prenom" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" value="<?= $info['address'] ?>" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tel</label>
                            <input type="tel" value="<?= $info['tel'] ?>" name="tel" class="form-control" required>
                        </div>
                        <button type="submit" name="modification" class="btn btn-primary">Modifier</button>
                    </form>

                    <h5 class="text-danger mt-3"><?= $editError ?></h5>
                </div>
            </div>
        </div>
        <div class="col-6">
            <h2 class="mb-5">Bonjour <?= $info['nom'] . ' ' . $info['prenom'] ?></h2>

            <h4>Voici vos informations</h4>
            <ul class="list-group mb-5">
                <li class="list-group-item"><strong>Votre mail : </strong><?= $info['mail'] ?></li>
                <li class="list-group-item"><strong>Votre address : </strong><?= $info['address'] ?></li>
                <li class="list-group-item"><strong>Votre city : </strong><?= $info['city'] ?></li>
                <li class="list-group-item"><strong>Votre Postal_code : </strong><?= $info['postal_code'] ?></li>
                <li class="list-group-item"><strong>Votre tel : </strong><?= $info['tel'] ?></li>
                <li class="list-group-item"><strong>Date d'inscription : </strong><?= $info['date_inscription'] ?></li>
            </ul>
        </div>
    </div>

    <div class="card text-white bg-dark mb-5" style="max-width: 18rem;">
        <div class="card-header">DANGER ZONE</div>
        <div class="card-body">
            <h5 class="card-title mb-5">

                <a class="btn btn-danger mb-5" href="index.php?action=deconnect">Se deconnecter</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal">
                    Supprimer mon compte
                </button>
            </h5>
            <p class="card-text">
                Tout action sera irrémédiable
            </p>
        </div>
    </div>

    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodalLabel">SUPPRESSION DE COMPTE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sur de vouloir supprimer votre compte ? <br>
                    Cette action est irreversible !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne pas supprimer</button>
                    <a href="index.php?action=deleteAccount" class="btn btn-danger">Supprimer mon compte</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>