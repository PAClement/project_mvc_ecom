<?php

require_once("../model/ModelUser.php");

class cartController
{

    public static function myCart()
    {
        $conn = new ModelProduct();

        echo '<pre>';
        var_dump($_SESSION['customer_cart']);
        echo '</pre>';

        $tab = $conn->getCartProduct($_SESSION['customer_cart']);

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
