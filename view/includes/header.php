<?php
if (isset($_SESSION['user_id'])) {

  $viewConn = new ModelUser();

  $authorization = $viewConn->getUserById($_SESSION['user_id']);
}

$connCategoryHeader = new ModelCategory();
$tabCategoryHeader = $connCategoryHeader->latestCategory();
?>

<nav class="py-2 bg-main">
  <div class="container d-flex flex-wrap py-2">
    <ul class="nav me-auto">
      <?php foreach ($tabCategoryHeader as $valHeader) : ?>
        <li class="nav-item">
          <a href="index.php?action=advancedSearchCategory&category_nom=<?= $valHeader['nom'] ?>" class="nav-link link-light ps-0 pe-5 text-uppercase"><?= $valHeader['nom'] ?></a>
        </li>
      <?php endforeach; ?>
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
    <form action="index.php?action=advancedSearch" method="POST" class="col-6 mb-lg-0">
      <input type="search" class="form-control" name="search" placeholder="Search..." value="<?= isset($searchData['search']) ? $searchData['search'] : "" ?>" aria-label="Search">
    </form>
  </div>
</header>