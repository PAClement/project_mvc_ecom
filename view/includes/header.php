<?php
if (isset($_SESSION['user_id'])) {

  $viewConn = new ModelUser();
  $authorization = $viewConn->getUserById($_SESSION['user_id']);
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
  <div class="container-fluid">
    <a class="navbar-brand fs-2" href="index.php">ECOM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">accueil</a>
        </li> -->
      </ul>
      <div class="d-flex">
        <?php if (!isset($_SESSION['user_id'])) { ?>
          <a class="btn btn-outline-primary" href="index.php?action=connexion">Sign in</a>
          <a class="btn btn-primary mx-3" href="index.php?action=inscription">Sign up</a>
        <?php } else if ($authorization['role_id'] == 1) {
        ?>
          <a class="btn btn-outline-primary mx-3" href="index.php?action=adminSpace">Espace Administration</a>
        <?php
        } else {
        ?>
          <a class="btn btn-outline-primary mx-3" href="index.php?action=mySpace">Espace Membre</a>

        <?php
        } ?>
      </div>
    </div>
  </div>
</nav>