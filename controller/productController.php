<?php

require_once('../model/ModelProduct.php');
require_once('../model/ModelCategory.php');
require_once('../model/ModelMarque.php');
require_once('../model/ModelTransporteur.php');



class productController
{

  public static function productPage($page = null)
  {
    $connProduct = new ModelProduct();
    $connCategory = new ModelCategory();
    $connMarque = new ModelMarque();
    $connTransporteur = new ModelTransporteur();

    $getCategory = $connCategory->getCategorie();
    $getMarque = $connMarque->getMarque();
    $getTransporteur = $connTransporteur->getTransporteur();

    // AFFICHAGE ET PAGINATION DES PRODUITS
    $limit = 5;
    $page = isset($page) ? $page : 1;
    $start = ($page - 1) * $limit;
    $getProduit = $connProduct->getAllProduit($start, $limit);

    $productCount = $connProduct->getNumberProduct();
    $total = $productCount["count(id)"];

    $pages = ceil($total / $limit);
    $previous = $page != 1 ? $page - 1 : 1;
    $next = $page >= $pages ? $pages : $page + 1;

    require('../view/admin/adminProducts.php');
  }

  public static function addCategorie($categorieData)
  {
    if ($categorieData['categorie']) {

      $connCategory = new ModelCategory();

      $categorieData['categorie'] = htmlspecialchars($categorieData['categorie']);

      if (!$connCategory->getCategorie($categorieData['categorie'])) {

        if ($connCategory->addCategorie($categorieData['categorie'])) {

          ViewTemplate::response("success", "La categorie " . $categorieData['categorie'] . " à été ajouté avec succées !", "index.php?action=adminProducts");
        } else {

          ViewTemplate::response("danger", "Un problème est survenue !", "index.php?action=adminProducts");
        }
      } else {

        ViewTemplate::response("danger", "Cette catégorie existe déja !", "index.php?action=adminProducts");
      }
    } else {

      ViewTemplate::response("danger", "Aucune catégorie trouvée !", "index.php?action=adminProducts");
    }
  }

  public static function addMarque($marqueData)
  {
    if ($marqueData['marque']) {

      $connMarque = new ModelMarque();

      $marqueData['marque'] = htmlspecialchars($marqueData['marque']);

      if (!$connMarque->getMarque($marqueData['marque'])) {

        if ($connMarque->addMarque($marqueData['marque'])) {

          ViewTemplate::response("success", "La marque " . $marqueData['marque'] . " à été ajouté avec succées !", "index.php?action=adminProducts");
        } else {

          ViewTemplate::response("danger", "Une erreur est survenue!", "index.php?action=adminProducts");
        }
      } else {

        ViewTemplate::response("danger", "Cette marque existe déja !", "index.php?action=adminProducts");
      }
    } else {

      ViewTemplate::response("danger", "Aucune marque trouvée !", "index.php?action=adminProducts");
    }
  }

  public static function addTransporteur($transporteurData)
  {
    if ($transporteurData['transporteur']) {

      $connTransporteur = new ModelTransporteur();

      $transporteurData['transporteur'] = htmlspecialchars($transporteurData['transporteur']);

      if (!$connTransporteur->getTransporteur($transporteurData['transporteur'])) {

        if ($connTransporteur->addTransporteur($transporteurData['transporteur'])) {

          ViewTemplate::response("success", "Le transporteur " . $transporteurData['transporteur'] . " à été ajouté avec succés !", "index.php?action=adminProducts");
        } else {

          ViewTemplate::response("danger", "Une erreur est survenue !", "index.php?action=adminProducts");
        }
      } else {

        ViewTemplate::response("danger", "Ce transporteur existe déjà !", "index.php?action=adminProducts");
      }
    } else {

      ViewTemplate::response("danger", "Aucun transporteur trouvé !", "index.php?action=adminProducts");
    }
  }

  public static function addProduit($produitData)
  {
    if ($produitData['nom_produit'] && $produitData['prix_produit']) {

      $produitData = array_map(function ($a) {
        return htmlspecialchars($a);
      }, $produitData);

      $conn = new ModelProduct();

      if (!$conn->getProduit($produitData['ref_produit'])) {

        $produitData['quantite_produit'] = (int) $produitData['quantite_produit'];
        $produitData['prix_produit'] = floatval($produitData['prix_produit']);

        if ($conn->addProduit($produitData)) {

          ViewTemplate::response("success", $produitData['nom_produit'] . " à été ajouté avec succés !", "index.php?action=adminProducts");
        } else {

          ViewTemplate::response("danger", "Une erreur est survenue !", "index.php?action=adminProducts");
        }
      } else {

        ViewTemplate::response("danger", "Ce produit existe déjà!", "index.php?action=adminProducts");
      }
    }
  }

  public static function elementSuppr($action, $id)
  {

    $conn = new ModelProduct();
    $id = (int) $id;

    if ($action != 'transporteur') {
      if ($action != 'product') {
        if (!$conn->supprElementProduit($action, $id)) {
          if ($conn->utilsSuppr($action, $id)) {

            ViewTemplate::response("success", $action . " supprimer avec succés !", "index.php?action=adminProducts");
          } else {
            ViewTemplate::response("danger", "Impossible de supprimer une " . $action . " pour le moment !", "index.php?action=adminProducts");
          }
        } else {

          ViewTemplate::response("danger", "Impossible de supprimer cette " . $action . ", 1 ou plusieurs produits utilisent cette " . $action . "  !", "index.php?action=adminProducts");
        }
      } else {
        if ($conn->utilsSuppr($action, $id)) {

          ViewTemplate::response("success", $action . " supprimer avec succés !", "index.php?action=adminProducts");
        } else {
          ViewTemplate::response("danger", "Impossible de supprimer une " . $action . " pour le moment !", "index.php?action=adminProducts");
        }
      }
    } else {
      if ($conn->utilsSuppr($action, $id)) {

        ViewTemplate::response("success", $action . " supprimer avec succés !", "index.php?action=adminProducts");
      } else {

        ViewTemplate::response("danger", "Impossible de supprimer un " . $action . " pour le moment !", "index.php?action=adminProducts");
      }
    }
  }

  public static function elementEdit($editData)
  {

    $editData = array_map(function ($a) {
      return htmlspecialchars($a);
    }, $editData);

    if ($editData['form_produit'] != 'product') {

      if ($editData['element']) {

        $conn = new ModelProduct();

        if ($conn->utilsEdit($editData['utils'], $editData['element'], $editData['id'])) {

          ViewTemplate::response("success", "Edition Réussie !", "index.php?action=adminProducts");
        } else {

          ViewTemplate::response("danger", "Un problème est survenue !", "index.php?action=adminProducts");
        }
      } else {

        ViewTemplate::response("danger", "Il faut au moins 1 valeur !", "index.php?action=adminProducts");
      }
    } else {

      $conn = new ModelProduct();

      if ($conn->editProduit($editData)) {

        ViewTemplate::response("success", "Edition Réussie !", "index.php?action=adminProducts");
      } else {

        ViewTemplate::response("danger", "Un problème est survenue !", "index.php?action=adminProducts");
      }
    }
  }
}
