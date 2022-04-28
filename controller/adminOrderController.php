<?php

require_once("../model/ModelUser.php");
require_once("../model/ModelOrder.php");

class adminOrderController
{

    public static function adminOrder()
    {
        $connOrder = new ModelOrder();

        $OrderStay = $connOrder->getAllOrder("En attente");
        $OrderRefus = $connOrder->getAllOrder("Refusée");
        $OrderAccept = $connOrder->getAllOrder("Livraison");

        $OrderRefus = array_reverse($OrderRefus);
        $OrderAccept = array_reverse($OrderAccept);

        require('../view/admin/adminOrder.php');
    }

    public static function adminOrderDetail($commandId)
    {

        $connOrderDetail = new ModelOrder();
        $orderDetail = $connOrderDetail->orderDetail($commandId);
        require('../view/admin/adminOrderDetail.php');
    }

    public static function adminSetState($state, $commandId)
    {
        if ($commandId != null && $state != null) {


            $connOrderDetail = new ModelOrder();
            $connOrderDetail->changeState($state, $commandId);

            header('Location: index.php?action=adminOrder');
        } else {

            header('Location: index.php?action=adminOrder');
        }
    }
}
