<?php $title = 'Connexion';

ob_start(); ?>


<div class="container my-5 col-6">
  <h1 class="mb-3">Connexion</h1>
  <form action="index.php?action=connexion" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <!-- <a href="index.php?action=forgetPassword">Mot de passe oublié ?</a><br> -->
    <button type="submit" name="connexion" class="btn btn-primary mt-5">Se connecter</button>
  </form>
  <?php
  if ($error) {
  ?>
    <h3 class="text-danger"><?= $error ?></h3>
  <?php
  }
  ?>

  <h3>Pas de compte ? <a href="index.php?action=inscription"> Vous inscire</a> !</h3>


  <a href="index.php" class="btn btn-warning"><i class='bx bx-search-alt'></i> Découvrir le site</a>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>