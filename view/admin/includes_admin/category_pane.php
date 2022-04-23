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
      <?php for ($i = 0; $i < count($getCategory); $i++) : ?>
        <tr>
          <th scope="row"><?= $getCategory[$i]['id'] ?></th>
          <td><?= $getCategory[$i]['nom'] ?></td>
          <?php if ($i != 0) { ?>
            <td><button type="button" class="btn bg-orange text-white" data-bs-toggle="modal" data-bs-target="#editModal_<?= $getCategory[$i]['id'] . "_Category" ?>">Modifier la categorie</button></td>
            <td><a href="index.php?action=adminProducts&element=category&id=<?= $getCategory[$i]['id'] ?>" class="btn bg-danger text-white">Supprimer la categorie</a></td>

            <div class="modal fade" id="editModal_<?= $getCategory[$i]['id'] . "_Category" ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <?php } else { ?>
            <td></td>
            <td></td>

          <?php } ?>
        </tr>
      <?php endfor; ?>
    </tbody>
  </table>

</div>