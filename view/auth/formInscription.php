<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

<div class="container">
  <div class="row my-5">
    <div class="col-6">
      <h1 class="mb-3">Inscription</h1>
      <form action="index.php?action=inscription" method="POST">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" value="" name="mail" class="form-control" id="email" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" value="" name="password" class="form-control" id="password" required>
        </div>
        <div class="form-group row">
          <div class="col-6">
            <label for="nom">Nom</label>
            <input type="text" value="" name="nom" class="form-control" required>
          </div>
          <div class="col-6">
            <label for="prenom">Prenom</label>
            <input type="text" value="" name="prenom" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" value="" name="address" class="form-control" required>
        </div>
        <div class="form-group row">
          <div class="col-6">
            <label for="city">Ville</label>
            <input type="text" value="" name="city" class="form-control" required>
          </div>
          <div class="col-6">
            <label for="postal_code">Code postal</label>
            <input type="number" value="" name="postal_code" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="tel">Tel</label>
          <input type="tel" value="" name="tel" class="form-control" required>
        </div>
        <button type="submit" name="inscription" class="btn btn-primary">S'inscrire</button>
      </form>
      <?php
      if ($error) {
      ?>
        <h3 class="text-danger"><?= $error ?></h3>
      <?php
      }
      ?>
      <h3>Déjà inscrit ? <a href="index.php?action=connexion"> Se connecter </a> !</h3>

    </div>
    <div class="col-6">
      <div class="d-flex flex-column align-items-center">

        <h2>Condition to respect</h2>
        <ul class="mt-5 list-group list-group-flush">
          <li class="list-group-item"><strong>Email : </strong>Your email must be conform like <i>youremail@mail.fr</i></li>
          <li class="list-group-item"><strong>Password :</strong> Must be at leat 8 characters , 1 special characters and lower / upper case characters good luck. </li>
          <li class="list-group-item"><strong>Name & Last Name : </strong> Don't use number on your name or lastname.</li>
          <li class="list-group-item"><strong>Tel format : </strong> 0612345678.</li>
        </ul>
        <a href="index.php" class="btn btn-warning"><i class='bx bx-search-alt'></i> Découvrir le site</a>
      </div>
    </div>
  </div>
</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>