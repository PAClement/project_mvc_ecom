<?php $title = 'Admin Product Gestion';

ob_start();

include('../view/includes/header.php'); ?>

<div class="container mt-5">

  <?php ViewTemplate::returnBtn("adminSpace", "Espace admin", "GESTION PRODUITS :") ?>

  <div class="row d-flex justify-content-center my-5">
    <div class="col-md-12 bg-white">
      <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
        <li class="nav-item tab-list" role="presentation">
          <button class="nav-link active show" id="faq_tab_1-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_1" type="button" role="tab" aria-controls="faq_tab_1" aria-selected="true">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxl-dropbox fs-1'></i><span>Produits</span>
            </div>
          </button>
        </li>
        <li class="nav-item tab-list" role="presentation">
          <button class="nav-link" id="faq_tab_2-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_2" type="button" role="tab" aria-controls="faq_tab_2" aria-selected="false">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bx-category fs-1'></i><span>Catégories</span>
            </div>
          </button>
        </li>
        <li class="nav-item tab-list" role="presentation">
          <button class="nav-link" id="faq_tab_3-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_3" type="button" role="tab" aria-controls="faq_tab_3" aria-selected="false">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxs-bookmarks fs-1'></i><span>Marques</span>
            </div>
          </button>
        </li>
        <li class="nav-item tab-list" role="presentation">
          <button class="nav-link" id="faq_tab_4-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_4" type="button" role="tab" aria-controls="faq_tab_4" aria-selected="false">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxs-truck fs-1'></i><span>Transporteurs</span>
            </div>
          </button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">

        <!--========================
  =========== PRODUCT ===========
===============================-->

        <?php include('includes_admin/product_pane.php'); ?>
        <!--========================
  =========== CATEGORIE ===========
===============================-->

        <?php include('includes_admin/category_pane.php'); ?>
        <!--========================
  =========== MARQUE ===========
===============================-->

        <?php include('includes_admin/marque_pane.php'); ?>
        <!--========================
  =========== TRANSPORTEUR ===========
===============================-->

        <?php include('includes_admin/transporteur_pane.php'); ?>
      </div>
    </div>
  </div>
</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>