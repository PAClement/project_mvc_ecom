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
      <?php for ($i = 0; $i < count($getMarque); $i++) : ?>
        <tr>
          <th scope="row"><?= $getMarque[$i]['id'] ?></th>
          <td><?= $getMarque[$i]['nom'] ?></td>
          <td><?= $getMarque[$i]['logo'] ?></td>
          <?php if ($i != 0) { ?>
            <td><button type="button" class="btn bg-orange btn-bg-orange text-white" data-bs-toggle="modal" data-bs-target="#editModal_<?= $getMarque[$i]['id'] . "_Marque" ?>">Modifier la marque</button></td>
            <td><a href="index.php?action=adminProducts&element=marque&id=<?= $getMarque[$i]['id'] ?>" class="btn bg-danger text-white">Supprimer la marque</a></td>

            <div class="modal fade" id="editModal_<?= $getMarque[$i]['id'] . "_Marque" ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <?php } else { ?>
            <td></td>
            <td></td>

          <?php } ?>
        </tr>
      <?php endfor; ?>
    </tbody>
  </table>
</div>