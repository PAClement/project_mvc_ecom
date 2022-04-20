<?php $title = 'Mot de passe oublié';

ob_start(); ?>

<div class="container my-5">
    <h6>
        <- <a href="index.php?action=connexion">Vers la connexion</a>
    </h6>
    <h3>Mot de passe oublié</h3>

    <form action="index.php?action=forgetPassword" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Quelle est votre email ?</label>
            <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <button type="submit" name="forgetMDPemail" class="btn btn-primary mt-5">Send "email" </button>
        </div>
        <?php if ($forgetError) { ?>
            <h4 class="text-danger"><?= $forgetError ?></h4>
        <?php } ?>
    </form>

    <?php if ($token) { ?>
        <p>Voici votre nouveau token : <?= $token ?></p>
    <?php } ?>

    <?php if ($formNewPassword) { ?>
        <div class="row">
            <div class="col-6">
                <form action="index.php?action=forgetPassword" method="POST">
                    <div class="form-group">
                        <label for="token">Enter your token</label>
                        <input type="text" name="token" class="form-control" id="token" aria-describedby="token">
                    </div>
                    <div class="form-group">
                        <label for="changePassword">Password</label>
                        <input type="password" name="changePassword" class="form-control" id="changePassword">
                    </div>
                    <button type="submit" name="newPassword" class="btn btn-primary mt-5">Change Password </button>
                </form>
                <?php if ($forgetError) { ?>
                    <h4 class="text-danger"><?= $newError ?></h4>
                <?php } ?>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column align-items-center">
                    <h2>Condition to respect</h2>
                    <ul class="mt-1 list-group list-group-flush">
                        <li class="list-group-item"><strong>Password :</strong> Must be at leat 8 characters , 1 special characters and lower / upper case characters good luck. </li>
                    </ul>
                </div>
            </div>
        </div>

    <?php } ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>