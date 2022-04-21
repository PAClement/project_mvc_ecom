<?php $title = 'Mot de passe oublié';

ob_start(); ?>

<div class="container col-3 d-flex flex-column gap-5 p-5 bg-main text-white">
    <h1 class="text-center">E - COM</h1>
    <form action="index.php?action=forgetPassword" class="my-5" method="POST">
        <h4 class="mb-5">Changer mon mot de passe</h4>

        <h6 class="text-danger">Votre token : <?= $token ?></h6>

        <input type="email" value="<?= $email ?>" name="mail" class="form-control d-none" id="email" aria-describedby="emailHelp">

        <div class="form-group my-3">
            <label for="token">Your Token</label>
            <input type="text" name="token" class="form-control" id="token" aria-describedby="tokenHelp">
        </div>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" name="newPassword" class="form-control" id="newPassword">
        </div>
        <button type="submit" name="resetPassword" class="btn bg-orange btn-bg-orange text-white mt-5">Changer mot de passe</button>
    </form>
    <?php if ($errorForgotPassword) { ?>
        <h5 class="text-danger"><?= $errorForgotPassword ?></h5>
    <?php } ?>

    <h4><a class="link-info" href="index.php?action=connexion">
            <- Retourner à la connexion</a>
    </h4>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>