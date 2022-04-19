<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

<div class="container">
  <div class="row my-5">
    <div class="col-6">
      <h1 class="mb-3">Inscription</h1>
      <form action="index.php?action=inscription" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" value="<?= $mail ?>" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" value="<?= $password ?>" name="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group row">
          <div class="col-6">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" value="<?= $nom ?>" name="nom" class="form-control" required>
          </div>
          <div class="col-6">
            <label for="exampleInputEmail1">Prenom</label>
            <input type="text" value="<?= $prenom ?>" name="prenom" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" value="<?= $address ?>" name="address" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tel</label>
          <input type="tel" value="<?= $tel ?>" name="tel" class="form-control" required>
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
    </div>
    <div class="col-6">
      <div class="d-flex flex-column align-items-center">

        <h2>Condition to respect</h2>
        <ul class="mt-5 list-group list-group-flush">
          <li class="list-group-item"><strong>Email : </strong>Your email must be conform like <i>clementpaquentin@hotmail.fr</i></li>
          <li class="list-group-item"><strong>Password :</strong> Must be at leat 8 characters , 1 special characters and lower / upper case characters good luck. </li>
          <li class="list-group-item"><strong>Name & Last Name : </strong> Don't use number on your name or lastname.</li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>