<?php
if (isset($_SESSION['user_id'])) {

  $viewConn = new ModelUser();
  $tab = $viewConn->getUserById($_SESSION['user_id']);
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">accueil</a>
        </li>
      </ul>
      <nav class="my-2 my-md-0 mr-md-3 ">
        <?php if ($tab['role_id'] == 1) { ?>
          <a class="btn btn-warning mx-3" href="index.php?action=userGestion">User gestion</a>
        <?php } ?>
      </nav>
      <div class="d-flex">
        <?php if (!isset($_SESSION['user_id'])) { ?>
          <a class="btn btn-outline-primary" href="index.php?action=connexion">Sign in</a>
          <a class="btn btn-primary mx-3" href="index.php?action=inscription">Sign up</a>
        <?php } else {
        ?>
          <a class="btn btn-outline-primary mx-3" href="index.php?action=membre">Espace membre</a>
          <a class="btn btn-danger" href="index.php?action=deconnect">Se deconnecter</a>
        <?php
        } ?>
      </div>
    </div>
  </div>
</nav>