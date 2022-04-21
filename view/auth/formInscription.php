<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

<div class="container">
  <div class="row align-items-center">
    <div class="col-6 d-flex flex-column gap-5 bg-main p-5 text-white">
      <h1 class="mb-3">Inscription</h1>
      <form action="index.php?action=inscription" method="POST">
        <div class="form-group mb-3">
          <label for="email">Email address</label>
          <input type="email" value="" name="mail" class="form-control" id="email" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group mb-3">
          <label for="password">Password</label>
          <input type="password" value="" name="password" class="form-control" id="password" required>
        </div>
        <div class="form-group row mb-3">
          <div class="col-6">
            <label for="nom">Nom</label>
            <input type="text" value="" name="nom" class="form-control" required>
          </div>
          <div class="col-6">
            <label for="prenom">Prenom</label>
            <input type="text" value="" name="prenom" class="form-control" required>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="address">Address</label>
          <input type="text" value="" name="address" class="form-control" required>
        </div>
        <div class="form-group row mb-3">
          <div class="col-6">
            <label for="city">Ville</label>
            <input type="text" value="" name="city" class="form-control" required>
          </div>
          <div class="col-6">
            <label for="postal_code">Code postal</label>
            <input type="number" value="" name="postal_code" class="form-control" required>
          </div>
        </div>
        <div class="form-group mb-5">
          <label for="tel">Tel</label>
          <input type="tel" value="" name="tel" class="form-control" required>
        </div>
        <button type="submit" name="inscription" class="btn bg-orange text-white btn-bg-orange"><i class='bx bxs-pencil'></i> S'inscrire</button>
      </form>
      <?php if ($error) { ?>
        <h3 class="text-danger"><?= $error ?></h3>
      <?php } ?>
      <h3>Déjà inscrit ? <a class="link-info" href="index.php?action=connexion"> Se connecter </a> !</h3>

      <a href="index.php" class="btn bg-orange text-white btn-bg-orange"><i class='bx bx-search-alt'></i> Découvrir le site</a>

    </div>
    <div class="col-6">
      <div class="d-flex flex-column align-items-start">
        <h1 class="mb-5">E - COM</h1>
        <h2>Conditions de création de compte : </h2>
        <ul class="mt-3 list-group list-group-flush">
          <li class="list-group-item"><strong>Email : </strong>Le format de l'email doit être comme ceci -> <i>youremail@mail.fr</i></li>
          <li class="list-group-item"><strong>Mot de passe :</strong> Le mot de passe doit avoir au moins 8 caractères , 1 caractère spécial ainsi que des majuscules et miniscules. </li>
          <li class="list-group-item"><strong>Nom et prénom: </strong> Le nom et le prénom ne doit pas contenir de chiffre.</li>
          <li class="list-group-item"><strong>Format du numéro telephone : </strong> 0612345678.</li>
        </ul>
      </div>
    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>