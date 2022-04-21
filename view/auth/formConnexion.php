<?php $title = 'Connexion';

ob_start(); ?>

<div class="container col-3 d-flex flex-column gap-5 p-5 bg-main text-white">
  <h1 class="text-center">E - COM</h1>
  <form action="index.php?action=connexion" class="my-5" method="POST">
    <h2 class="mb-3">Connexion</h2>
    <div class="form-group mb-3">
      <label for="email">Email address</label>
      <input type="email" name="mail" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <a class="btn fs-6 text-info" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">Mot de passe oublié ?</a><br>
    <button type="submit" name="connexion" class="btn bg-orange btn-bg-orange text-white mt-5"><i class='bx bxs-user-account'></i> Se connecter</button>
  </form>
  <?php if ($error) { ?>
    <h4 class="text-danger"><?= $error ?></h4>
  <?php } ?>

  <h4>Pas de compte ? <a class="link-info" href="index.php?action=inscription"> Vous inscire</a> !</h4>
  <a href="index.php" class="btn bg-orange btn-bg-orange text-white"><i class='bx bx-search-alt'></i> Découvrir le site</a>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="index.php?action=forgetPassword" class="my-3" method="POST">
          <h2 class="mb-3">Quelle est votre email ?</h2>
          <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" name="mail" class="form-control" id="email" aria-describedby="emailHelp">
          </div>

          <button type="submit" name="getToken" class="btn bg-orange btn-bg-orange text-white mt-5">Recevoir mon token</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>