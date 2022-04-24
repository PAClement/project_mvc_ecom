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
          <?php for ($i = 0; $i < count($getCategory); $i++) : ?>
            <option value="<?= $getCategory[$i]['nom'] ?>"><?= $getCategory[$i]['nom'] ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="col-6">
        <select class="form-select" name="marque_produit" aria-label="marque_select" required>
          <?php for ($i = 0; $i < count($getMarque); $i++) : ?>
            <option value="<?= $getMarque[$i]['nom'] ?>"><?= $getMarque[$i]['nom'] ?></option>
          <?php endfor; ?>
        </select>
      </div>
    </div>

    <button type="submit" name="addProduit" class="btn bg-orange btn-bg-orange text-white mt-5">Ajouter produit</button>
  </form>

  <h3 class="my-5">Liste des produits :</h3>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="index.php?action=adminProducts&page=<?= $previous; ?>">Previous</a></li>
      <?php for ($i = 1; $i <= $pages; $i++) : ?>
        <li class="page-item"><a class="page-link" href="index.php?action=adminProducts&page=<?= $i; ?>"><?= $i; ?></a></li>
      <?php endfor; ?>
      <li class="page-item"><a class="page-link" href="index.php?action=adminProducts&page=<?= $next; ?>">Next</a></li>
    </ul>
  </nav>
  <table class="table">
    <thead>
      <tr>
        <th scope="col"># id</th>
        <th scope="col">Nom du produit</th>
        <th scope="col">Modification</th>
        <th scope="col">Suppression</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 0; $i < count($getProduit); $i++) : ?>
        <tr>
          <th scope="row"><?= $getProduit[$i]['id'] ?></th>
          <td><?= $getProduit[$i]['nom'] ?></td>
          <td><button type="button" class="btn bg-orange text-white" data-bs-toggle="modal" data-bs-target="#editModal_<?= $getProduit[$i]['id'] . "_Produit" ?>">Modifier le produit</button></td>
          <td><a href="index.php?action=adminProducts&element=product&id=<?= $getProduit[$i]['id'] ?>" class="btn bg-danger text-white">Supprimer le produit</a></td>

          <div class="modal fade" id="editModal_<?= $getProduit[$i]['id'] . "_Produit" ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?= "#" . $getProduit[$i]['id'] . " " . $getProduit[$i]['nom'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="index.php?action=adminProducts" method="POST">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <input type="text" value="product" name="form_produit" class="form-control d-none" id="product" aria-describedby="productHelp" required>
                          <input type="text" value="<?= $getProduit[$i]['id'] ?>" name="id_produit" class="form-control d-none" id="id_produit" aria-describedby="id_produitHelp" required>
                          <label for="nom_produit">Nom du produit :</label>
                          <input type="text" value="<?= $getProduit[$i]['nom'] ?>" name="nom_produit" class="form-control" id="nom_produit" aria-describedby="nom_produitHelp" required>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="ref_produit">Ref du produit :</label>
                          <input type="text" value="<?= $getProduit[$i]['ref'] ?>" name="ref_produit" class="form-control" id="ref_produit" aria-describedby="ref_produitHelp" required>
                        </div>
                      </div>
                      <div class="col-12 my-4">
                        <div class="form-floating">
                          <textarea class="form-control" name="description_produit" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required><?= $getProduit[$i]['description'] ?></textarea>
                          <label for="floatingTextarea">Description du produit</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="nom_produit">Stock :</label>
                          <input type="number" value="<?= $getProduit[$i]['quantite'] ?>" name="quantite_produit" min="0" class="form-control" id="quantite_produit" aria-describedby="quantite_produitHelp" required>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="nom_produit">Prix:</label>
                          <input type="number" value="<?= $getProduit[$i]['prix'] ?>" name="prix_produit" min="0" step="any" class="form-control" id="prix_produit" aria-describedby="prix_produitHelp" required>
                        </div>
                      </div>
                      <span class="mt-4"></span>
                      <div class="col-6">
                        <select class="form-select" name="categorie_produit" aria-label="categorie_select" required>
                          <option class="bg-dark text-white" value="<?= $getProduit[$i]['nom_category'] ?>" selected><?= $getProduit[$i]['nom_category'] ?></option>
                          <?php for ($j = 0; $j < count($getCategory); $j++) : ?>
                            <option value="<?= $getCategory[$j]['nom'] ?>"><?= $getCategory[$j]['nom'] ?></option>
                          <?php endfor; ?>
                        </select>
                      </div>
                      <div class="col-6">
                        <select class="form-select" name="marque_produit" aria-label="marque_select" required>
                          <option class="bg-dark text-white" value="<?= $getProduit[$i]['nom_marque'] ?>" selected><?= $getProduit[$i]['nom_marque'] ?></option>
                          <?php for ($k = 0; $k < count($getMarque); $k++) : ?>
                            <option value="<?= $getMarque[$k]['nom'] ?>"><?= $getMarque[$k]['nom'] ?></option>
                          <?php endfor; ?>
                        </select>
                      </div>
                    </div>
                    <button type="submit" name="editElement" class="btn bg-orange btn-bg-orange text-white mt-4">Modifier le produit</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </tr>
      <?php endfor; ?>
    </tbody>
  </table>

</div>