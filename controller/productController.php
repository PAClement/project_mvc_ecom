<?php

require_once('../model/ModelProduct.php');

class productController
{

  public static function productPage()
  {

    $show = "product";
    require('../view/admin/adminProducts.php');
  }

  public static function addCategorie($categorieData)
  {
    if ($categorieData['categorie']) {

      $conn = new ModelProduct();

      if (!$conn->getCategorie($categorieData['categorie'])) {

        if ($conn->addCategorie($categorieData['categorie'])) {

          ViewTemplate::response("success", "La categorie " . $categorieData['categorie'] . " à été ajouté avec succées !", "index.php?action=adminProducts");
        } else {

          $show = "category";
          $errorAddCategorie = "Impossible pour le moment";
          require('../view/admin/adminProducts.php');
        }
      } else {

        $show = "category";
        $errorAddCategorie = "Cette categorie existe déjà !";
        require('../view/admin/adminProducts.php');
      }
    } else {

      $show = "category";
      $errorAddCategorie = "Aucune categorie trouvée";
      require('../view/admin/adminProducts.php');
    }
  }

  public static function addMarque($marqueData)
  {
    if ($marqueData['marque']) {

      $conn = new ModelProduct();

      if (!$conn->getMarque($marqueData['marque'])) {

        if ($conn->addMarque($marqueData['marque'])) {

          ViewTemplate::response("success", "La marque " . $marqueData['marque'] . " à été ajouté avec succées !", "index.php?action=adminProducts");
        } else {

          $show = "marque";
          $errorAddMarque = "Impossible pour le moment";
          require('../view/admin/adminProducts.php');
        }
      } else {

        $show = "marque";
        $errorAddMarque = "Cette marque existe déjà !";
        require('../view/admin/adminProducts.php');
      }
    } else {

      $show = "marque";
      $errorAddMarque = "Aucune marque trouvée";
      require('../view/admin/adminProducts.php');
    }
  }

  public static function addTransporteur($transporteurData)
  {
    if ($transporteurData['transporteur']) {

      $conn = new ModelProduct();

      if (!$conn->getTransporteur($transporteurData['transporteur'])) {

        if ($conn->addTransporteur($transporteurData['transporteur'])) {

          ViewTemplate::response("success", "Le transporteur " . $transporteurData['transporteur'] . " à été ajouté avec succés !", "index.php?action=adminProducts");
        } else {

          $show = "transporteur";
          $errorAddTransporteur = "Impossible pour le moment";
          require('../view/admin/adminProducts.php');
        }
      } else {

        $show = "transporteur";
        $errorAddTransporteur = "Ce transporteur existe déjà !";
        require('../view/admin/adminProducts.php');
      }
    } else {

      $show = "transporteur";
      $errorAddTransporteur = "Aucun transporteur trouvé";
      require('../view/admin/adminProducts.php');
    }
  }

  public static function addProduit($produitData)
  {
    var_dump($produitData);
  }
}
