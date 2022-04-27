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
}
