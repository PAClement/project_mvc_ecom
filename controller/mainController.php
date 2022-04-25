<?php

require_once("../model/ModelUser.php");

class mainController
{

  public static function accueilGo()
  {
    $conn = new ModelProduct();

    $productList = $conn->getAllProduit();

    require('../view/accueil.php');
  }

  public static function productView($id)
  {

    $conn = new ModelProduct();

    $oneProduct = $conn->getProduit(null, $id);
    require('../view/productView.php');
  }

  public static function myCart()
  {

    echo '<pre>';
    var_dump($_SESSION['customer_cart']);
    echo '</pre>';
    require('../view/cart.php');
  }

  public static function addCart($id)
  {

    if (!isset($_SESSION['customer_cart'])) {

      $_SESSION['customer_cart'] = [];
    }

    array_push($_SESSION['customer_cart'], $id);

    ViewTemplate::response("success", "Article bien ajouté au panier !", "index.php?action=viewProduct&id=" . $id);
  }
}
