<?php $title = 'Admin Product Gestion'; ?>

<?php ob_start();

include('../view/includes/header.php'); ?>

<div class="container mt-5">
  <h2>PANEL DE GESTION </h2>
  <div class="row d-flex justify-content-center my-5">
    <div class="col-md-12 bg-white">
      <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link <?= $show == 'product' ? "active show" : "" ?>" id="faq_tab_1-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_1" type="button" role="tab" aria-controls="faq_tab_1" aria-selected="true">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxl-dropbox fs-1'></i> <span>Produits</span>
            </div>
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link <?= $show == 'category' ? "active show" : "" ?>" id="faq_tab_2-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_2" type="button" role="tab" aria-controls="faq_tab_2" aria-selected="false">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxl-dropbox fs-1'></i><span>Catégories</span>
            </div>
          </button>
        </li>
        <li class="nav-item " role="presentation">
          <button class="nav-link <?= $show == 'marque' ? "active show" : "" ?>" id="faq_tab_3-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_3" type="button" role="tab" aria-controls="faq_tab_3" aria-selected="false">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxl-dropbox fs-1'></i><span>Marques</span>
            </div>
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link <?= $show == 'transporteur' ? "active show" : "" ?>" id="faq_tab_4-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_4" type="button" role="tab" aria-controls="faq_tab_4" aria-selected="false">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxl-dropbox fs-1'></i><span>Transporteurs</span>
            </div>
          </button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">

        <!--========================
  =========== PRODUCT ===========
===============================-->
        <div class="tab-pane fade py-5 ps-5 <?= $show == 'product' ? "active show" : "" ?>" id="faq_tab_1" role="tabpanel" aria-labelledby="faq_tab_1-tab">

          <h1>PRODUCT MODIF</h1>
        </div>

        <!--========================
  =========== CATEGORIE ===========
===============================-->
        <div class="tab-pane fade py-5 ps-5 <?= $show == 'category' ? "active show" : "" ?>" id="faq_tab_2" role="tabpanel" aria-labelledby="faq_tab_2-tab">

          <h3 class="mb-5">Ajouter une categorie :</h3>

          <form action="index.php?action=adminProducts" method="POST">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <input type="text" name="categorie" placeholder="Nom de la categorie" class="form-control" id="categorie" aria-describedby="categorieHelp">
                </div>
              </div>
              <div class="col-4">
                <button type="submit" name="addCategorie" class="btn bg-orange btn-bg-orange text-white">Ajouter categorie</button>
              </div>
            </div>
            <h5 class="text-danger mt-3"><?= $errorAddCategorie ?></h5>
          </form>

          <h3 class="my-5">Liste des categories :</h3>


        </div>

        <!--========================
  =========== MARQUE ===========
===============================-->
        <div class="tab-pane fade py-5 ps-5 <?= $show == 'marque' ? "active show" : "" ?>" id="faq_tab_3" role="tabpanel" aria-labelledby="faq_tab_3-tab">

          <h3 class="mb-5">Ajouter une marque :</h3>

          <form action="index.php?action=adminProducts" method="POST">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <input type="text" name="marque" placeholder="Nom de la marque" class="form-control" id="marque" aria-describedby="marqueHelp">
                </div>
              </div>
              <div class="col-4">
                <button type="submit" name="addmarque" class="btn bg-orange btn-bg-orange text-white">Ajouter marque</button>
              </div>
            </div>
            <h5 class="text-danger mt-3"><?= $errorAddMarque ?></h5>
          </form>

          <h3 class="my-5">Liste des marques :</h3>
        </div>

        <!--========================
  =========== TRANSPORTEUR ===========
===============================-->
        <div class="tab-pane fade py-5 ps-5 <?= $show == 'transporteur' ? "active show" : "" ?>" id="faq_tab_4" role="tabpanel" aria-labelledby="faq_tab_4-tab">

          <h3 class="mb-5">Ajouter un transporteur :</h3>

          <form action="index.php?action=adminProducts" method="POST">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <input type="text" name="transporteur" placeholder="Nom du transporteur" class="form-control" id="transporteur" aria-describedby="transporteurHelp">
                </div>
              </div>
              <div class="col-4">
                <button type="submit" name="addtransporteur" class="btn bg-orange btn-bg-orange text-white">Ajouter transporteur</button>
              </div>
            </div>
            <h5 class="text-danger mt-3"><?= $errorAddTransporteur ?></h5>
          </form>

          <h3 class="my-5">Liste des transporteurs :</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>