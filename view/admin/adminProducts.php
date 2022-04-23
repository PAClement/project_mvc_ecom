<?php $title = 'Admin Product Gestion';

ob_start();

include('../view/includes/header.php'); ?>

<div class="container mt-5">
  <h2>PANEL DE GESTION </h2>
  <div class="row d-flex justify-content-center my-5">
    <div class="col-md-12 bg-white">
      <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active show" id="faq_tab_1-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_1" type="button" role="tab" aria-controls="faq_tab_1" aria-selected="true">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxl-dropbox fs-1'></i><span>Produits</span>
            </div>
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="faq_tab_2-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_2" type="button" role="tab" aria-controls="faq_tab_2" aria-selected="false">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxl-dropbox fs-1'></i><span>Catégories</span>
            </div>
          </button>
        </li>
        <li class="nav-item " role="presentation">
          <button class="nav-link" id="faq_tab_3-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_3" type="button" role="tab" aria-controls="faq_tab_3" aria-selected="false">
            <div class="d-flex flex-column lh-lg">
              <i class='bx bxl-dropbox fs-1'></i><span>Marques</span>
            </div>
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="faq_tab_4-tab" data-bs-toggle="tab" data-bs-target="#faq_tab_4" type="button" role="tab" aria-controls="faq_tab_4" aria-selected="false">
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
        <div class="tab-pane fade py-5 ps-5product active show" id="faq_tab_1" role="tabpanel" aria-labelledby="faq_tab_1-tab">

          <h3 class="mb-5">Ajouter un produit :</h3>

          <form action="index.php?action=adminProducts" method="POST">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="nom_produit">Nom du produit :</label>
                  <input type="text" name="nom_produit" class="form-control" id="nom_produit" aria-describedby="nom_produitHelp" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="ref_produit">Ref du produit :</label>
                  <input type="text" name="ref_produit" class="form-control" id="ref_produit" aria-describedby="ref_produitHelp" required>
                </div>
              </div>
              <div class="col-12 my-4">
                <div class="form-floating">
                  <textarea class="form-control" name="description_produit" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                  <label for="floatingTextarea">Description du produit</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="nom_produit">Quantite en stock du produit :</label>
                  <input type="number" name="quantite_produit" min="0" class="form-control" id="quantite_produit" aria-describedby="quantite_produitHelp" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="nom_produit">Prix du produit :</label>
                  <input type="number" name="prix_produit" min="0" step="any" class="form-control" id="prix_produit" aria-describedby="prix_produitHelp" required>
                </div>
              </div>
              <span class="mt-4"></span>
              <div class="col-6">
                <select class="form-select" name="categorie_produit" aria-label="categorie_select" required>
                  <?php for ($i = 0; $i < count($getCategory); $i++) { ?>
                    <option value="<?= $getCategory[$i]['nom'] ?>"><?= $getCategory[$i]['nom'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-6">
                <select class="form-select" name="marque_produit" aria-label="marque_select" required>
                  <?php for ($i = 0; $i < count($getMarque); $i++) { ?>
                    <option value="<?= $getMarque[$i]['nom'] ?>"><?= $getMarque[$i]['nom'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <button type="submit" name="addProduit" class="btn bg-orange btn-bg-orange text-white mt-5">Ajouter produit</button>
          </form>

          <h3 class="my-5">Liste des produits :</h3>
        </div>

        <!--========================
  =========== CATEGORIE ===========
===============================-->
        <div class="tab-pane fade py-5 ps-5" id="faq_tab_2" role="tabpanel" aria-labelledby="faq_tab_2-tab">

          <h3 class="mb-5">Ajouter une categorie :</h3>

          <form action="index.php?action=adminProducts" method="POST">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <input type="text" name="categorie" placeholder="Nom de la categorie" class="form-control" id="categorie" aria-describedby="categorieHelp" required>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" name="addCategorie" class="btn bg-orange btn-bg-orange text-white">Ajouter categorie</button>
              </div>
            </div>
          </form>

          <h3 class="my-5">Liste des categories :</h3>
          <table class="table">
            <thead>
              <tr>
                <th scope="col"># id</th>
                <th scope="col">Nom de la catégorie</th>
                <th scope="col">Modification</th>
                <th scope="col">Suppression</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < count($getCategory); $i++) { ?>
                <tr>
                  <th scope="row"><?= $getCategory[$i]['id'] ?></th>
                  <td><?= $getCategory[$i]['nom'] ?></td>
                  <?php if ($i != 0) { ?>
                    <td><button type="button" class="btn bg-orange text-white" data-bs-toggle="modal" data-bs-target="#editModal_<?= $getCategory[$i]['id'] . "_" . $getCategory[$i]['nom'] ?>">Modifier la categorie</button></td>
                    <td><a href="index.php?action=adminProducts&element=category&id=<?= $getCategory[$i]['id'] ?>" class="btn bg-danger text-white">Supprimer la categorie</a></td>

                    <div class="modal fade" id="editModal_<?= $getCategory[$i]['id'] . "_" . $getCategory[$i]['nom'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= $getCategory[$i]['nom'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="index.php?action=adminProducts" method="POST">
                              <div class="form-group mb-3">
                                <input type="text" name="id" value="<?= $getCategory[$i]['id'] ?>" class="form-control d-none" id="id_category" aria-describedby="id_categoryHelp">
                                <input type="text" name="element" value="<?= $getCategory[$i]['nom'] ?>" class="form-control" id="categorie" aria-describedby="categorieHelp" required>
                                <input type="text" name="utils" value="category" class="form-control d-none" id="id_category" aria-describedby="id_categoryHelp">
                              </div>
                              <button type="submit" name="editElement" class="btn bg-orange btn-bg-orange text-white">Modifier la catégorie</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>

        <!--========================
  =========== MARQUE ===========
===============================-->
        <div class="tab-pane fade py-5 ps-5" id="faq_tab_3" role="tabpanel" aria-labelledby="faq_tab_3-tab">

          <h3 class="mb-5">Ajouter une marque :</h3>

          <form action="index.php?action=adminProducts" method="POST">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <input type="text" name="marque" placeholder="Nom de la marque" class="form-control" id="marque" aria-describedby="marqueHelp" required>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" name="addmarque" class="btn bg-orange btn-bg-orange text-white">Ajouter marque</button>
              </div>
            </div>
            <h5 class="text-danger mt-3">
            </h5>
          </form>

          <h3 class="my-5">Liste des marques :</h3>

          <table class="table">
            <thead>
              <tr>
                <th scope="col"># id</th>
                <th scope="col">Nom de la marque</th>
                <th scope="col">Logo</th>
                <th scope="col">Modification</th>
                <th scope="col">Suppression</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < count($getMarque); $i++) { ?>
                <tr>
                  <th scope="row"><?= $getMarque[$i]['id'] ?></th>
                  <td><?= $getMarque[$i]['nom'] ?></td>
                  <td><?= $getMarque[$i]['logo'] ?></td>
                  <?php if ($i != 0) { ?>
                    <td><button type="button" class="btn bg-orange text-white" data-bs-toggle="modal" data-bs-target="#editModal_<?= $getMarque[$i]['id'] . "_" . $getMarque[$i]['nom'] ?>">Modifier la marque</button></td>
                    <td><a href="index.php?action=adminProducts&element=marque&id=<?= $getMarque[$i]['id'] ?>" class="btn bg-danger text-white">Supprimer la marque</a></td>

                    <div class="modal fade" id="editModal_<?= $getMarque[$i]['id'] . "_" . $getMarque[$i]['nom'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= $getMarque[$i]['nom'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="index.php?action=adminProducts" method="POST">
                              <div class="form-group mb-3">
                                <input type="text" name="id" value="<?= $getMarque[$i]['id'] ?>" class="form-control d-none" id="id_marque" aria-describedby="id_marqueHelp">
                                <input type="text" name="element" value="<?= $getMarque[$i]['nom'] ?>" class="form-control" id="marque" aria-describedby="marqueHelp" required>
                                <input type="text" name="utils" value="marque" class="form-control d-none" id="id_marque" aria-describedby="id_marqueHelp">
                              </div>
                              <button type="submit" name="editElement" class="btn bg-orange btn-bg-orange text-white">Modifier la marque</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <!--========================
  =========== TRANSPORTEUR ===========
===============================-->
        <div class="tab-pane fade py-5 ps-5" id="faq_tab_4" role="tabpanel" aria-labelledby="faq_tab_4-tab">

          <h3 class="mb-5">Ajouter un transporteur :</h3>

          <form action="index.php?action=adminProducts" method="POST">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <input type="text" name="transporteur" placeholder="Nom du transporteur" class="form-control" id="transporteur" aria-describedby="transporteurHelp" required>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" name="addtransporteur" class="btn bg-orange btn-bg-orange text-white">Ajouter transporteur</button>
              </div>
            </div>
          </form>

          <h3 class="my-5">Liste des transporteurs :</h3>

          <table class="table">
            <thead>
              <tr>
                <th scope="col"># id</th>
                <th scope="col">Nom du transporteur</th>
                <th scope="col">Logo</th>
                <th scope="col">Modification</th>
                <th scope="col">Suppression</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < count($getTransporteur); $i++) { ?>
                <tr>
                  <th scope="row"><?= $getTransporteur[$i]['id'] ?></th>
                  <td><?= $getTransporteur[$i]['nom'] ?></td>
                  <td><?= $getTransporteur[$i]['logo'] ?></td>
                  <?php if ($i != 0) { ?>
                    <td><button type="button" class="btn bg-orange text-white" data-bs-toggle="modal" data-bs-target="#editModal_<?= $getTransporteur[$i]['id'] . "_" . $getTransporteur[$i]['nom'] ?>">Modifier le Transporteur</button></td>
                    <td><a href="index.php?action=adminProducts&element=transporteur&id=<?= $getTransporteur[$i]['id'] ?>" class="btn bg-danger text-white">Supprimer le transporteur</a></td>

                    <div class="modal fade" id="editModal_<?= $getTransporteur[$i]['id'] . "_" . $getTransporteur[$i]['nom'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= $getTransporteur[$i]['nom'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="index.php?action=adminProducts" method="POST">
                              <div class="form-group mb-3">
                                <input type="text" name="id" value="<?= $getTransporteur[$i]['id'] ?>" class="form-control d-none" id="id_transporteur" aria-describedby="id_transporteurHelp">
                                <input type="text" name="element" value="<?= $getTransporteur[$i]['nom'] ?>" class="form-control" id="transporteur" aria-describedby="transporteurHelp" required>
                                <input type="text" name="utils" value="transporteur" class="form-control d-none" id="id_transporteur" aria-describedby="id_transporteurHelp">
                              </div>
                              <button type="submit" name="editElement" class="btn bg-orange btn-bg-orange text-white">Modifier le transporteur</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('../view/includes/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('../view/template.php'); ?>