<?php

require_once("../model/ModelUser.php");
require_once("../model/ModelOrder.php");

class orderController
{

  public static function createOrder($orderData, $postData)
  {
    $connOrder = new ModelOrder();

    $dateNow = date('Y-m-d');

    $createOrder = [
      'date_commande' => $dateNow,
      'etat' => 'En attente',
      'prix' => $postData['orderPrix'],
      'id_client' => $postData['address'],
      'id_transporteur' => $postData['transporteur']
    ];

    $count_tab = array_count_values($orderData);

    $createOrderDetail = [];

    foreach ($count_tab as $key => $val) {

      $tab = [
        'id_produit' => $key,
        'quantite' => $val
      ];

      array_push($createOrderDetail, $tab);
    }

    $connOrder->submitOrder($createOrder, $createOrderDetail);

    unset($_SESSION['customer_cart']);

    header('Location: index.php?action=myOrder');
  }
}
