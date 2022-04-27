<?php
if (isset($_SESSION['user_id'])) {

  $viewConn = new ModelUser();
  $authorization = $viewConn->getUserById($_SESSION['user_id']);
}
?>

<nav class="py-2 bg-main">
  <div class="container d-flex flex-wrap py-2">
    <ul class="nav me-auto">
      <li class="nav-item"><a href="#" class="nav-link link-light px-2 ">CATEGORY 1</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-light px-2">CATEGORY 2</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-light px-2">CATEGORY 3</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-light px-2">CATEGORY 4</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-light px-2">CATEGORY 5</a></li>
    </ul>
    <ul class="nav">
      <?php if (!isset($_SESSION['user_id'])) { ?>

        <a class="btn btn-orange-outline" href="index.php?action=connexion">Sign in</a>
        <a class="btn bg-orange ms-3 text-white btn-bg-orange" href="index.php?action=inscription">Sign up</a>
      <?php } else if ($authorization['role_id'] == 1) { ?>

        <a class="btn btn-orange-outline" href="index.php?action=adminSpace">Espace Administration</a>
      <?php } else { ?>

        <a type="button" class="btn bg-orange text-white btn-bg-orange me-3 position-relative" href="index.php?action=myCart">
          <i class='bx bx-cart fs-4'></i>
          <?php if (isset($_SESSION['customer_cart'])) : ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?= count($_SESSION['customer_cart']) ?>
            </span>
          <?php endif; ?>
        </a>
        <a class="btn btn-orange-outline" href="index.php?action=mySpace">Espace Membre</a>
      <?php } ?>
    </ul>
  </div>
</nav>
<header class="py-3 mb-4 bg-secondaire-main border-main-orange">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
    <a href="/" class="d-flex align-items-center mb-lg-0 me-lg-auto text-white text-decoration-none">
      <span class="fs-1 ">E - COM</span>
    </a>
    <form class="col-6 mb-lg-0">
      <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
    </form>
  </div>
</header>