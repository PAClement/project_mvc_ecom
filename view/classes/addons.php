<?php

class ViewTemplate
{

  public static function response($state, $contain, $link = null)
  {
?>

    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

    <div class="container my-5">
      <div class="alert alert-<?= $state ?>" role="alert">
        <?= $contain ?>
      </div>
      <?php
      if ($link !== null) {
      ?>
        <div class="spinner-border" role="status">
          <span class="sr-only"></span>
        </div>
        Redirection en cours ...
      <?php
      }
      ?>
    </div>
    <script>
      <?php if ($link !== null) { ?>
        setInterval(() => {
          window.location.replace("<?= $link ?>");
        }, 2000);
      <?php } ?>
    </script>
  <?php
  }

  public static function returnBtn($link, $goTo, $currentPage)
  {
  ?>

    <a href="index.php?action=<?= $link ?>" class="btn btn-orange-outline mb-3"><i class='bx bx-left-arrow-alt align-baseline'></i> <?= $goTo ?></a>
    <h2 class="mb-5"><?= $currentPage ?></h2>

  <?php
  }

  public static function frameAccount($link, $icon, $name)
  {

  ?>
    <a href="index.php?action=<?= $link ?>" class="d-flex flex-column align-items-center px-5 pt-3 frameAccount text-decoration-none">
      <div class="my-5 frameIcon">
        <i class='bx <?= $icon ?> fs-1'></i>
      </div>
      <div class="mt-5">
        <h2><?= $name ?></h2>
      </div>
    </a>
<?php
  }
}
