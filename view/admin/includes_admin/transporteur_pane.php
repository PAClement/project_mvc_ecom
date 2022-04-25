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
      <?php for ($i = 0; $i < count($getTransporteur); $i++) : ?>
        <tr>
          <th scope="row"><?= $getTransporteur[$i]['id'] ?></th>
          <td><?= $getTransporteur[$i]['nom'] ?></td>
          <td><?= $getTransporteur[$i]['logo'] ?></td>
          <?php if ($i != 0) { ?>
            <td><button type="button" class="btn bg-orange btn-bg-orange text-white" data-bs-toggle="modal" data-bs-target="#editModal_<?= $getTransporteur[$i]['id'] . "_Transporteur" ?>">Modifier le Transporteur</button></td>
            <td><a href="index.php?action=adminProducts&element=transporteur&id=<?= $getTransporteur[$i]['id'] ?>" class="btn bg-danger text-white">Supprimer le transporteur</a></td>

            <div class="modal fade" id="editModal_<?= $getTransporteur[$i]['id'] . "_Transporteur" ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <?php } else { ?>
            <td></td>
            <td></td>
          <?php } ?>
        </tr>
      <?php endfor ?>
    </tbody>
  </table>
</div>