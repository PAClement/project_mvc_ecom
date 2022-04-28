<?php

require_once("../model/ModelUser.php");

class cartController
{

    public static function myCart()
    {
        $conn = new ModelProduct();

        if (isset($_SESSION['customer_cart']) && $_SESSION['customer_cart']) {

            $nbData = "";
            for ($i = 0; $i < count($_SESSION['customer_cart']); $i++) {

                $i == count($_SESSION['customer_cart']) - 1 ? $nbData .= "?" : $nbData .= "?,";
            }

            $count_tab = array_count_values($_SESSION['customer_cart']);
            $cartTab = $conn->getCartProduct($_SESSION['customer_cart'], $nbData);
        }

        require('../view/cart.php');
    }

    public static function addCart($id, $cartRedirect = null)
    {

        if (!isset($_SESSION['customer_cart'])) {

            $_SESSION['customer_cart'] = [];
        }

        array_push($_SESSION['customer_cart'], $id);

        $cartRedirect ? header("Location: index.php?action=myCart") : header("Location: index.php?action=viewProduct&id=" . $id);
    }

    public static function delCart($id)
    {
        $isSuppr = 0;
        $i = 0;

        while ($isSuppr == 0) {

            if ($_SESSION['customer_cart'][$i] == $id) {

                array_splice($_SESSION['customer_cart'], $i, 1);
                $isSuppr = 1;
            }

            $i++;
        }

        header('Location: index.php?action=myCart');
    }

    public static function submitCart()
    {
        $connProduct = new ModelProduct();
        $connTransporteur = new ModelTransporteur();
        $connUser = new ModelUser();

        $tabTransporteur = $connTransporteur->getTransporteur();
        $tabUserInfo = $connUser->getUserInfo($_SESSION['user_id']);

        $nbData = "";
        for ($i = 0; $i < count($_SESSION['customer_cart']); $i++) {

            $i == count($_SESSION['customer_cart']) - 1 ? $nbData .= "?" : $nbData .= "?,";
        }

        $count_tab = array_count_values($_SESSION['customer_cart']);
        $cartTab = $connProduct->getCartProduct($_SESSION['customer_cart'], $nbData);

        require('../view/submitCart.php');
    }
}
